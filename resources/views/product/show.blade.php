@extends('product.layout')
@section('content')
    <div class="container" style='padding-top:12%'>
        <div class="card "  >
            {{--            <img src="..." class="card-img-top" alt="...">--}}
            <div class="card-body">
                <h5 class="card-title">Product Name:{{$product->name}}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                {{--                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                <a class="btn btn-danger" href="{{route('products.index')}}">Back</a>
            </div>
        </div>
    </div>


    <div class="container" style='padding-top:2%'>

            <div class="form-group">
                <label for="exampleFormControlInput1">{{$product->name}}</label>

            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">{{$product->price}}</label>

            </div>

            <div class="form-group">
                {!!$product->detail !!}
            </div>



    </div>
@endsection
