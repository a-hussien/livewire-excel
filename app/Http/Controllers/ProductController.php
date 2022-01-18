<?php

namespace App\Http\Controllers;


class ProductController extends Controller
{
    public function index()
    {
        return view('welcome');
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
