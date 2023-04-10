<!DOCTYPE html>
<html>
  <head>
    <title>Update Product</title>
    <link rel="stylesheet" type="text/css" href="{{asset('CSS/AddProduct.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar" style="background-color: #263159;">
        <div class="container-fluid">
          <div class="row justify-content-center align-items-center w-100">
            <a class="navbar-brand" href="dashboard" style="color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size: 1.7rem;">
              <img src="../assets/logo.png" alt="logo" width="75" height="75" class="d-inline-block align-text-middle">
              Meksiko Retail Store
            </a>
            <h1 class="text-white text-center mx-auto">Update Product</h1>
          </div>
        </div>
    </nav>
    
    <form id="product-form" action="{{route('UpdateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="product-name">Product Name</label>
        <input type="text" id="product-name" name="ProductName" minlength="8" maxlength="80"  value="{{ old('ProductName', $product->ProductName) }}" required >
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select id="category" name="CategoryID" required>
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == $product->CategoryID ? 'selected' : '' }}>{{$category->CategoryName}}</option>
            @endforeach
        </select>
      </div>
    
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="Price" required min="1" value="{{ old('Price', $product->Price) }}">
      </div>
      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="Quantity" required min="1" value="{{ old('Quantity', $product->Quantity) }}">
      </div>
      <div class="form-group">
        <label for="product-image">Product Image</label>
        <input type="file" id="product-image" name="ProductIMG" accept="image/*">
      </div>
      <button type="submit">Update Product</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
