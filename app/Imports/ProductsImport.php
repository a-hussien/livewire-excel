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
        return 'model';
    }

    /**
    * @return array
    */
    public function upsertColumns()
    {
        return ['category', 'type', 'minimum_price', 'unit_price', 'bulk_price'];
    }

    public function model(array $row)
    {
        return new Product([
            'model'     => $row['model'],
            'type'     => $row['type'],
            'category'    => $row['category'], 
            'minimum_price'    => $row['minimum_price'],
            'unit_price'    => $row['unit_price'],
            'bulk_price'    => $row['bulk_price'],
        ]);
    }

}
