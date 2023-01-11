<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ="order";
    protected $primaryKey = 'IDorder';

    public static function search($search){
        return empty($search) ? static::query()
        : static::query()->where('IDorder', 'like', '%'.$search.'%');
    } 

    public function user_linked(){
        //khoa ngoai khoa chinhs\
        return $this->belongsTo(User::class, "username", "username");
    }

}