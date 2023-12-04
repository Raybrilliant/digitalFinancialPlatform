<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // User
    function index(Request $req){
        $data = Product::select('id','name','picture','price')->where('name','LIKE',"%$req->q%")->where('stock','>',0)->get();
        return view('user/home',[
            'data' => $data
        ]);
    }
    function detail(Request $req){
        $data = Product::where('id',$req->id)->first();
        $variant = explode(',',$data->variant);
        return view('user/detail',[
            'data' => $data,
            'variant' => $variant
        ]);
    }
    function cart(Request $req) {
        session()->put('order_number',$req->id);
        $data = Invoice::where('order_number',session()->get('order_number'));
        session()->put('cart',$data->sum('amount'));
        return view('user/cart',[
            'data' => $data->get()
        ]);
    }
    function profile(){
        $data = User::where('id',session()->get('id'))->first();
        return view('user/profile',[
            'data' => $data
        ]);
    }
    function login(){
        return view('user/login');
    }
    function register(){
        return view('user/register');
    }
    
    // Admin
    function adminIndex(){
        $invoice = Invoice::all();
        $total = 0;
        foreach ($invoice as $item) {
            $total = $item->Product->price*$item->amount+$total;

        };
        $user = User::count('id');
        $data = [
            'order' => $invoice->count('order_number'),
            'income' => $total,
            'user' => $user,
            'data' => $invoice
        ];
        return view('admin/dashboard', $data);
    }

    function adminProduct(){
        $data = Product::all();
        return view('admin/product',[
            'data' => $data
        ]);
    }
    function adminAddProduct(Request $req){
        if ($req->id) {
            $data = [
                'data' => Product::where('id',$req->id)->first(),
                'title' => 'Edit'
            ];
        } else {
            $data = [
                'title' => 'Add'
            ];
        }

        return view('admin/addProduct',$data);
    }

    function adminLogin(){
        return view('admin/login');
    }
}
