{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
  </head>
  <body> --}}

    @extends('backend.layout.admindesign')


    @section('title')
    <title>View record </title>
    @endsection

    @section('content')

    <h3 class="text-center">Customer Details</h3>

  <table class="table table-striped" id="data_table">
    @include('session')
    <thead class="thead-dark">
      <tr>
       <th> id</th>
        <th>Full name</th>
        <th> Email</th>
        <th>Number</th>
        <th>Created At</th>
         <th> toogle </th>
        <th>Profile</th>

    </tr>
    </thead>

  <tbody>

  @foreach ($users as $user)
  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    {{-- <td>{{$user->last_name}}</td> --}}

    <td>{{$user->email}}</td>
    <td>{{$user->number}}</td>
    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('l, F jS Y') }}</td>


    <td>
        <form action="{{ route('toggle.verify', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="switch">
                <input type="checkbox" {{ $user->verify == 1 ? 'checked' : '' }} onchange="this.form.submit()">
                <span class="slider round"></span>
            </label>
        </form>


    </td>
    <td> <img class="img-profile rounded-circle"
        src="{{ asset('/images/user.png') }}" width="35px"></td>


  </tr>
  </tbody>
  @endforeach
  </table>
  <style>
    .slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>

    <!-- Optional JavaScript -->


  {{-- </body>
</html> --}}

<script>
    $(document).ready( function () {
$('#data_table').DataTable();
} );
</script>



@endsection

