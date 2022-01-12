@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            @foreach ( $data_product as $item )
            
                <div class="card " style="width: 18rem; margin-left:10px; margin-right:10px; margin-bottom: 20px">
                    <img src="{{url('/images')}}/{{$item->image}}" class="card-img-top" alt="..." width="288px" height="288px" style="object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{$item['title']}}</h5>
                        <p class="card-text">{{$item['description']}}</p>
                        <div class="d-grid gap-2">
                            <a href="{{route('detailGuest', $item['id'])}}" class="btn btn-primary" style="background-color: darksalmon">product detail</a>
                        </div>
                    </div>
                </div>
            
            @endforeach
        </table>
        {{$data_product->links()}}
    </div>

</div>


@endsection
