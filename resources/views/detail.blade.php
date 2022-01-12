@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 20px; padding-bottom: 200px">
    <div class="row justify-content-center">
        <div class="col-4">
            <img src="{{url('/images')}}/{{$product->image}}" class="card-img-top" alt="..." width="288px" height="288px" style="object-fit: cover">
        </div>
        <div class="col-6">
            <h3 style="margin-bottom: 20px">{{$product->title}}</h3>
            <h5>Description:</h5>
            <p class="border" style="width:500px; padding: 5px; background-color: rgb(241, 239, 239)">{{$product->description}}</p>
            <h5>Stock:</h5>
            <p style="margin-bottom: 20px">{{$product->stock}} piece(s)</p>
            <h5>Price:</h5>
            <p>Rp. {{$product->price}},-</p>   
            @if(Auth::user()->role == '0' )
                <h5>Add To Cart:</h5>
                <form method="POST" action="{{route('user.storeCart' ,[$product->id, Auth::user()->id])}}">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="quantity" class="col-md-2 col-form-label text-md-start">{{ __('Quantity:') }}</label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                        </div>
                    </div>
                    @if($errors->any())
                        <h6 style="color: red">{{$errors->first()}}</h6>
                    @endif
                    <div class="row ">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="background-color: darksalmon">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
        
    </div>

</div>


@endsection
