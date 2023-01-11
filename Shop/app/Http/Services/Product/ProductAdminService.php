<?php

namespace App\Http\Services\Product;

use App\Models\Product;

class ProductAdminService
{
    public function get(){
        return Product::paginate(5);
    }

}
