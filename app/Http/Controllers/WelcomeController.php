<?php

namespace App\Http\Controllers;

use App\Models\Energy\Offer;
use App\Models\Energy\SolarKit;
use App\Models\execution_work\kits;
use Illuminate\Http\Request;
use App\Models\SolarProducts;
use App\Models\file;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = SolarProducts::where('status', 1)->get();
        $types = [];

        foreach ($product as $item) {
            $type = $item->type;
            if (!in_array($type, $types)) {
                $types[] = $type;
            }
        }
        foreach ($types as $value) {
            $product = SolarProducts::where('status', 1)->where('type', $value)->first();
            if ($product) {
                $products[] = $product;
            }
        }

        $kits = SolarKit::TypeKit();
        foreach ($kits as $kit) {
            $kit->products = is_array($kit->products) ? $kit->products : [];
            $equiposList = [];
            $tiposAgregados = [];
            $filesAgregados = 0;
            foreach ($kit->products as $producto) {
                $equipo = SolarProducts::find($producto['id']);
                if ($equipo && $equipo->files && !in_array($equipo->type, $tiposAgregados)) {
                    foreach ($equipo->files as $file) {
                        $equiposList[] = $file;
                        $tiposAgregados[] = $equipo->type;
                        $filesAgregados++;
                        break;
                    }
                }
                if ($filesAgregados >= 4) {
                    break;
                }
            }
            $kit->files = $equiposList;
        }
        $offer = null;
        $kitOff = null;
        $productosOff = [];

        $offer = Offer::first();
        if($offer->status == 1 ){
            if ($offer && $offer->kit_id) {
                $kitOff = SolarKit::find($offer->kit_id);
                if ($kitOff && $kitOff->products && count($kitOff->products) > 0) {
                    foreach ($kitOff->products as $prod) {
                        if (!isset($prod['id'])) {
                            continue;
                        }
                        $product = SolarProducts::find($prod['id']);
                        if ($product) {
                            $product->valor = $product->price ?? 0;
                            if (!isset($productosOff[$product->type])) {
                                $product->cantidad = 1;
                                $productosOff[$product->type] = $product;
                            } else {
                                $productosOff[$product->type]->cantidad = ($productosOff[$product->type]->cantidad ?? 0) + 1;
                                $productosOff[$product->type]->valor = ($productosOff[$product->type]->valor ?? 0) + ($product->price ?? 0);
                            }
                        }
                    }
                }
            }
        }
        return view('welcome', compact('products', 'types', 'kits', 'equiposList', 'offer', 'kitOff', 'productosOff'));
    }
}
