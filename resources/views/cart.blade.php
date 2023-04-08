<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="{{asset('CSS/cart.css')}}">
</head>
<body>
  <nav style="box-shadow: 10px">
    <ul class="navbar">
        <li><a href="\">Inventory</a></li>
    </ul>
  </nav>

  <div class="title">
    <h1>Keranjang anda.</h1>
  </div>

    <div class="row">
        @foreach ($carts as $c)
        <div class="content">
          <img src="{{asset('storage/product/'.$c->Product->ProductIMG)}}" alt="">
          <div class="desc">
              <p>{{ $c->Product->ProductName }}</p>
              <span class="quantity">
                  <form action="{{route('cart.increase',$c->product_id)}}"  method="POST">
                    @csrf
                    @method('PATCH')
                    <button id="increase" type="submit"><p>+</p></button>
                  </form>
                  <p id="amount">{{$c->quantity}}</p>
                  <form action="{{route('cart.decrease',$c->product_id)}}"  method="POST">
                    @csrf
                    @method('PATCH')
                    <button id="decrease" type="submit"><p>-</p></button>
                  </form>
              </span>
            </div>
          </div>
          @endforeach
          <div class="buy">
            {{-- <a class="buy-btn" href="{{route('getTransactionPage')}}">Beli Sekarang</a> --}}
          </div>
    </div>
</body>
</html>