<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;

class ProductsImport implements ToModel, SkipsEmptyRows, SkipsOnError, WithHeadingRow, WithUpserts, WithUpsertColumns
{
    use Importable, SkipsErrors;
    
    /**
    * @return string|array
    */
    public function uniqueBy()
    {
        return 'name';
    }

    /**
    * @return array
    */
    public function upsertColumns()
    {
        return ['brand', 'price'];
    }

    public function model(array $row)
    {
        return new Product([
            'name'     => $row['name'],
            'brand'    => $row['brand'], 
            'price'    => $row['price'],
        ]);
    }

}
