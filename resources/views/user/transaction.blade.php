@extends('layouts.app')

@section('content')
<div class="container" style="padding: 50px; padding-bottom: 200px">
    <div class="row justify-content-center">
      <h3>Transaction</h3>
      <table class="table">
          <thead class="table-dark">
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Transaction Time</th>
                  <th scope="col">Detail Transaction</th>
                </tr>
          </thead>
          <tbody>
            @foreach ( $data as $item )
              
              <tr>
                  <td class="col-2">{{ ($loop->index + 1)}}</td>
                  <td>{{$item['date']}}</td>
                  <td class="col-3">
                      <a href="{{route('user.detailTransaction',$item['id'])}}" class="btn btn-primary" style="background-color: darksalmon">Check Detail</a>
                  </td>
              </tr>
              
            
            @endforeach
          </tbody>
      </table>
      
      
              
    </div>
</div>
@endsection
