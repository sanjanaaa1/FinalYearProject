@extends('fontend.fontend-design')

@section('title')
Home
@endsection

@section('content')


 <!-- product section -->
 {{-- Men's Hoodies --}}
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
                                <a href="{{route('detail.show', $val->id)}}" class="option2">
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

 {{-- Men's Shoes --}}
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
            <h2>
                Brassr<span> Products</span>
            </h2>
       </div>
       <div class="row">
            @foreach ($shoes as $val)

                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                {{-- <form action="" > --}}
                                    @csrf
                                    <a href="{{route('shoe.detail', $val->id)}}" class="option1">
                                    {{-- <a href="" class="option1"> --}}

                                        {{-- <a href="{{route('user-Cart', ['product' => 'shoe', 'id' => $val['shoe_id']])}}" class="option1"> --}}


                                View More
                                </a>
                                <a href="{{route('shoe.detail', $val->id)}}" class="option2">
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
                        <img src="{{asset('storage/shoes/'.$d)}}" alt="Hoodie Image">

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

 <!-- product section -->
 {{-- News and Blogs --}}
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
            <h2>
                <span>News & Blogs</span>
            </h2>
       </div>
       <div class="row">
            @foreach ($newsblogs as $val)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{asset('storage/newsblog/'.$val->image)}}" alt="Hoodie Image">
                            {{-- <img src="{{ $val['image'] }}" alt="Hoodie Image"> --}}
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $val['title'] }}

                            </h5>
                            <h5>{{$val['description']}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
       </div>
    </div>

 </section>



 <script>
    var OuTFitTops = {
    aboutText: 'OuTFiT TOps',
    introMessage: "✋ Hello there welcom"

    };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

@endsection
