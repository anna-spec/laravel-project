<?php

namespace App\Http\Controllers\seller;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class ProductController extends Controller
{


    public function index()
    {

        $products = Product::all();
        return view('shop', compact('products'));
    }


    public function add()
    {
        return view('seller_account.products.add');
    }


    public function create(Request $request, Product $product)
    {

//        $request->validate([
//            'title'=> 'required',
//            'image'=> 'required|email|unique:users',
//            'description'=> 'required|min:3|max:6',
//        ]);




        // Save the file locally in the storage/public/ folder under a new folder named /product
        $request->image->store('product', 'public');


        $user_id = auth()->user()->id;

        $product->user_id = $user_id;
        $product->title = $request->title;
        $product->image = $request->image->hashName();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $res = $product->save();
        if ($res) {
            return redirect('seller/product-list')->with("status", "Product added successfully!");
        } else {
            return back()->with('Process failed');
        }
    }

    public function adminProductList()
    {
        $user_id = auth()->user()->id;
        $products = Product::all()->where('user_id', $user_id );
        return view('seller_account.products.list', compact('products'));
    }


    public function editForm($id){
        $product = Product::all()->where('id', $id)->first();
        return view('seller_account.products.edit', compact('product', 'id'));
    }


    public function update(Request $request, $id)
    {
        $this->deleteOldImage($id);

        // Save the file locally in the storage/public/ folder under a new folder named /product


        $request->image->store('product', 'public');


        $product = Product::all()->where('id', $id)->first();
        $product->title = $request->title;
        $product->image = $request->image->hashName();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->update();

        return redirect('seller/product-list');
    }




    protected function deleteOldImage($id)
    {
        $product = Product::all()->where('id', $id)->first();
        $fileName = $product->image;
        if ($fileName) {
            Storage::delete('public/product/' . $fileName);
        }
    }



    public function delete($id){
        $product = Product::all()->where('id', $id)->first();
        $product->delete();
        return redirect('seller/product-list');
    }

}
