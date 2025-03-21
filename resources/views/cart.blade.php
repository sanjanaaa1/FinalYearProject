@extends('fontend.fontend-design')

@section('title', 'Cart Details')

@section('content')
<div class="table-responsive-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cart Details</div>
                    <div class="card-body">
                        @if (count($cartItems) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        @include('session')
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Type</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Price Total</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Actions</th>
                                        {{-- <th scope="col">Remove</th> --}}



                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $cartTotal =0;
                                    @endphp
                                    @foreach ($cartItems as $cartItem)
                                    <tr>

                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $cartItem->title }}</td>
                                        <td>{{ $cartItem->category_name }}</td>
                                        <td>{{ $cartItem->quantity }}</td>
                                        <td>{{ $cartItem->price }}</td>
                                        <td>{{ $cartItem->quantity * $cartItem->price }}</td>
                                        <td>
                                            @if ($cartItem->category_name === 'menhoodies')
                                                <img src="{{ asset('storage/hoodies/'.$cartItem->image) }}" height="50px" width="50px">
                                            @elseif ($cartItem->category_name === 'shoes')

                                                @php
                                                    $shoe = json_decode($cartItem->image);
                                                @endphp
                                                <img src="{{ asset('storage/shoes/'.$shoe[0]) }}" height="50px" width="50px">
                                            @endif
                                        </td>


                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <form action="{{ route('cart.decreaseQuantity', ['id' => $cartItem->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-default btn-number" data-type="minus" data-field="quantity">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                                <input type="text" name="quantity" class="form-control input-number" value="{{ $cartItem->quantity }}" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <form action="{{ route('cart.increaseQuantity', ['id' => $cartItem->id]) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-default btn-number"  data-field="quantity">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                                <form action="{{ route('cart.remove', ['id' => $cartItem->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>


                                        </td>
                                        {{-- @php
                                            dd($shoe);
                                        @endphp --}}

                                    </tr>
                                    @php
                                    $cartTotal += $cartItem->quantity * $cartItem->price;
                                @endphp
                                @endforeach

                                <tr>
                                    <td colspan="4"></td>
                                    <td><strong>Total:</strong></td>
                                    {{-- @php
                                    dd($cartTotal);
                                    @endphp --}}
                                    <td><strong>{{ $cartTotal ?? 0 }}</strong></td>
                                    <td></td>
                                    {{-- @php
                                        DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle'])
                                    @endphp --}}
                                </tr>
                                </tbody>
                            </table>
                        @else
                            <p>No items in your cart.</p>
                        @endif
                    </div>
                </div>
                <a href="{{ route('orderform') }}" class="btn btn-primary" style="background-color: #333333; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: block; width: 200px; font-size: 16px; border-radius: 20px; cursor: pointer; margin: 0 auto;">Checkout</a>
            </div>
        </div>
    </div>
    <style>
        .fa-plus {
  color: green;
}
    </style>


</div>

@endsection
