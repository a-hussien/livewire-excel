<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, SkipsEmptyRows, WithHeadingRow
{
   
    public function collection(Collection $rows)
    {
        $validated = Validator::make($rows->toArray(), [
                        'name'  => 'unique:products,name',
                    ])->validate();

        foreach ($rows as $row) 
        {
            Product::updateOrCreate([
                'name'     => $row['name'],
                'brand'    => $row['brand'], 
                'price'    => $row['price'],
                'created_at'    => $row['created_at'],
                'updated_at'    => $row['updated_at'],
            ]);
        }
    
        
    }

}
