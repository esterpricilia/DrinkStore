@extends('layouts.app')

@section('content')
<div class="container" style="padding: 150px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <table class="table table-borderless " >
                    <thead>
                      <tr class="table-light">
                        <th scope="col">User ID</th>
                        <th scope="col">Username</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody class="table-secondary">
                        
                        @foreach ( $data_user as $item )
                            @if($item->role == '0' )
                                <tr>
                                    <td class="col-2">{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td class="col-3">
                                        <a href="{{route('admin.deleteUser',$item->id)}}" onclick="return confirm('Apakah anda yakin akan menghapus user {{$item['name']}}?')" class="btn btn-primary" style="background-color: darksalmon">Delete</a>
                                    </td>
                                </tr>
                            @endif
                            
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
