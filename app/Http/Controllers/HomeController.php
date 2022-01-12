<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Product = new Product();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $data_product = Product::simplePaginate(6);

        return view('home', compact('data_product'));

    }



    public function detailProduct($id)
    {
        $data = [
            'product' => $this->Product->detail($id),
        ];
        return view('detail', $data);
    }

    public function search(Request $request)
    {
        $category = $request->category;
        $name = $request->searchName;
        $data_product = Product::where('category', 'LIKE', '%'.$category.'%') 
                                -> where('title', 'LIKE', '%'.$name.'%')
                                -> simplePaginate(6);
        
        return view('search', compact('data_product'));
    }

}
