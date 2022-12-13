<?php

namespace App\Http\Controllers;

use App\Models\CustomFunctions;
use App\Models\ProductAdditionalInfo;
use App\Models\ProductImages;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

            $keys=$request->key;
            $values=$request->value;
            for($i=0;$i<sizeof($keys);$i++){
                ProductAdditionalInfo::create([
                    'product_id' => $product->id,
                    'key' => $keys[$i],
                    'value' => $values[$i]
                ]);
            }


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
        $Products = Products::orderBy('id', 'desc')->get();
        return $this->LoadView('listOfProducts', ['Products' => $Products]);
    }

    public function EditProduct(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $product = Products::find($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->subtitle = $request->subtitle;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->status = 'active';
            $product->update();

            $ProductAdditional = new ProductAdditionalInfo();
            $ProductAdditional->where('product_id', $id)->delete();

//            dd($request->all());

            $keys=$request->key;
            $values=$request->value;
            for($i=0;$i<sizeof($keys);$i++){
                ProductAdditionalInfo::create([
                    'product_id' => $product->id,
                    'key' => $keys[$i],
                    'value' => $values[$i]
                ]);
            }
            $imgs=$request->file('image');
            if(isset($imgs)) {
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
            }
            return redirect()->to('/products');
        } else {


            $Product = Products::find($id);
            return $this->LoadView('editProduct', ['Product' => $Product]);
        }
    }

    public function DeleteImage(Request $request, $id)
    {
        ProductImages::find($id)->delete();
        return Redirect::back();


    }
}
