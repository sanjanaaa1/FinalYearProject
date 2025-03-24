@extends('fontend.fontend-design')

@section('title')
     Copper
@endsection

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('hoodies.search') }}" method="GET">
                <div class="form-group">
                    <input type="text" name="query" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <img src="{{ asset('storage/hoodies/'.$datas->image) }}" height="70%" width="70%" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 font-weight-bold" style="color: rgb(114, 114, 199);">Product Name: {{ $datas->title }}</h2>

            <p class="mb-4 font-weight-bold">Price: {{ $datas->price }}</p>
            <p class="mb-4 font-weight-bold">Description: {{ $datas->description }}</p>

            <p class="mb-4 font-weight-bold" >Quantity: {{ $datas->Quantity }}</p>
            <!-- <label for="size" style="font-weight: bold;">Size:</label>
            <select name="size" id="size" width: 100px;>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL (Larger)</option>
            </select> -->


            @if(isset($datas) && is_object($datas))
                <form action="{{ route('cart.add') }}" method="POST" class="my-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $datas->id }}">
                    <input type="hidden" name="product_title" value="{{ $datas->title }}">
                    <input type="hidden" name="product_price" value="{{ $datas->price }}">
                    <input type="hidden" name="product_image" value="{{ $datas->image }}">
                    <input type="hidden" name="category_name" value="{{ $datas->category_name }}">
                    <label for="" class="font-weight-bold">Number of quantity</label>

                    <input type="number" name="product_quantity" value="1" min="1" id="product_quantity" class="smaller-width" style="height: 30px;  width: 70px;font-size: 14px;">
                    <button type="submit" class="btn btn-primary font-weight-bold square-button">
                        <i class="fas fa-cart-plus mr-4" style="font-size: 20px;"></i>Add to Cart
                    </button>

                </form>
            @endif

            <!-- <a href="#" class="btn btn-success font-weight-bold square-button" style="font-size: 12px;">
                <i class="fas fa-shopping-bag mr-2" style=" font-size: 20px;"></i> rent
            </a> -->
            <!-- <form action="{{ route('cart.add') }}" method="POST" class="my-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $datas->id }}">
                    <input type="hidden" name="product_title" value="{{ $datas->title }}">
                    <input type="hidden" name="product_price" value="{{ $datas->price }}">
                    <input type="hidden" name="product_image" value="{{ $datas->image }}">
                    <input type="hidden" name="category_name" value="{{ $datas->category_name }}">
                    <label for="" class="font-weight-bold">Number of quantity</label>

                    <input type="number" name="product_quantity" value="1" min="1" id="product_quantity" class="smaller-width" style="height: 30px;  width: 70px;font-size: 14px;">
                    <button type="submit" class="btn btn-primary font-weight-bold square-button">
                        <i class="fas fa-cart-plus mr-4" style="font-size: 20px;"></i>Add to Cart
                    </button>

                </form> -->
            <!-- <a href="{{ route('product.rent') }}" class="btn btn-success font-weight-bold square-button"> -->
                <form action="{{ route('product.rent', ['id' => $datas->id]) }}">
                @csrf
                    <input type="hidden" name="product_id" value="{{ $datas->id }}">
                    <input type="hidden" name="product_title" value="{{ $datas->title }}">
                    <input type="hidden" name="product_price" value="{{ $datas->price }}">
                    <input type="hidden" name="product_image" value="{{ $datas->image }}">
                    <input type="hidden" name="category_name" value="{{ $datas->category_name }}">
                    <button type="submit" class="btn btn-primary font-weight-bold square-button">
                        <i class="fas fa-cart-plus mr-4" style="font-size: 20px;"></i>Rent
                    </button>
        
    </a>

        </div>
    </div>
</div>


    @foreach ($reviews as $review)
    <div class="card">

        <div class="row">
            <div class="col-2">
                <img src="{{ asset('storage/hoodies/xeLPaag.jpg') }}" width="70" height="70%" class="rounded-circle mt-2">
            </div>
            <div class="col-10">
                <div class="comment-box ml-2">
                    <h6>{{$review->name}}</h6>
                    <div class="rating">
                        @for($i = 1; $i <= $review->stars; $i++)
                            <i class="fa fa-star checked"></i>
                        @endfor
                        @for($i = $review->stars + 1; $i <= 5; $i++)
                            <i class="fa fa-star"></i>
                        @endfor
                    </div>


                    <p>{{ $review->message }}</p>

                </div>
            </div>
            <p>{{$review->created_at->format('l, F jS Y')}}</p>
        </div>
    </div>
@endforeach
</div>


    <div class="card">
        <div class="row">
            @include('session')
        <div class="col-2"> <img src="{{ asset('storage/hoodies/xeLPaag.jpg') }}" width="70" class="rounded-circle mt-2"> </div>
        <div class="col-10">
        <div class="comment-box ml-2">
            <form action="{{ route('product.review', ['id' => $datas->id]) }}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $datas->id }}">
                <input type="hidden" name="category_name" value="{{ $datas->category_name }}">
                <h4>Add a comment</h4>
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
                <div class="comment-area">
                    <textarea class="form-control" name="comment" placeholder="what is your view?" rows="4"></textarea>
                </div>
                <div class="comment-btns mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="pull-left">
                                <button class="btn btn-success btn-sm">Cancel</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    {{-- <style>
      body {
        box-shadow: 1px 2px 16px grey;
}

    </style> --}}
    <style>
        .custom-card {
            font-size: 14px;
            padding: 10px;
        }
        </style>


    <style>
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');
html,
body {
height: 100%
}
body {
display: grid;
place-items: center;
font-family: 'Manrope', sans-serif;

}
.card {
    background: red
position: relative;
display: flex;
flex-direction: column;
min-width: 0;
padding: 20px;
width: 450px;
word-wrap: break-word;
background-color: #fff;
background-clip: border-box;
border-radius: 6px;
-moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
}
.comment-box {
padding: 5px
}
.comment-area textarea {
resize: none;
border: 1px solid #ad9f9f
}
.form-control:focus {
color: #495057;
background-color: #fff;
border-color: #ffffff;
outline: 0;
box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}
.send {
color: #fff;
background-color: #ff0000;
border-color: #ff0000
}
.send:hover {
color: #fff;
background-color: #f50202;
border-color: #f50202
}
.rating {
display: flex;
margin-top: -10px;
flex-direction: row-reverse;
margin-left: -4px;
float: left
}
.rating>input {
display: none
}
.rating>label {
position: relative;
width: 19px;
font-size: 25px;
color: #ff0000;
cursor: pointer
}
.rating>label::before {
content: "\2605";
position: absolute;
opacity: 0
}
.rating>label:hover:before,
.rating>label:hover~label:before {
opacity: 1 !important
}
.rating>input:checked~label:before {
opacity: 1
}
.rating:hover>input:checked~label:before {
opacity: 0.4
}
    </style>

    <style>
        .square-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 400px; /* Updated width */
    height: 40px;
    padding: 0;
    border-radius: 5px;
}

.square-button {
            display: flex;
            align-items: center;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 12px;
            text-decoration: none;
            font-weight: bold;
        }

        .square-button i {
            margin-right: 8px;
            font-size: 20px;
        }

    </style>

@endsection
