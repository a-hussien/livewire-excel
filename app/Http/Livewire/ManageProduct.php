<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ManageProduct extends Component
{
    use WithPagination,  WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $excelFile;

    protected $rules = [
        'excelFile' => 'required|file|mimes:xlsx, xls',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function import()
    {
        $this->validate();
        Excel::import(new ProductsImport, $this->excelFile);
    }

    public function export($ext)
    {
        return Excel::download(new ProductsExport, "products.$ext");
    }

    public function render()
    {
        $products = Product::paginate(10);

        return view('livewire.manage-product', [
            'products' => $products
        ]);
    }
}
