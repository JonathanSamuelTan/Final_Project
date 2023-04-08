@extends('template')

@section('title', 'Inventory')

@section('content')

<div class="row mx-3 justify-content-center">
    @foreach($products as $product)
        <div class="col-sm-3 my-3 mx-3">
         <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/product/'.$product->ProductIMG) }}" class="card-img-top" alt="..." height="300px" width="100%">
            <div class="card-body">
              <h5 class="card-title">{{$product->ProductName}}</h5>
              <p class="card-text">Price: Rp.{{$product->Price}}</p>
              <p class="card-text">Stock: {{$product->Quantity}}</p>
              {{-- Form to add product to cart --}}
              <form action="{{route('cart.store')}}" method="POST">
                @csrf
                <input type="hidden" name="ProductID" value="{{$product->id}}">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
              </form>
            </div>
          </div>
        </div>
    @endforeach
</div>
@endsection
