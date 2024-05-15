<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insertproduct(Request $request){
        $product = new Product();
        $product->product_name =  $request->product_name;
        $product->description =  $request->description;
        $product->price =  $request->price;
        $product->save();
        return response()->json($product);
        


    }

    public function getproduct()
    {
        $product = product::all();
        return $product;
    }

 

    public function updateProduct(Request $request)
    {
        $product = Product::find($request->id);
            $product->product_name =  $request->product_name;
            $product->description =  $request->description;
            $product->price =  $request->price;
            $product->save();
            if ($product) {
                return ["response"=>"Product updated"]; 
            }else{
                return ["response"=>"Product not updated"]; 
            }
            
       
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $result = $product->delete();
        if ($result) {
            return ["result"=>"product deleted successfully"];
        }else{
            return ["result"=>"product not deleted "];
        }
    }

}
