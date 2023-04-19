<?php

namespace App\Http\Controllers\customer;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Basket;
use Illuminate\Http\Request;


class BasketController extends Controller
{

    //Show Basket Page
    public function index(){
        $user_id = auth()->user()->id;
        $products = Basket::all()->where('user_id', $user_id );
        return  view('customer_account.basket', compact('products'));
    }

    //Add To Basket Action
    public function add(Request $request, $id){
        $user_id = auth()->user()->id;
        $product = Product::all()->where('id', $id)->first();

        $basket = new Basket();
        $basket->user_id = $user_id;
        $basket->product_id = $id;
        $basket->title = $product->title;
        $basket->image = $product->image;
        $basket->price = $product->price;
        $basket->save();
        return redirect()->back()->with('message', 'You have successfully added a product to your shopping cart');
    }


    public function delete($id){
        $product = Basket::all()->where('id', $id)->first();
        $product->delete();
        return redirect()->back();
    }



}


