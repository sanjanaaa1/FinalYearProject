@extends('backend.layout.admindesign')

@section('title')
<title>Rental Details</title>
@endsection


@section('content')

<div class="row">

    <div class="col-12">

        <div class="card-header">


        <p class="text-center">  Rental Details</p>
        </div>
       @include('session')
        <div class="form-group">

        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>Numbers</th>
                        <th>Product_Name</th>
                        <th>Rental_Duration</th>
                      
                        <th>Price</th>
                        <th>Product_Image</th>
                        <th>Category_Name</th>
                        <th>Created_At</th>

                    </tr>
                </thead>
                <tbody>


                        @foreach ($rent as $show)

                            <tr>
                                <td>{{$show->id}}</td>
                                <td>{{$show->title}}</td>
                                <td>{{$show->category_name}}</td>
                                <td>{{$show->rental_duration}} days</td>
                                <td>{{$show->price}} Rs</td>

                                <td>{{$show->created_at->format('l, F jS Y')}}</td>
                                <td>
                                <form method="post" action="{{ route('send.notification', $show->user_id) }}">


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


