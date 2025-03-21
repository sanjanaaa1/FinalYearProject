@extends('backend.layout.admindesign')

@section('title')
<title>Order Details</title>
@endsection


@section('content')

<div class="row">

    <div class="col-12">

        <div class="card-header">


        <p class="text-center">  Order Details</p>
        </div>
       @include('session')
        <div class="form-group">

        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>fullname</th>
                        <th>email</th>
                        <th>phone</th>
                        {{-- <th>address</th> --}}
                        {{-- <th>city</th> --}}
                        <th>ticket_id</th>
                        {{-- <th>zipcode</th> --}}
                        <th>created_at</th>
                        <th> Online Payment </th>
                        <th> Cash Payment </th>
                        <th>Notify</th>


                    </tr>
                </thead>
                <tbody>


                        @foreach ($user_order as $show)

                            <tr>
                                <td>{{$show->id}}</td>
                                <td>{{$show->fullname}}</td>
                                <td>{{$show->email}}</td>
                                <td>{{$show->phone}}</td>
                                {{-- <td>{{$show->address}}</td> --}}
                                {{-- <td>{{$show->city}}</td> --}}
                                <td>{{$show->ticket_id}}</td>
                                {{-- <td>{{$show->zipcode}}</td> --}}
                                <td>{{$show->created_at->format('l, F jS Y')}}</td>
                                <td>{{$show->status}}</td>
                                <td>{{$show->cash_payment}}</td>
                                {{-- <td>{{$show->status}}</td> --}}
                                <td>
                                    <form method="post" action="{{ route('notify-user', ['id' => $show->id]) }}">

                                        @csrf
                                        <select name="status">
                                            <option value="">Hold</option>
                                            <option value="deliver">Deliver</option>
                                            <option value="">Cancel</option>
                                        </select>
                                        <button type="submit">Update</button>
                                    </form>
                                </td>


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



@endsection


