@extends('backend.layout.admindesign')

@section('title')
<title>News and blog</title>
@endsection


@section('content')
<h4>News and blog</h4>

<div class="row">

    <div class="col-12">
        <a href="{{route('news')}}" class="btn btn-success btn-lg float-right">Addnews</a>
                      @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @elseif(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif







        <div class="card-header">


        <p class="text-center"> News and blog</p>
        </div>

        <div class="form-group">

        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>image </th>
                        <th>description</th>
                        <th>Delete</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>


                        @foreach ($data as $show)

                            <tr>
                                <td>{{$show->id}}</td>
                                <td>{{$show->title}}</td>
                                <td>

                                    {{-- @php
                                        $img = json_decode($show->image);
                                @endphp
                                <img src="{{ asset('storage/newsblog/'.$img) }}" height="50px" width="50px"> --}}
                                                                    {{-- <img src="{{asset('storage/newsblog/'.$val->image)}}" alt="Hoodie Image"> --}}
                                    {{-- <img src="{{asset('storage/newsblog'.$img) }}" height="50px" width="50px"> --}}

                                    @php
                                    $img = explode(',', $show->image);
                                @endphp

                                @foreach ($img as $row)
                                    <img class="figure-img img-fluid rounded" src="{{ asset('storage/newsblog/'.$row) }}" height="80px" width="80px">
                                @endforeach

                                </td>


                                <td>{{$show->description}}</td>

                                {{-- <td><a href="/destroy/{{$show->id}}"class="btn btn-danger"> Delete</a></td> --}}
                                <td><a href="{{ route('newsedit', ['id' => $show->id]) }}" class="btn btn-info">Edit</a></td>
                                <td><a href="/destroy/{{$show->id}}"class="btn btn-danger"> Delete</a></td>
                                </tr>

                        @endforeach
                </tbody>
            </table>

        </div>

    </div>

</div>

<script>
    $(document).ready( function () {
$('#data').DataTable();
} );
</script>
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
@endsection


