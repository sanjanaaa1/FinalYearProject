@extends('backend.layout.admindesign')

@section('title')
<title>Update Products</title>
@endsection

@section('content')
<h5>Update Products</h5>

<div class="container">
   <div class="row mb-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Brass Product <span>Details</span></h5>
              </div>

            <div class="card-body">
                <form method="POST" action="{{ route('shoe.update', ['id' => $posts->id]) }}" enctype="multipart/form-data">
                  @csrf
                  {{-- <input type="hidden" name="id" value="{{ $posts->id }}"> --}}
                  <div class="form-group mb-4">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $posts->title }}">
                       @error('name')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $posts->price }}">
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="name"> Quantity</label>
                    <input type="number" name="Quantity" id="name" class="form-control @error('price') is-invalid @enderror" value={{$posts->Quantity}}>
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $posts->category_name }}">
                       @error('category_name')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="image[]" multiple/>
                    @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    @php
                        $img = json_decode($posts->image);
                    @endphp
                    @foreach ($img as $row)
                        <img class="figure-img img-fluid rounded" src="{{ asset('storage/shoes/'.$row) }}" height="80px" width="80px">
                    @endforeach
                 <br>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $posts->description }}</textarea>
                    @error('description')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group text-left">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-success float-right">Show Data</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection
