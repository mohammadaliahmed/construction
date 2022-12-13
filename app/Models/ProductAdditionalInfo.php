<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAdditionalInfo extends Model
{
    use HasFactory;
    protected $table='product_additional_info';
    protected $fillable=['product_id','key','value'];
}
