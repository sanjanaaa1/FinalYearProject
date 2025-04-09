@extends('fontend.fontend-design')

@section('title')
Brass Product
@endsection

@section('content')
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
            <h2>
                Brass <span>Product</span>
            </h2>
       </div>
       <div class="row">
            @foreach ($shoes as $val)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <form action="" >
                                    @csrf
                                    {{-- @php
                                        dd($val);
                                    @endphp --}}

                                    <a href="{{route('shoe.detail', $val->id)}}" class="option1">

                                        {{-- <a href="{{route('user-Cart', ['product' => 'shoe', 'id' => $val['shoe_id']])}}" class="option1"> --}}
                                </form>

                                 View More
                                </a>
                                <a href="" class="option2">
                                Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            @php
                            // dd(json_decode($val->image));
                            $data = json_decode($val->image);
                            // foreach ($data as $d) {
                            //     // return $d;
                            // }
                        @endphp
                        @foreach ($data as $d)
                        <img src="{{asset('storage/shoes/'.$d)}}" alt="Brass Image">

                        @endforeach
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $val['title'] }}
                            </h5>
                            <h6>
                                Price : {{ $val['price'] }}
                            </h6>
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>



@endsection
