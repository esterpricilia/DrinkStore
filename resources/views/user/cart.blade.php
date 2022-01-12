@extends('layouts.app')

@section('content')
<div class="container" style="padding: 50px; padding-bottom: 200px">
    <div class="row justify-content-center">
      <h3>Cart</h3>
      <table class="table">
          <thead class="table-dark">
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">Delete</th>
                </tr>
          </thead>
          <tbody>
            
            @forelse ( $data_cart as $item )
              <tr>
                  <td class="col-2">{{ ($loop->index + 1)}}</td>
                  <td>{{$item->product->title}}</td>
                  <td>{{$item->product->price}}</td>
                  <td>{{$item['quantity']}}</td>
                  <td>{{$item['subtotal']}}</td>
                  <td class="col-3">
                      <a href="{{route('user.deleteCart',[$item->id, $item->product_id, $item->quantity, $item->user_id] )}}" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
              @empty 
              <tr>
                <td>
                  <h4>Nothing product in  cart</h4>
                </td>
              </tr>
              
            @endforelse
            
          </tbody>
      </table>
      <div class="text-end">
        <h5 >Grand total: Rp.{{$data_cart->sum('subtotal')}},-</h5>
        <a href="{{route('user.transaction', Auth::user()->id)}}"  class="btn btn-primary" style="background-color: darksalmon">Checkout</a>
      </div>
      
              
    </div>
</div>
@endsection
