{{-- @extends('template')

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
@endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset("CSS/adminPanel.css")}}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <nav>
        <ul class="navbar">
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="LogoutBTN">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="title">
        <h1>Admin Panel</h1>
        <a href="{{route('AddProductForm')}}"><button type="button" class="addButton">+ Add Product</button></a>
    </div>

    <div class="table">
        <table>
            <thead>
                <col width="35%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <tr>
                    <th>PRODUCTS</th>
                    <th>PRICE</th>
                    <th>STOCK</th>
                    <th>Category</th>
                    <th>EDIT/DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>
                        <div class="product-column">
                            <img src="{{asset('storage/product/'.$product->ProductIMG)}}" alt="">
                            <div>
                                <h3>{{$product->ProductName}}</h3>
                                <p>Product ID: {{$product->id}}</p>
                            </div>
                        </div>
                    </td>
                    <td>Rp.{{$product->Price}}</td>
                    <td>{{$product->Quantity}}</td>
                    <td>
                      @if($product->Category)
                      {{$product->Category->CategoryName}}
                      @else
                      No category
                       @endif
                    </td>
                    <td>
                        <div class="editDelete">
                            <a href="{{route('UpdateProductForm',$product->id)}}">
                                <button type="button"><i class="uil uil-edit"></i></button>
                            </a>
                            <form action="{{route('DeleteProduct',$product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"><i class="uil uil-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>