@extends('template')

@section('title', 'Admin Panel')

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
              {{-- delete button --}}
              <form action="{{route('DeleteProduct',$product->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('UpdateProductForm',$product->id)}}" class="btn btn-success">Update</a>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
    @endforeach
</div>
@endsection
