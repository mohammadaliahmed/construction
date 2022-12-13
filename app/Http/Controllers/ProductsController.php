<?php

namespace App\Http\Controllers;

use App\Models\CustomFunctions;
use App\Models\ProductImages;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends ViewController
{
    //
    public function AddProduct(Request $request)
    {
        if ($request->isMethod('post')) {
            $product = new Products();
            $product->title = $request->title;
            $product->description = $request->description;
            $product->subtitle = $request->subtitle;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = 'active';
            $product->save();

            foreach ($request->file('image') as $file) {
                $imageName = CustomFunctions::generateRandomString(15) . ".jpg";
                $uploadPath = 'uploaded_images/';
                $imageUrl = $uploadPath . $imageName;
                $file->move($uploadPath, $imageName);
                $image = new ProductImages();
                $image->url = $imageUrl;
                $image->product_id = $product->id;
                $image->save();
            }
            return redirect()->to('/products');
        } else {

            return $this->LoadView('addProduct');
        }
    }

    public function ListProducts()
    {
        $Products = Products::all();
        return $this->LoadView('listOfProducts', ['Products' => $Products]);
    }
}
