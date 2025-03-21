@extends('backend.layout.admindesign')

@section('title')
<title>Customer Contact Us details</title>
@endsection


@section('content')
<h4>Customer Contact Us Details</h4>
<div class="row">
    <div class="col-12">
        <div class="card-header">
        <p class="text-center"> Customer Contact Us Details</p>
        </div>

        <div class="form-group">


        <div class="card-body">

            <table class="table table-striped " id ="data">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Person Name</th>
                        <th>Email </th>
                        <th>SUbject</th>
                        <th>Message</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>


                        @foreach ($datas as $data)

                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->subject}}</td>
                                <td>{{$data->message}}</td>

                             <td> <a href="{{ route('email-send', ['id' => $data->id]) }}"><i class="fa fa-envelope"></i> Send email</a></td>



                                </tr>
                        @endforeach
                </tbody>
            </table>

        </div>

    </div>






@endsection
