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
                        <th>Category_Name</th>
                        <th>Rental_Duration</th>
                      
                        <th>Price</th>
                        <th>Created_At</th>
                        <th>Product_Image</th>
                        <th>Action</th>
                        
                        


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
                                   @php

                                    $images = is_array(json_decode($show->image)) ? json_decode($show->image) : [$show->image];
                                    @endphp

                                    @if ($images && count($images) > 0)
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/citizens/' . $image) }}" width="45%" height="25px" class="img-fluid rounded shadow">
                                    @endforeach
                                    @else
                                    <p>No images found.</p>
                                    @endif
                                   </td>
                                <td>
                                    
                                <form method="post" action="{{ route('send.notification', $show->user_id) }}">
                                <!-- <td>
                                   @php
                                    $images = is_array(json_decode($show->image)) ? json_decode($show->image) : [$show->image];
                                    @endphp

                                    @if ($images && count($images) > 0)
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/citizens/' . $image) }}" width="15%" height="15px" class="img-fluid rounded shadow">
                                    @endforeach
                                    @else
                                    <p>No images found.</p>
                                    @endif
                                   </td> -->


                                    @csrf
                                        <select name="status">
                                            <option value="hold">Hold</option>
                                            <option value="deliver">Deliver</option>
                                            <option value="cancel">Cancel</option>
                                        </select>
                                        <button type="submit">Update</button>
                                    </form>
                                </td>  
                                   <!-- <td>
                                   @php

                                    $images = is_array(json_decode($show->image)) ? json_decode($show->image) : [$show->image];
                                    @endphp

                                    @if ($images && count($images) > 0)
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/citizens/' . $image) }}" width="45%" height="25px" class="img-fluid rounded shadow">
                                    @endforeach
                                    @else
                                    <p>No images found.</p>
                                    @endif
                                   </td> -->


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


