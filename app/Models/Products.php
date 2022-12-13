<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public function images(){
        return $this->hasMany('App\Models\ProductImages','product_id');
    }

    public function additionalInfo(){
        return $this->hasMany('App\Models\ProductAdditionalInfo','product_id')->orderBy('id','asc');
    }
}
