<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'           => $row[0],
            'price'          => $row[1],
            'stock'          => $row[2],
            'buy'            => $row[3],
            'sell'           => $row[4],
            'status'         => $row[5],
            'description'    => $row[6],
        ]);
    }
}
