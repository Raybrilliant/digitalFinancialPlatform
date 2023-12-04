<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class UserController extends Controller
{
    function addCart(Request $req)
    {
        $order_number = Str::uuid();
        $data = [
            'product_id' => $req->id,
            'user_id'=> session()->get('id'),
            'order_number' => session()->get('order_number') ?? $order_number,
            'variant' => $req->variant,
            'note' => $req->note,
            'amount' => $req->amount,
        ];
        Invoice::create($data);
        Product::where('id',$req->id)->decrement('stock',$req->amount);
        return redirect("/cart/" . $data['order_number']);
    }

    function deleteCart(Request $req){
        $data = Invoice::where('id',$req->id)->first();
        Product::where('id',$data->Product->id)->increment('stock',$data->amount);
        $data->delete();
        $check = Invoice::where('order_number', $data->order_number)->first();
        if (!$check) {
            session()->remove('cart');
            session()->remove('order_number');
            return redirect()->intended();
        }
        return back();
    }

    function pay(Request $req)
    {
        $data = Invoice::where('order_number', $req->id);
        $amount = 0;
        foreach ($data->get() as $item) {
            $amount = $item->Product->price * $item->amount + $amount;
            $items[] = [
                'id' => $item->Product->id,
                'price' => $item->Product->price,
                'quantity' => $item->amount,
                'name' => $item->Product->name,
            ];
        };

        $items[] = [
            'id' => 'Fee01',
            'price' => 6000,
            'quantity' => 1,
            'name' => 'Delivery Fee',
        ];

        Config::$serverKey = 'SB-Mid-server-nd95sHcD8LxrmwiJ-WBCMKyI';
        Config::$isProduction = false;

        $data = $data->first();
        $params = [
            'transaction_details' => [
                'order_id' => $req->id,
                'gross_amount' => $amount
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => $data->user->profile->name,
                'email' => $data->user->profile->email,
                'phone' => $data->user->profile->phone_number,
                'shipping_address' => [
                    'address' => $data->user->profile->address
                ]
            ]
        ];

        $token = Snap::getSnapToken($params);
        return response()->json([
            'token' => $token
        ]);
    }

    function updateProfile(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'address' => $req->address,
            'user_id' => session()->get('id'),
            'phone_number' => $req->phoneNumber,
        ];
        Profile::updateOrCreate(['user_id' => session()->get('id')],$data);
        return back();
    }

    function flushSession(){
        session()->invalidate();
        return redirect()->intended('/');       
    }
}
