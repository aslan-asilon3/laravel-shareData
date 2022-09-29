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
            'heading'          => $row[1],
            'color'          => $row[2],
            'size'          => $row[3],
            'price'          => $row[4],
            'stock'          => $row[5],
            'buy'            => $row[6],
            'sell'           => $row[7],
            'batch'           => $row[8],
            'status'         => $row[9],
            'description'    => $row[10],
            'comment'    => $row[11],
            'rating'    => $row[12],
        ]);
    }
}
