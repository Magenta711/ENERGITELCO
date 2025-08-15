<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Models\SolarProducts;
use App\Models\Energy\CategoryProducts;
use App\Models\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Energy\SolarShippingValue;
use App\Models\Energy\SubcategoryProducts;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver Productos', ['only' => ['index']]);
        $this->middleware('permission:Crear Productos', ['only' => ['store', 'create']]);
        $this->middleware('permission:Editar Productos', ['only' => ['update', 'edit']]);
        $this->middleware('permission:ELiminar Productos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $item)
    {
        $ids = SolarProducts::where('category_id', $id)->where('type', $item)->get();
        return view('energy.products.types.index', compact('ids', 'id'));
    }

    public function categoryIndex()
    {
        $id = CategoryProducts::all();
        $shipping = SolarShippingValue::first();
        return view('energy.products.index', compact('id', 'shipping'));
    }

    public function categoryShow(categoryProducts $id)
    {
        return view('energy.products.category', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('energy.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function category(Request $request)
    {
        $request->validate([
            'category' => ['required'],
        ]);
        $category = new CategoryProducts();
        $category->name = $request->category;
        $category->save();
        return redirect()->route('energy_products')->with('success', 'Se ha creado la categoría correctamente');
    }

    public function subcategory(Request $request, CategoryProducts $id)
    {
        $request->validate([
            'subcategory' => ['required'],
        ]);
        $subcategory = new SubcategoryProducts();
        $subcategory->name = $request->subcategory;
        $subcategory->category_id = $id->id;
        $subcategory->save();
        return redirect()->route('energy_products_category.show', $id->id)->with('success', 'Se ha creado la subcategoría correctamente');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1',
            'alto' => 'required|numeric',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'peso' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $request['category_id'] = $request->category_id;
        $request['subcategory_id'] = $request->subcategory_id;
        $request['status'] = 1;
        $nombre_original = $request['type'];
        $arr_name = explode(' ', $nombre_original);
        $iniciales = '';
        for ($i = 0; $i < count($arr_name); $i++) {
            $iniciales = $iniciales . str_split($arr_name[$i])[0];
        }
        for ($i = 1; $i <= $request->amount; $i++) {
            $id = SolarProducts::create($request->all());
            $codigo = 'PE-' . $iniciales . '-' . $id->id;
            $id->update(['cod_product' => strtoupper($codigo)]);
            $inputName = 'file_' . $request->subcategory_id;
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                if ($file !== null) {
                    $name = $request->type . time() . '.' . $file->getClientOriginalExtension();
                    $size = $file->getClientSize() / 1000;
                    $path = Storage::putFileAs('public/energy', $file, $name);
                    $id->files()->create([
                        'name' => $name,
                        'description' => 'Foto de Producto Solar',
                        'size' => $size . ' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'state' => 1
                    ]);
                }
            }
        }
        return redirect()->route('energy_products_category.show', $request->category_id)->with('success', 'Se ha generado los equipos correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolarProducts $id)
    {
        $request->validate([
            'alto' => 'required|numeric',
            'largo' => 'required|numeric',
            'ancho' => 'required|numeric',
            'peso' => 'required|numeric',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $products = SolarProducts::where('type', $id->type)->get();
        if ($products->isEmpty()) {
            return redirect()->route('energy_products')->with('error', 'El producto no existe');
        }

        foreach ($products as $product) {
            $product->update($request->except(['file', 'serie']));
            foreach ($product->files as $oldFile) {
                if (Storage::exists($oldFile->url)) {
                    Storage::delete($oldFile->url);
                }
                $oldFile->delete();
            }
            $inputName = 'file_' . $id->id;
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                $name = $request->type . time() . '.' . $file->getClientOriginalExtension();
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/energy', $file, $name);
                $product->files()->create([
                    'name' => $name,
                    'description' => 'Foto de Producto Solar',
                    'size' => $size . ' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
            }
        }


        return redirect()->route('energy_products_category.show', $id->category_id)->with('success', 'Se ha actualizado el equipo correctamente');
    }

    public function update_category(Request $request, CategoryProducts $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $id->update(['name' => $request->name]);
        return redirect()->route('energy_products')->with('success', 'Se ha actualizado la categoría correctamente');
    }

    public function update_subcategory(Request $request, SubcategoryProducts $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $id->update(['name' => $request->name]);
        return redirect()->route('energy_products_category.show', $id->category_id)->with('success', 'Se ha actualizado la subcategoría correctamente');
    }

    public function update_product(Request $request, SolarProducts $id)
    {
        $request->validate([
            'serie' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $id->serie=$request->serie;
        $id->status = $request->status;
        $id->save();
        return redirect()->route('energy_products_types', [$id->category_id, $id->type])->with('success', 'Se ha actualizado el equipo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolarProducts $id)
    {
        $id->delete();
        return redirect()->route('energy_products')->with('success', 'Se ha eliminado el equipo correctamente');
    }

    public function destroy_all($id, $item, $type)
    {
        $ids = SolarProducts::where('category_id', $id)->where('subcategory_id', $item)->where('type', $type)->get();
        if ($ids->isEmpty()) {
            return redirect()->route('energy_products_category.show', $id)->with('error', 'No existen productos de este tipo');
        }
        foreach ($ids as $product) {
            $product->delete();
        }
        return redirect()->route('energy_products_category.show', $id)->with('success', 'Se ha eliminado el equipo correctamente');
    }

    public function destroy_category($id, $item)
    {
        $ids = SolarProducts::where('category_id', $id)->where('subcategory_id', $item)->get();

        if ($ids) {
            foreach ($ids as $product) {
                $product->delete();
            }
        }

        $subcategory = SubcategoryProducts::find($item);
        if (!$subcategory) {
            return redirect()->route('energy_products_category.show', $id)->with('success', 'Subcategoría no encontrada');
        }

        $subcategory->delete();

        return redirect()->route('energy_products_category.show', $id)->with('success', 'Se ha eliminado la subcategoría correctamente');
    }

    public function update_shipping(Request $request, SolarShippingValue $id)
    {
        $id->update($request->all());
        return redirect()->route('energy_products')->with('success', 'Se ha actualizado correctamente');
    }
}
