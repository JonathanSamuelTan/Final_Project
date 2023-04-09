<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction</title>
    <link rel="stylesheet" href="{{asset('CSS/transaction.css')}}">
</head>
<body>
    <nav>
        <ul class="navbar">
            <li><a href="{{route('cart')}}">Cart</a></li>
            <li><a href="{{route('dashboard')}}">Products</a></li>
        </ul>
    </nav>

    <form action="{{ route('TransactionDone') }}" method="POST">
        @csrf
        <div class="content">
            <h1>Invoice No:</h1>
            {{-- input field (read only) to show invoice no--}}
            <input id="InvoiceNo" type="text" name="InvoiceNo" value="{{$InvoiceNo}}"readonly>
        </div>
        <div class="content">
            <div class="alamat-title">
                <h2>Tujuan Pengiriman</h2>
            </div>
            <div class="alamat-isi">
                <div class="alamat-profil">
                    {{-- concat first name & last name --}}
                    <p>{{$user->name}}</p>
                    <p class="no-telp">{{$user->phone}}</p>
                </div>
                <div class = "Alamat_ZIP">
                    <input id="alamat" type="text" placeholder="Input Shipment Address" name="address"
                    minlength="10"
                    maxlength="100"
                    required
                    >
                    {{-- input must be 5 digit number--}}
                    <input id="ZIP" type="string" placeholder="Input ZIP Code" name="ZIPCode"
                    maxlength='5'
                    minlength='5'
                    pattern="[0-9]{5}"
                    required
                    >
                </div>
            </div>
        </div>
        
        <div class="content">
            <h2>Produk Dipesan</h2>
            <table>
                <col width="500px"/>
                <col width="150px"/>
                <col width="150px"/>
                <col width="150px"/>
                <thead>
                    <tr>
                        <td>Produk</td>
                        <td>Harga Satuan</td>
                        <td>Jumlah</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach ($carts as $c)
                        <tr>
                            <td>
                                <div class="item-info">
                                    <img src="{{asset('storage/product/'.$c->Product->ProductIMG)}}" alt="">
                                    <h5>{{$c->Product->ProductName}}</h5>
                                </div>
                            </td>
                            <td>Rp.{{$c->Product->Price}}</td>
                            <td>{{$c->quantity}}</td>
                            <td>Rp.{{$c->Product->Price * $c->quantity}}</td>
                        </tr>
                        {{-- Count Total Price --}}
                        @php
                        $totalPrice += $c->Product->Price * $c->quantity; 
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="end">
                <h2>Total pesanan ({{count($carts)}} Produk)</h2>
                <h2 id="price">Rp.{{$totalPrice}}</h2>
            </div>
        </div>

        <div class="pesan">
            <button class="pesan-btn" type="submit">
                <h2>Print Invoice</h2>
            </button>
        </div>
    </form>
    <script type="text/javascript" src="{{asset('JS/transaction.js')}}"></script>
</body>
</html>