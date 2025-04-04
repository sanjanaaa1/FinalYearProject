@extends('fontend.fontend-design')

@section('title')
    thaxina
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                @if($datas->isEmpty())
                <div class="row">
                    <h1 class="no-results">No results found!!!!</h1>
                  </div>

            @else

            @foreach ($datas as $data)
    @php
        $shoe = json_decode($data->image);
    @endphp

    @if (is_array($shoe) && count($shoe) > 0)
        <img src="{{ asset('storage/shoes/' . $shoe[0]) }}" height="90%" width="90%" alt="Image">
    @endif
@endforeach




                </div>
                <div class="col-md-6">
                    <h2 class="mb-4 font-weight-bold" style="color: rgb(114, 114, 199);">Product Name: {{ $datas[0]->title }}</h2>
                    <h4 class="mb-4 font-weight-bold">Price: {{ $datas[0]->price }}</h4>
                    <p class="mb-4"><span class="font-weight-bold">Description:</span> {{ $datas[0]->description }}</p>

                    <p class="mb-4 font-weight-bold">Quantity: {{ $datas[0]->Quantity }}</p>


                    @if(isset($datas) && is_array($datas))
                        <form action="{{ route('cart.add') }}" method="POST" class="my-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $datas[0]->id }}">
                            <input type="hidden" name="product_title" value="{{ $datas[0]->title }}">
                            <input type="hidden" name="product_price" value="{{ $datas[0]->price }}">
                            <input type="hidden" name="product_image" value="{{ $datas[0]->image }}">
                            <input type="hidden" name="category_name" value="{{ $datas[0]->category_name }}">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="product_quantity" value="1" min="1" id="quantity">
                            <button type="submit" class="btn btn-lg btn-primary mr-3 font-weight-bold">
                                <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                            </button>
                        </form>
                    @endif

                    <a href="{{route('shoe-home')}}" class="btn btn-lg btn-success font-weight-bold"><i class=""></i>View more Product</a>
                </div>
            @endif
        </div>
    </div>

    <style>
        .custom-card {
            font-size: 14px;
            padding: 10px;
        }
    </style>

<style>
    .no-results {
    color: red;
    font-size: 50px;
    text-align: center;
    width: 100%;
    /* Add more styles as desired */
  }



</style>

@endsection
