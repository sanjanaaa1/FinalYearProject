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
            @include('session')
             <div class="d-flex align-items-center">
             <img src="{{ asset('frontend/images/p1.png') }}" class="rounded-circle" style="width: 100px; height: 100px;" alt="Profile Picture">
            </div>
            @if (!empty(Auth::user()))
                <p><i class="fas fa-user"></i> Name: {{ Auth::user()->name }}</p>
            
                <p><i class="fas fa-envelope"></i> Email: {{ Auth::user()->email }}</p>
                <p><i class="fas fa-user"></i> Member since: {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('l, F jS Y')  }}</p>
                <p><i class="fas fa-phone"></i> Phone Number: <a href="tel:555-555-5555"><i class="fas fa-phone"></i> {{ Auth::user()->number }}</a></p>
                <div class="btn-container">
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit Profile</button>
                    <a href="{{ route('user.orders') }}" class="btn btn-info btn-sm">Order History</a>
                </div>
            @else
                <p><i class="fas fa-user"></i> Name: Guest User</p><br>
                <p><i class="fas fa-envelope"></i> Email: guest@example.com</p><br>
                <p><i class="fas fa-phone"></i> Phone Number: <a href="tel:555-555-5555"><i class="fas fa-phone"></i> 555-555-5555</a></p><br><br>
            @endif
        </div>
<div>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form action="{{ route('user.edit') }}" method="POST">
        @csrf

      <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Name" name="name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="Name">Phone Number</label>
    <input type="text" name="number" pattern="\d{10}" title="Enter exactly 10 digits" required>
    <input type="hidden" name=" user_id"   value="{{ Auth::user()->id }}" required>

  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    <!-- ends -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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

    </div> 
</div> 



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


.box {
    border: 1px solid rgb(106, 103, 103);
    height: 40px;
    margin-bottom: 20px;
}

.box input {
    border: none;
    background: transparent;
}

h1, h2 {
    font-weight: bold;
    color: #e91e63;
    margin-top: 0px;
}

.btn-logout {
    border: 1px transparent;
    color: white;
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 20px;
}

.btn-primary {
    padding: 10px;
    border-radius: 10px;
    width: 55%;
    background-color: rgb(227, 72, 124);
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
    background-color: rgb(228, 35, 112);
}

.col-md-6 p {
    margin-top: 5px;
    font-weight: bold;
    color: black;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.btn-container {
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;
    margin-top: 10px;
}

.btn-info, .btn-logout {
    padding: 8px 15px;
    border-radius: 5px;
    color: #fff;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 14px;
    box-shadow: 1px 2px 8px grey;
    white-space: nowrap;
    margin-bottom: 0;
    display: inline-block;
}

.btn-info:hover, .btn-logout:hover {
    background-color:rgb(179, 8, 51);
}

.btn-info {
    background-color:rgb(230, 78, 78);
}

.btn-info:hover {
    background-color:rgb(199, 51, 29);
}

.btn-logout {
    background-color:rgb(223, 71, 86);
}

.btn-logout:hover {
    background-color:rgb(186, 34, 49);
}

.btn-container a:nth-child(3) {
    background-color:rgb(227, 72, 124);
}

.btn-container a:nth-child(3):hover {
    background-color:rgb(228, 35, 112);
}

.col-md-6 {
    flex: 1;
}

</style>

@endsection