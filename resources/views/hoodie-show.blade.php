@extends('backend.layout.admindesign')

@section('title')
<title>products</title>
@endsection

@section('content')
<a href="{{route('hoodie')}}" class="btn btn-primary"> add Products</a>
@include('session')


<div class="row">
    <div class="col-12">
        <div class="card-header">
        <p class="text-center"> Copper Product</p>
        </div>

        <div class="form-group">


        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Product Image</th>

                        <th>Price</th>
                        {{-- <th>Image</th> --}}
                         <th>Quantity</th>
                         <th>Action</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>


                        @foreach ($data as $post)

                                <tr>
                                <td>{{$post->id}}</td>

                                    <td>
                                        @php
                                            $img = ($post->image);
                                            //dd($img);
                                        @endphp
                                          <img src="{{ asset('storage/hoodies/'.$img) }}" height="50px" width="50px">


                                    </td>

                                <td>{{$post->price}}</td>
                                <td>{{$post->Quantity}}</td>
                                <td>{{$post->description}}</td>
                                 <td><a href="/del/{{$post->id}}"class="btn btn-danger"> Delete</a></td>
                                <td><a href="{{ route('edit.hoodie', ['id' => $post->id]) }}" class="btn btn-primary">Update</a></td>

                            </tr>
                        @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>


@if(Session::has('message'))
<script>
toastr.options = {
    "postion":true,
    "progressBar":true,
    "closeButton": true,
}
toastr.success("{{ Session::get('message') }}");
//$.notify("Hello World");
//$.notify("Message addes sucesfully ", "success");
</script>
@endif

@if(Session::has('error'))
<script>
toastr.options = {
    "postion":true,
    "progressBar":true,
    "closeButton": true,
}
toastr.error("{{ Session::get('error') }}");
//$.notify("Hello World");
//$.notify("Message addes sucesfully ", "success");
</script>

@endif

<script>
    $(document).ready( function () {
$('#data').DataTable();
} );
</script>







@endsection
