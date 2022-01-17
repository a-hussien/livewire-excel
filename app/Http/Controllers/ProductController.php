<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);

        return view('welcome', ['products' => $products]);
    }

    public function downloadtemplate()
    {
        $name = 'example.xlsx';
        $pathToFile = storage_path("app\public\\" . $name);
        $headers = [
            'Content-Type' => 'application/vnd-ms-excel',
            'Content-Disposition' => 'inline;filename="'.$name.'"'
        ];

        return response()->download($pathToFile, $name, $headers);
    }
}
