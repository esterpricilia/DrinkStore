<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function edit($id)
    {
        $data = User::where('id', $id)->findorfail($id);

        return view('user.editData', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->update([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password'])

        ]);
        
        return redirect()->route('home');

    }


    public function storeCart(Request $request,$productid,$userid)
    {   
        $product = Product::where('id', $productid)->first();
        if($product->stock < $request['quantity'])
        {
            return redirect('/Product/Detail/'.$productid)->withErrors(['msg' => 'Input quantity > stock! ']);
        }
        else
        {
            Cart::create([
                'user_id' => $userid,
                'product_id' => $productid,
                'quantity' => $request['quantity'],
                'subtotal' => $product->price *$request['quantity']
    
            ]);
            
            Product::where('id', $productid)->decrement('stock', $request['quantity']);

            $data_cart = Cart::where('user_id', $userid)->get();
            return view('user.cart', compact('data_cart'));
        }
        
        
    }

    public function cart($id)
    {
        $data_cart = Cart::where('user_id', $id)->get();
        return view('user.cart', compact('data_cart'));
    }

    public function deleteCart($id,$product_id, $quantity, $user_id)
    {   
        
        Product::where('id', $product_id)->increment('stock', $quantity);
        $data = Cart::where('id',$id)->delete();
        
        return redirect()->route('user.cart',$user_id);
    }

    public function transaction($id)
    {
       
        Transaction::create([
            'user_id' => $id,
            'date' => date("Y-m-d H:i:s")
        ]);

        $data_cart = Cart::where('user_id', $id)->get();

        foreach($data_cart as $item)
        {   
            TransactionDetails::create([
                'transaction_id' =>  Transaction::max('id'),
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['subtotal']
            ]);

        }
       
        $data = Cart::where('user_id',$id)->delete();
        
        $data = Transaction::where('user_id', $id)->get();
        return view('user.transaction', compact('data'));
    }
    


    public function displayTransaction($id)
    {
        $data = Transaction::where('user_id', $id)->get();
        return view('user.transaction', compact('data'));
    }

    public function detailTransaction($id)
    {
        $data = TransactionDetails::where('transaction_id', $id)->get();
        return view('user.detailTransaction', compact('data'));
    }



}
