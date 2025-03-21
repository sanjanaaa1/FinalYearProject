@extends('backend.layout.admindesign')

@section('title')
<title>products</title>
@endsection


@section('content')
<h4>  prouducts</h4>
<a href="{{route('men')}}" class="btn btn-primary"> add Products</a>
@include('session')
<div class="row">
    <div class="col-12">
        <div class="card-header">
        <p class="text-center"> Brass Product</p>
        </div>

        <div class="form-group">


        <div class="card-body">
            {{-- @if(Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif --}}


            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Product Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Descrpiton</th>
                        <th>Action</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>


                        @foreach ($mens as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                @php
                                    $img = json_decode($user->image);
                                @endphp
                                @foreach ($img as $row)
                                    <img  class="figure-img img-fluid rounded"src="{{ asset('storage/shoes/'.$row) }}" height="80px" width="80px">

                                @endforeach
                                </td>
                                <td>{{$user->price}}</td>
                                <td>{{$user->Quantity}}</td>
                                <td>{{$user->description}}</td>
                                <td><a href="/delete/{{$user->id}}"class="btn btn-danger"> Delete</a></td>
                                <td><a href="{{ route('shoeedit', ['id' => $user->id]) }}" class="btn btn-primary">Update</a></td>

                            </tr>
                        @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>


{{-- @if(Session::has('message'))
<script>
toastr.options = {
    "postion":true,
    "progressBar":true,
    "closeButton": true,
}
toastr.success("{{ Session::get('message') }}");

elseif(Session::has('error')){}

toastr.options = {
    "postion":true,
    "progressBar":true,
    "closeButton": true,
}
toastr.error("{{ Session::get('error') }}");

</script>
@endif --}}
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
