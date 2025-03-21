@extends('backend.layout.admindesign')

@section('title')
<title>News/Blog</title>
@endsection

@section('content')
<h1>News/Blog</h1>

<div class="container">
   <div class="row mb-5">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h5>Men Hooies </h5>
              </div>
            <div class="card-body">
                 <form action="{{ route('news.update', ['id' => $data->id]) }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  <div class="form-group mb-4">
                    <label for="name"> News and Blog</label>
                    <input type="text" name="title" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->title }}">
                       @error('name')
                       <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                  </div>
                  {{-- @php
                  $img = explode(',', $data->image);
              @endphp

              @foreach ($img as $row)
                  <img class="figure-img img-fluid rounded" src="{{ asset('storage/newsblog/'.$row) }}" height="80px" width="80px">
              @endforeach --}}
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
                    <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" rows="3">{{ $data->description }}</textarea>

                  </div>



                  <div class="form-group text-left">
                    <button type ="submit" class="btn btn-primary"> create</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>



                  </div>

                </form>
            </div>
        </div>

    </div>

   </div>

</div>

@endsection
