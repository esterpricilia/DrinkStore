@extends('layouts.app')

@section('content')
<div class="container" style="padding: 50px; padding-bottom: 200px">
    <div class="row justify-content-center">
      <h3>Transaction Detail</h3>
      <table class="table">
          <thead class="table-dark">
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Item Detail</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Sub Total</th>
                </tr>
          </thead>
          <tbody>
            @foreach ( $data as $item )
              
              <tr>
                  <td class="col-2">{{ ($loop->index + 1)}}</td>
                  <td>{{$item->product->title}}</td>
                  <td>{{$item->product->description}}</td>
                  <td>{{$item->product->price}}</td>
                  <td>{{$item['quantity']}}</td>
                  <td>{{$item['subtotal']}}</td>
                  
              </tr>
              
            
            @endforeach
          </tbody>
      </table>
      <div class="text-end">
        <h5 >Grand total: Rp.{{$data->sum('subtotal')}},-</h5>
      </div>
      
              
    </div>
</div>
@endsection
