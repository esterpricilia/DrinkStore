<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    

    public function input()
    {
        return view('admin.insert');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $data_product = Product::where('id', $id)->findorfail($id);
        return view('admin.updateProduct', compact('data_product'));
    }
    public function update(Request $request, $id)
    {
        $data_product = Product::where('id', $id)->update([
            'category' => $request['category'],
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'image' => $request['image']

        ]);
        return redirect()->route('home');

    }

    public function Manage()
    {
        $data_user = User::all();
        return view('admin.manageUser', compact('data_user'));
    }
    public function deleteUser($id)
    {
        $data = User::where('id',$id)->delete();
        
        return redirect()->route('admin.manageUser');
    }





}
