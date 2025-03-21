@extends('backend.layout.admindesign')

@section('title')
<title>Review Details</title>
@endsection


@section('content')

<div class="row">

    <div class="col-12">

        <div class="card-header">


        <p class="text-center">    Review Details</p>
        </div>

        <div class="form-group">

        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>stars</th>
                        <th>category_name</th>
                        <th>message</th>
                        <th>name</th>
                        <th>Date</th>


                    </tr>
                </thead>
                <tbody>


                        @foreach ($review as $show)

                            <tr>
                                <td>{{$show->id}}</td>
                                <td>{{$show->stars}}</td>
                                <td>{{$show->category_name}}</td>
                                <td>{{$show->message}}</td>
                                <td>{{$show->name}}</td>
                                <td>{{$show->created_at->format('l, F jS Y')}}</td>
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


