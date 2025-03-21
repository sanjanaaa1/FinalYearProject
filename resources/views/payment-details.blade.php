@extends('backend.layout.admindesign')

@section('title')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-header">
        <p class="text-center"> Payment details</p>
        </div>

        <div class="form-group">


        <div class="card-body">

            <table class="table table-striped" id="data">
                <thead>
                  <tr>
                    <td>payment_type</td>
                    <td> status</td>
                    {{-- <td>amount</td> --}}
                    <td>fee_amount</td>
                    <td>user_name</td>
                    <td>user_mobile</td>
                    <td>merchant_name</td>
                    <td>email</td>
                    {{-- <td>user_id</td> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($payments as $payment)
                  <tr>
                    <td>{{ $payment->payment_type }}</td>
                    <td>{{ $payment->payment_status }}</td>
                    {{-- <td>{{ $payment->amount }}</td> --}}
                    <td>{{ $payment->fee_amount }}</td>
                    <td>{{ $payment->user_name }}</td>
                    <td>{{ $payment->user_mobile }}</td>
                    <td>{{ $payment->merchant_name }}</td>
                    <td>{{ $payment->email }}</td>
                    {{-- <td>{{ $payment->user_id }}</td> --}}
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
