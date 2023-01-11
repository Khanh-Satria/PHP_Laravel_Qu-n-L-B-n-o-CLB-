<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table ="order-details";
    protected $primaryKey = 'IDorder';


   public function product_linked(){
       return $this->belongsTo(Product::class, "IDproduct", "IDproduct");
   }
}
