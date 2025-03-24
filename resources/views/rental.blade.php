@extends('fontend.fontend-design')

@section('title')
<title>Rent Products</title>
@endsection  

@section('content')
<div class="container mt-5">

    <h1 class="text-center mb-4">Rent Products</h1>

    <div class="row">
        <!-- Left Side: Product Details -->
        <div class="col-md-6">
            <h2 class="mb-4 font-weight-bold text-primary">Product Name: {{ $rent_data['product_title'] }}</h2>
            
            <div class="product-container mb-3">
                <img src="{{ asset('storage/hoodies/'.$rent_data['product_image']) }}" class="img-fluid rounded shadow" alt="Product Image">
            </div>

            <p class="mb-2"><strong>Price:</strong> {{ $rent_data['product_price'] }}</p>
            <p class="mb-2"><strong>Category:</strong> {{ $rent_data['category_name'] }}</p>
        </div>

        <!-- Right Side: Rental Form -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Product Rental Request</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('rent.add') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        @if(Session::has('error'))
                            <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif

                        <div class="form-group">
                            <label for="title">Product</label>
                            <input type="text" name="title" id="title" 
    class="form-control @error('title') is-invalid @enderror" 
    value="{{ old('title', $rent_data['product_title']) }}">

                            @error('title')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rental-duration">Rental Duration (days)</label>
                            <input type="number" id="rental-duration" name="rental_duration" class="form-control" min="1" placeholder="Enter rental duration">
                        </div>

                        <div class="form-group">
                            <label for="citizenship">Upload Your Citizenship Photo</label>
                            <input type="file" name="image" class="form-control-file">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="category_name" value="{{ $rent_data['category_name'] }}">
                        <div class="form-group text-left">
                            <button type="submit" class="btn btn-primary">Request Rental</button>
                            <button type="button" class="btn btn-secondary" onclick="history.back();">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- End of row -->

    <!-- Rental Notice in Red Letters -->
    <p class="text-danger text-center font-weight-bold mt-4">
        In case of damage, you will be charged a fine!!
    </p>

</div> <!-- End of container -->

<!-- Styles -->
<style>
    .product-container {
        width: 350px;
        height: 350px;
        border: 2px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9f9f9;
    }

    .product-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@endsection
