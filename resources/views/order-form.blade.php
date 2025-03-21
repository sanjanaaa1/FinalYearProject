@extends('fontend.fontend-design')

@section('title')
Checkout
@endsection

@section('content')

<div class="page-content container">
    <div class="page-header text-blue-d2">
        @if(empty($user_order))
        <div class="no-results">
            <p> No Orders  FOund!!</p>
            <p> Pleas fill up Billing Form</p>
            <a href="{{ route('checkoutpage') }}" style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px; cursor: pointer;">Back to Checkout Page</a>

        </div>
    @else
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                {{$user_order->ticket_id ?? ''}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light mx-1px text-95" href="{{ route('generate-pdf') }}" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>

            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">OutFit.com</span>


                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$user_order->fullname ?? ''}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                {{$user_order->city ?? ''}}
                            </div>
                            <div class="my-1">
                                {{$user_order->state ?? ''}}
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$user_order->phone ?? ''}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #111-222</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$user_order->created_at->format('l, F jS Y') ?? ''}} </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25"> </span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
             @if (count($cartItems) > 0)

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Description</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        <div class="col-2">Amount</div>
                    </div>


                    <div class="text-95 text-secondary-d3">
                                        @php
                                $subTotal = 0;
                                $tax = 0;
                                $totalAmount = 0;
                            @endphp
                        @foreach ($cartItems as $item)

                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif



                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1">{{$item->id}}</div>
                            <div class="col-9 col-sm-5">{{$item->title}}</div>
                            <div class="d-none d-sm-block col-2">{{ $item->quantity }}</div>
                            <div class="d-none d-sm-block col-2 text-95">{{ $item->price }}</div>
                            <div class="col-2 text-secondary-d2">{{ $item->quantity * $item->price }}</div>


                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>
                                    @php
                                    $subTotal += $item->quantity * $item->price;
                                @endphp
                            @endforeach


                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">

                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">{{ $subTotal }}</span>
                                </div>
                                    </div>
                                    @php
                                $tax = $subTotal * 0.1;
                                $totalAmount = $subTotal + $tax;
                            @endphp

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tax (10%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">{{ $tax }}</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">{{ $totalAmount }}</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>

                        <a href="#" id="payment-button" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay with Khalti</a><br>
                    </div>
                    <div><br>
                        <a href="{{route('payment.cashIndex')}}" id="cash" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">cash on deilver</a>
                    </div>
                </div>
            </div>
            @else
            <p> No Detailes</p>
            @endif
        </div>
        @endif
    </div>
</div>

<div class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>

        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_29a4d6138bfc4783b33d76c22147a28c",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verification
                    $.ajax({
                        type : 'POST',
                        url : "{{ route('khalti.verifyPayment') }}",
                        data: {
                            token : payload.token,
                            amount : payload.amount,
                            "_token" : "{{ csrf_token() }}"
                        },
                        success : function(res){
                            $.ajax({
                                type : "POST",
                                url : "{{ route('khalti.storePayment') }}",
                                data : {
                                    response : res,
                                    "_token" : "{{ csrf_token() }}"
                                },
                                success: function(res){
                                    //console.log('transaction successful');

                                    $.ajax({
                                        type : "POST",
                                        url : "{{ route('payment.success') }}",
                                        data : {
                                            transaction_id : res.transaction_id,
                                            payment_type : 'Khalti',
                                            status : res.status,
                                            amount : res.amount,
                                            fee_amount : res.fee_amount,
                                            user_name : res.user_name,
                                           user_mobile : res.user_mobile,
                                            merchant_name : res.merchant_name,
                                            merchant_mobile : res.merchant_mobile,
                                            "_token" : "{{ csrf_token() }}"
                                        },
                                     success: function(message) {
                                        var rep = JSON.parse(message);
                                    if (rep.success) {
                                        console.log(rep.redirect);
                                        window.location.href='{{route('payment.message')}}';
                                    } else {
                                        // Handle the error case here
                                        console.log(rep.message);
                                    }
                                }


                                    });
                                }
                            });
                            console.log(res);
                        }
                    });
                    console.log(payload);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>

</div>
<style>
    body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}




</style>


<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>
<style>
    .no-results {
    color: red;
    font-size: 35px;
    text-align: center;
    width: 100%;
    /* Add more styles as desired */
  }



</style>

@endsection
