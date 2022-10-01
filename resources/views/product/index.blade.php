@extends('product.layout')
@section('content')
    <div class="container">
        <div class="jumbotron mb-4">
            <h1 class="display-4">Hello, world!</h1>

            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create Product </a>
            <a class="btn btn-primary btn-lg" href="{{route('product.trash')}}" role="button">Trash Product </a>
        </div>
    </div>
    <div class="container">
        @if($message=Session::get('success'))
            <div class="alert alert-primary" role="alert">
                    {{$message}}
            </div>
        @endif


    </div>
    <div class="container">

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col" width="400px">Action</th>
        </tr>
        </thead>
        <tbody>
@php
$i=0;
@endphp
        @foreach($products as $item)
        <tr>
            <th scope="row">{{++$i}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}&dollar;</td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{route('products.edit',$item->id)}}">Edit</a>
                        </div>
                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{route('products.show',$item->id)}}">Show </a>
                        </div>

                            <div class="col-sm">
                                <a class="btn btn-primary" href="{{route('soft.delete',$item->id)}}">Soft Delete</a>
                            </div>
                        <div class="col-sm">
                            <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
        {!! $products->links() !!}
    </div>
@endsection
