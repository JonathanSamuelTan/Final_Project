@extends('template')

@section('title', 'Welcome')

@section('content')

<div class="row mx-3 justify-content-center">
    @foreach($products as $product)
        <div class="col-sm-3 my-3 mx-3">
         <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'.$product->ProductIMG) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->ProductName}}</h5>
              <p class="card-text">Price: Rp.{{$product->Price}}</p>
              <p class="card-text">Stock: {{$product->Quantity}}</p>
              <a href="#" class="btn btn-primary">Input to Invoice</a>
            </div>
          </div>
        </div>
    @endforeach
</div>
@endsection
