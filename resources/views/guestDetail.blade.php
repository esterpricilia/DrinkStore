@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 20px; padding-bottom: 200px">
    <div class="row justify-content-center">
        @foreach ( $product as $item )
            @if ($item['id'] == $id)
                <div class="col-4">
                    <img src="{{url('/images')}}/{{$item['image']}}" class="card-img-top" alt="..." width="288px" height="288px" style="object-fit: cover">
                </div>
                <div class="col-6">
                    <h3 style="margin-bottom: 20px">{{$item['title']}}</h3>
                    <h5>Description:</h5>
                    <p class="border" style="width:500px; padding: 5px; background-color: rgb(241, 239, 239)">{{$item['description']}}</p>
                    <h5>Stock:</h5>
                    <p style="margin-bottom: 20px">{{$item['stock']}} piece(s)</p>
                    <h5>Price:</h5>
                    <p>Rp. {{$item['price']}},-</p>   
                
                </div>
            @endif
            
        @endforeach
    </div>

</div>


@endsection
