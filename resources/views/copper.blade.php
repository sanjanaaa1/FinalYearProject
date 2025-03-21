@extends('backend.layout.admindesign')

@section('title')
<title>products</title>
@endsection

@section('content')
<!-- <h1> </h1> -->

<div class="container">
   <div class="row mb-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Copper Products </h5>
              </div>
            <div class="card-body">
                <form action="{{route('men-hoodie')}}"  enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="form-group mb-4">
                    <label for="name"> Prduct Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                       @error('name')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="name"> Price</label>
                    <input type="text" name="price" id="name" class="form-control @error('price') is-invalid @enderror" value={{old('value')}}>
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="name"> Category</label>
                    <input type="text" name="category_name" id="name" class="form-control @error('category_name') is-invalid @enderror" value={{old('value')}}>
                       @error('category_name')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="name"> Quantity</label>
                    <input type="number" name="Quantity" id="name" class="form-control @error('Quantity') is-invalid @enderror" value={{old('value')}}>
                       @error('Quantity')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>




                  <div class="form-group mb-3">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="image" multiple/>
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif

                 <br>


                  </div>

                  <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>



                  <div class="form-group text-left">
                    <button type ="submit" class="btn btn-primary"> Create</button>
                    <a href="{{route('hoodie-data')}}" class="btn btn-primary">  Show products</a>



                  </div>

                </form>
            </div>
        </div>

    </div>

   </div>

</div>




@endsection
