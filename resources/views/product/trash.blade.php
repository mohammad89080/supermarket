@extends('product.layout')
@section('content')
    <div class="container">
        <div class="jumbotron mb-4">
            <h1 class="display-4">Hello, world!</h1>

            <hr class="my-4">
            <p>Trashed Products</p>
            <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Home </a>
        </div>
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
                            <a class="btn btn-primary" href="{{route('product.backTrash',$item->id)}}">Back </a>

                        </div>
                        <div class="col-sm">
                            <a class="btn btn-danger" href="{{route('product.deletefForEver',$item->id)}}">delete </a>

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
