<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ManageProduct extends Component
{
    use WithPagination,  WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $excelFile, $disabled = true;

    protected $rules = [
        'excelFile' => 'required|file|in:xlxs,xls',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
        $this->disabled = false;
    }

    public function import()
    {

        dd($this->excelFile);
    }

    public function render()
    {
        $products = Product::paginate(5);

        return view('livewire.manage-product', [
            'products' => $products
        ]);
    }
}
