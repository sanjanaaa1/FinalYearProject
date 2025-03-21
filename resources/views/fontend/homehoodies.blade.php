
@extends('fontend.fontend-design')

@section('title')
Copper Products
@endsection

@section('content')

<!-- inner page section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
            <h2>
                Copper <span>Products</span>
            </h2>
       </div>
       <div class="row">
            @foreach ($hoodies as $val)
            @php
                // dd($val);
            @endphp
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                {{-- <a href="" class="option1"> --}}
                                     <a href="{{route('detail.show', $val->id)}}" class="option1">

                                View More
                                </a>
                                <a href="" class="option2">
                                Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{asset('storage/hoodies/'.$val->image)}}" alt="Hoodie Image">
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
