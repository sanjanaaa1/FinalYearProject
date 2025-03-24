@extends('fontend.fontend-design')

@section('title')
    {{-- {{ $datas->title }} --}}
@endsection

@section('content')

<!-- Font Awesome -->
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}

<div class="container mt-5">
    <div class="row">
        
        <!-- Left Side: User Information -->
        <div class="col-md-6">
            <h1>User Information</h1>
            <!-- <div class="d-flex align-items-center">
                <div class="rounded-circle" style="width: 100px; height: 100px; background-color: grey;"></div>
            </div>
            
             -->
             <div class="d-flex align-items-center">
             <img src="{{ asset('frontend/images/p1.png') }}" class="rounded-circle" style="width: 100px; height: 100px;" alt="Profile Picture">
            </div>
            @if (!empty(Auth::user()))
                <p><i class="fas fa-user"></i> Name: {{ Auth::user()->name }}</p><br>
                <p><i class="fas fa-envelope"></i> Email: {{ Auth::user()->email }}</p><br>
                <p><i class="fas fa-phone"></i> Phone Number: <a href="tel:555-555-5555"><i class="fas fa-phone"></i> {{ Auth::user()->number }}</a></p><br>
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            @else
                <p><i class="fas fa-user"></i> Name: Guest User</p><br>
                <p><i class="fas fa-envelope"></i> Email: guest@example.com</p><br>
                <p><i class="fas fa-phone"></i> Phone Number: <a href="tel:555-555-5555"><i class="fas fa-phone"></i> 555-555-5555</a></p><br>
            @endif
        </div>

        <!-- Right Side: Change Password Form -->
        <div class="col-md-6 d-flex flex-column align-items-end">
            <div class="w-75"> <!-- This controls form width -->
                <h2 class="change-password">Change Password</h2>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('userChangepassword') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="currentPassword">Current Password:</label>
                        <input type="password" id="currentPassword" name="oldpassword" class="form-control">
                        @error('oldpassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" id="newPassword" name="current_password" class="form-control">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <input type="password" id="confirmPassword" name="confirm_password" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>

    </div> <!-- End of row -->
</div> <!-- End of container -->

<!-- Custom Styles -->
<style>
    
    * {
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', sans-serif;
    color: #0c0c0c;
    background-color: #ffffff;
    overflow-x: hidden;
}

.layout_padding {
    padding: 70px 0;
}

.layout_padding2 {
    padding: 75px 0;
}

.layout_padding2-top {
    padding-top: 75px;
}

.layout_padding2-bottom {
    padding-bottom: 75px;
}

.layout_padding-top {
    padding-top: 90px;
}

.layout_padding-bottom {
    padding-bottom: 90px;
}

h1, h2 {
    font-family: 'Playfair Display', serif;
}

.heading_container {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.heading_container h2 {
    position: relative;
    margin-bottom: 0;
    font-size: 3.5rem;
    font-weight: bold;
}

.heading_container h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 5px;
    background: #f7444e;
    margin: 10px auto 10px;
}

.heading_container h2 span {
    color: #f7444e;
}

.heading_container p {
    margin-top: 10px;
    margin-bottom: 0;
}

/* Box styling for inputs */
.box {
    border: 1px solid rgb(106, 103, 103);
    height: 40px;
    margin-bottom: 20px;
}

.box input {
    border: none;
    background: transparent;
}

/* Heading styles for title */
h1, h2 {
    font-weight: bold;
    color: rgb(243, 53, 53);
    margin-top: 0px;
}

/* Logout Button */
.btn-logout {
    border: 1px transparent;
    color: white;
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 20px;
}

/* Change Password Button */
.btn-primary {
    padding: 10px;
    border-radius: 10px;
    width: 55%;
    background-color: rgb(243, 53, 53);
    color: #fff;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
    box-shadow: 1px 2px 16px grey;
    margin-top: 20px;
}

.btn-primary:hover {
    background-color: rgba(152, 53, 53, 0.9);
}

/* Styling for columns and row */
.col-md-6 p {
    margin-top: 5px;
    font-weight: bold;
    color: black;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-6 {
    flex: 1;
}

</style>

@endsection