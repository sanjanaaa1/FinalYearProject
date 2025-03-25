@extends('fontend.fontend-design')

@section('title')
Rent 
@endsection

@section('content')

    <h1>Checkout</h1>

    <form action="{{route('rentcheckout.create')}}" method="POST">
        @csrf
        <h2>Billing Details</h2>
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="address">Address:</label>
        <textarea id="email" name="address"  required></textarea>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>

        <label for="zipcode">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required>
     

        {{-- <h2>Payment Details</h2>
        <div class="payment-ways">
            <div class="payment">
                {{-- <button id="payment-button">Pay with Khalti</button> --}}
                {{-- <button id = "payment-button"><img src="khalti.jpg" alt="Khalti" width="130" height="50"></button required >
                <!-- <button></button><img src="esewa.png" alt="esewa" width="40" height="40">-->
                <button><img src="fonepay.png" alt="fonepay" width="80" height="40"></button>

            </div>
        </div> --}}
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
            <!-- other input fields for order details go here -->
            <input type="submit" value="Place Order">
            {{-- <a href="{{ route('checkou-order') }}" style="background-color: #808080; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px; cursor: pointer;">Proceed</a> --}}
           </form>




    <style>
        form {
  margin: 0 auto;
  max-width: 600px;
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
form .payment-ways{
    display: flex;
    justify-content: center;
}
form .payment {
    width: 40%;
    text-align: center;
    display: flex;
    justify-content:space-between;
    align-items: center;

}
form .payment button{
    border: none;
}
h1, h2 {
  text-align: center;
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 16px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  font-size: 16px;
  border: none;
  border-radius: 3px;
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

input[type="submit"] {
  display: block;
  margin: 20px auto 0;
  padding: 10px;
  background-color: #3b5bdb;
  color: #fff;
  border: none;
  border-radius: 3px;
  font-size: 16px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #2c3e50;
}

input[type="submit"]:focus {
  outline: none;
}

@media screen and (max-width: 600px) {
  form {
    margin: 0;
    width: 100%;
    padding: 10px;
  }
}

    </style>

    @endsection


