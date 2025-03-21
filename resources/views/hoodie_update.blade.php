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
                <h5>Copper Products <span>Details</span></h5>
              </div>


            <div class="card-body">
                <form action="{{route('update.hoodie',['id' =>$data->id])}}" enctype="multipart/form-data" method="POST">
                  @csrf
                  {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}

                  <div class="form-group mb-4">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->title }}">
                       @error('name')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $data->price }}">
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="name"> Quantity</label>
                    <input type="number" name="Quantity" id="name" class="form-control @error('price') is-invalid @enderror" value={{$data->Quantity}}>
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="category_name">Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $data->category_name }}">
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
                    $img = ($data->image);
                    //dd($img);
                @endphp
                  <img src="{{ asset('storage/hoodies/'.$img) }}" height="50px" width="50px">

                 <br>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $data->description }}</textarea>
                    @error('description')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group text-left">
                    <button type="submit" class="btn btn-primary">Update</button>

                  </div>
                </form>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection
