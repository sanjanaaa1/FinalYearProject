@extends('fontend.fontend-design')

@section('title')
Blog and news
@endsection

@section('content')
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
            
                <span>News & Blogs</span>
            </h2>
       </div>
       <div class="row">
            @foreach ($newsblogs as $val)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ $val['image'] }}" alt="Hoodie Image">
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


@endsection
