<?php

namespace App\Http\Controllers;

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
        $product=SolarProducts::where('status',1)->get();
        $types=[];

        foreach ($product as $item) {
            $type=$item->type;
            if (!in_array($type, $types)) {
                $types[] = $type;
            }
        }
        foreach ($types as $value) {
            $product = SolarProducts::where('status', 1 )->where('type', $value)->first();
            if ($product) {
                $products[] = $product;
            }
        }

        return view('welcome', compact('products', 'types'));
    }
}
