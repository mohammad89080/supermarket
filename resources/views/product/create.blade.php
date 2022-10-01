@extends('product.layout')
@section('content')
<div class="container" style='padding-top:12%'>
    <div class="card "  >
        {{--            <img src="..." class="card-img-top" alt="...">--}}
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            {{--                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
            <a class="btn btn-danger" href="{{route('products.index')}}">Back</a>
        </div>
    </div>
</div>


    <div class="container" style='padding-top:2%'>
    <form action="{{route('products.store')}}"  method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control"  placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" name="price" class="form-control"  placeholder="Product Price">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Details </label>
            <textarea class="form-control" name="detail"  rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn mt-2 btn-primary">Save</button>
        </div>

    </form>
    </div>
@endsection
