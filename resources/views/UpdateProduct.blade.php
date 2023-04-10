<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="{{asset('CSS/AddProduct.css')}}">
</head>
<body>
    <div class="content">
        <div>
            <h2>Add Product</h2>
        </div>
        <form action="{{route('UpdateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form">
                <label for="">Product Name</label>
                <input type="text" name="ProductName" placeholder="Masukkan nama barang di sini" minlength="8" maxlength="80"  value="{{ old('ProductName', $product->ProductName) }}" required>

                <label for="category">Category</label>
                <select id="category" name="CategoryID" required>
                  @foreach($categories as $category)
                      <option value="{{$category->id}}" {{ $category->id == $product->CategoryID ? 'selected' : '' }}>{{$category->CategoryName}}</option>
                  @endforeach
                </select>
                
                <label for="">Product Price</label>
                <input type="number" name="Price" placeholder="Masukkan harga barang di sini" value="{{ old('Price', $product->Price) }}" required min="1">

                <label for="">Product Stock</label>
                <input type="number" name="Quantity" placeholder="Masukkan stok barang di sini" value="{{ old('Quantity', $product->Quantity) }}" required min="1">

                <label>Gambar Barang</label>
                <input type="file" id="file-input" name="ProductIMG" accept="image/*">

                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
