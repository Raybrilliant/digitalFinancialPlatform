<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function addProduct(Request $req){
        $data = [
            'name' => $req->name,
            'picture' => $req->picture,
            'category' => $req->category,
            'description' => $req->description,
            'variant' => $req->variant,
            'stock' => $req->stock,
            'price' => $req->price,
        ];
        Product::updateOrCreate(['id' => $req->id],$data);
        return redirect('/admin/product');
    }

    function deleteProduct(Request $req){
        $data = Product::where('id',$req->id);
        $data->delete();
        return back()->with('msg','Item Success Deleted');
    }
}
