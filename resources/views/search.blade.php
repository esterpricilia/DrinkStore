@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        <nav class="navbar">
            <form class="d-flex" method="GET" action="/search">
                <label for="InputCategory" class="text-md-start" style="padding-right: 50px ">Search: </label>
                <div class="col-md-2" style="display: flex; margin-right: 50px">
                    <select id="category" name="category" class="form-control " id="sel1">
                        <option>Coffee</option>
                        <option>NonCoffee</option>
                    </select>
                    <i class="fas fa-sort-down" style="margin-top:6px ; margin-left: -20px; color:gray"></i>
                </div>
                
                <input name="searchName" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary"type="submit"style="background-color: darksalmon">Search</button>
                
            </form>
                    
           
        </nav>
            
        
        <table class="table">
            @foreach ( $data_product as $item )
            
            <div class="card " style="width: 18rem; margin-left:10px; margin-right:10px; margin-bottom: 20px">
                <img src="{{url('/images')}}/{{$item->image}}" class="card-img-top" alt="..." width="288px" height="288px" style="object-fit: cover">
                <div class="card-body">
                    <h5 class="card-title">{{$item['title']}}</h5>
                    <p class="card-text">{{$item['description']}}</p>
                    <div class="d-grid gap-2">
                        
                        <a href="{{route('detail', $item['id'])}}" class="btn btn-primary "style="background-color: darksalmon" >product detail</a>
                    </div>
                </div>
            </div>
            
        @endforeach
        </table>
        {{$data_product->links()}}
    </div>

</div>


@endsection
