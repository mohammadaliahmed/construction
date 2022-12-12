<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends ViewController
{
    //
    public function  AddProduct(Request $request){
        if ($request->isMethod('post')) {

        }else{
            return $this->LoadView('addProduct');
        }
    }
}
