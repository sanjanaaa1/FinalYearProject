@extends('backend.layout.admindesign')

@section('title')
<title>products</title>
@endsection

@section('content')
<h1> Brass Product</h1>

<div class="container">
   <div class="row mb-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h5> Products <span>show</span></h5>
              </div>
            <div class="card-body">
                <form action="{{route('men-store')}}"  enctype="multipart/form-data" method="POST">
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
                    <input type="text" name="price" id="name" class="form-control @error('price') is-invalid @enderror" value={{old('price')}}>
                       @error('price')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>

                  <div class="form-group mb-3">
                    <label for="name"> Category</label>
                    <input type="text" name="category_name" id="name" class="form-control @error('price') is-invalid @enderror" value={{old('category_name')}}>
                       @error('category_name')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>
                  <div class="form-group mb-3">
                    <label for="name"> Quantity</label>
                    <input type="number" name="Quantity" id="name" class="form-control @error('price') is-invalid @enderror" value={{old('Quantity')}}>
                       @error('Quantity')
                       <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                       </span>
                       @enderror
                  </div>




                  <div class="form-group mb-3">
                    <span class="sr-only">Choose File</span>
                    <input type="file" name="image[]" multiple/>

                 <br>


                  </div>
                  @error('image')
                    <span class="alert alert-danger">
                     <strong>{{$message}}</strong>
                    </span>
                    @enderror

                  <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3" value="{{old('description')}}"></textarea>
                  </div>



                  <div class="form-group text-left">
                    <button type ="submit" class="btn btn-primary"> create</button>
                    <a href="{{route('men.show')}}" class="btn btn-primary"> Back</a>

                  </div>

                </form>
            </div>
        </div>

    </div>

   </div>

</div>
    {{-- table of contents begins from here
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>men shoes </h5>
                </div>

                <table class="table table-striped" id="data_table">
                    <thead class="thead-dark">
                      <tr>
                       <th> id</th>
                        <th>Full name</th>
                        <th> Email</th>
                        <th>Number</th>
                        <th>Created At</th>

                    </tr>
                    </thead>

                   <tbody>

                  @foreach ($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    {{-- <td>{{$user->full_name}}</td> --}}


                  {{-- </tr>
                  </tbody>
                  @endforeach
                  </table>
            </div>
        </div>
    </div> --}}



@endsection
