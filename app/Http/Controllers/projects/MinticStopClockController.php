<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\notificationMain;
use App\Models\project\Mintic\MinticVisit;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\minticStopClock;
use App\Exports\minticClockStopExport;
use App\Models\system_setting;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MinticStopClockController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de paradas de reloj de proyecto MinTIC|Ver parada de reloj de proyecto MinTIC|Crear parada de reloj de proyecto MinTIC|Crear parada de reloj de proyecto MinTIC|Adjuntar y ver fotos a parada de reloj de proyecto MinTIC|Exportar parada de reloj de proyecto MinTIC|Eliminar parada de reloj de proyecto MinTIC',['only' => ['index']]);
        $this->middleware('permission:Ver parada de reloj de proyecto MinTIC',['only' => ['show']]);
        $this->middleware('permission:Crear parada de reloj de proyecto MinTIC',['only' => ['create','store']]);
        $this->middleware('permission:Editar parada de reloj de proyecto MinTIC',['only' => ['create','store']]);
        $this->middleware('permission:Adjuntar y ver fotos a parada de reloj de proyecto MinTIC',['only' => ['update','photos']]);
        $this->middleware('permission:Exportar parada de reloj de proyecto MinTIC',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar parada de reloj de proyecto MinTIC',['only' => ['destroy']]);

    }

    public function index(Mintic_School $id)
    {
        return view('projects.mintic.maintenance.stop_clock.index', compact('id'));
    }

    public function show(Mintic_School $id, minticStopClock $item)
    {
        return view('projects.mintic.maintenance.stop_clock.show', compact('id', 'item'));
    }

    public function create(Mintic_School $id)
    {
        return view('projects.mintic.maintenance.stop_clock.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'date' => ['required', 'string', 'max:100'],
            'num' => ['required', 'string', 'max:100'],
            'num_contract' => ['required', 'string', 'max:100'],
            'collaborating_company' => ['required', 'string', 'max:100'],
            'responsable_name' => ['required', 'string', 'max:100'],
            'responsable_position' => ['required', 'string', 'max:100'],
            'responsable_document' => ['required', 'string', 'max:100'],
            'responsable_number' => ['required', 'string', 'max:100'],
            'responsable_email' => ['required', 'string', 'max:100']
        ]);
        $request['project_id'] = $id;
        $request['status'] = 1;
        $request['responsable_id'] = auth()->id();
        $main = minticStopClock::create($request->all());
        return redirect()->route('mintic_clock_stop', [$id, $main->id])->with('success', 'Se ha creado el mantenimiento correctamente');
    }

    public function edit(Mintic_School $id, minticStopClock $item)
    {
        return view('projects.mintic.maintenance.stop_clock.edit', compact('id', 'item'));
    }

    public function update(Request $request, $id, minticStopClock $item)
    {
        $request->validate([
            'date' => ['required', 'string', 'max:100'],
            'num' => ['required', 'string', 'max:100'],
            'num_contract' => ['required', 'string', 'max:100'],
            'collaborating_company' => ['required', 'string', 'max:100'],
            'responsable_name' => ['required', 'string', 'max:100'],
            'responsable_position' => ['required', 'string', 'max:100'],
            'responsable_document' => ['required', 'string', 'max:100'],
            'responsable_number' => ['required', 'string', 'max:100'],
            'responsable_email' => ['required', 'string', 'max:100']
        ]);

        $item->update($request->all());

        return redirect()->route('mintic_clock_stop', [$id, $item->id])->with('success', 'Se ha actualizado el mantenimiento correctamente');
    }

    public function photos($id, minticStopClock $item)
    {
        return view('projects.mintic.maintenance.stop_clock.photo', compact('id', 'item'));
    }

    public function approve($id, minticStopClock $item)
    {
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $stop_clock = minticStopClock::find($request->id);
            $mintic = Mintic_School::find($request->id);
            $visit = MinticVisit::where('project_id', $request->id)->where('type', 'maintenance')->first();
            $file_exists = $stop_clock->files->where('description', $request->name_d)->first();

            if ($file_exists) {
                Storage::delete('public/upload/mintic/' . $file_exists->name);
            }
            $file = $request->file('file');

            $name = time() . str_random() . '.' . $file->getClientOriginalExtension();
            if (!(isset($request->write) && $request->write == 'No') && ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg')) {
                $text2 = $mintic->long . ' / ' . $mintic->lat;
                $text3 = isset($request->date) && $request->date ? Carbon::create($request->date)->format('Y-m-d H:i:s') : now()->format('Y-m-d H:i:s');

                $image = Image::make($request->file);
                if ($request->size != 'org') {
                    $image->resize(null, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $height = 25 + ($request->size_letter * 3);
                    $image->text('ID ' . $mintic->code, $image->width() - 5, $image->height() - $height, function ($font) use ($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($mintic->name, $image->width() - 5, $image->height() - $height, function ($font) use ($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($text2, $image->width() - 5, $image->height() - $height, function ($font) use ($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height = $height - $request->size_letter - 2;
                    $image->text($text3, $image->width() - 5, $image->height() - $height, function ($font) use ($request) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($request->size_letter);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $size = '650';
                } else {
                    $size = $file->getClientSize() / 1000;
                    $const = 0.3 * $size;
                    $height = $const;
                    $image->text($text3, $image->width() - 5, $image->height() - $height, function ($font) use ($request, $const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5 + $const);
                    $image->text($text2, $image->width() - 5, $image->height() - $height, function ($font) use ($request, $const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5 + $const);
                    $image->text($mintic->name, $image->width() - 5, $image->height() - $height, function ($font) use ($request, $const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                    $height += (5 + $const);
                    $image->text('ID ' . $mintic->code, $image->width() - 5, $image->height() - $height, function ($font) use ($request, $const) {
                        $font->file(public_path('fonts/Arial/ARIAL.TTF'));
                        $font->size($const);
                        $font->color($request->color);
                        $font->align('right');
                        $font->valign('top');
                        $font->angle(0);
                    });
                }
                $image->save(public_path('storage/upload/mintic/' . $name));
            } else {
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/upload/mintic', $file, $name);
            }
            if ($file_exists) {
                $file_exists->update([
                    'name' => $name,
                    'description' => $request->name_d,
                    'commentary' => $request->commentary,
                    'size' => $size . ' KB',
                    'url' => 'public/upload/mintic/' . $name,
                    'type' => $file->getClientOriginalExtension(),
                    'place' => $request->place,
                    'state' => 1
                ]);
                return response()->json([
                    'success' => 'Se subio y actualizo correctamente el archivo',
                    'size' => $size . ' KB',
                    'name' => $name,
                    'type' => $file->getClientOriginalExtension(),
                ]);
            }
            $stop_clock->files()->create([
                'name' => $name,
                'description' => $request->name_d,
                'commentary' => $request->commentary,
                'size' => $size . ' KB',
                'url' => 'public/upload/mintic/' . $name,
                'type' => $file->getClientOriginalExtension(),
                'place' => $request->place,
                'state' => 1
            ]);
            return response()->json([
                'success' => 'Se subio correctamente el archivo',
                'size' => $size . ' KB',
                'name' => $name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        } else {
            return response()->json(['success' => 'No se examino un archivo']);
        }
    }

    public function export(Mintic_School $id, minticStopClock $item)
    {
        $files = array();
        $files['logo_mintic']['name'] = 'Logo_mintic';
        $files['logo_mintic']['description'] = 'Logo de MinTIC';
        $files['logo_mintic']['path'] = public_path('/img/mintic.png');
        $files['logo_mintic']['height'] = 90;
        $files['logo_mintic']['coordinates'] = 'B3';
        $files['logo_mintic']['place'] = 3;

        $files['logo_claro']['name'] = 'Logo_Claro';
        $files['logo_claro']['description'] = 'Logo de Claro';
        $files['logo_claro']['path'] = public_path('/img/claro.png');
        $files['logo_claro']['height'] = 80;
        $files['logo_claro']['coordinates'] = 'N3';
        $files['logo_claro']['place'] = 3;

        if ($item->files) {
            foreach ($item->files as $key => $value) {
                if ($value->place && $value->place != 'XXX') {
                    $place = explode('.', $value->description, 2);
                    $str = str_random();
                    $files[$str]['name'] = $value->name;
                    $files[$str]['description'] = $value->description;
                    $files[$str]['path'] = public_path('/storage/upload/mintic/' . $value->name);
                    $files[$str]['height'] = 200;
                    $files[$str]['coordinates'] = $value->place;
                    $files[$str]['place'] = 2;
                }
            }
        }

        return (new minticClockStopExport($id, $item, $files))->download('Formato Parada de Reloj.xlsx');
    }

    public function destroy($id, minticStopClock $item)
    {
        $item->delete();
        return redirect()->route('mintic_clock_stop', $id)->with('success', 'Se ha eliminado la parada de reloj correctamente');
    }
}
