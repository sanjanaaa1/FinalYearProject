@extends('fontend.fontend-design')

@section('title')
    {{-- {{ $datas->title }} --}}
@endsection

@section('content')

    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}


    <div class="box">
      <h1>User Information</h1>
      <div class="row">
        <div class="col-md-6">
            @if (!empty(Auth::user()))
            {{-- <p> Image<i class="fas fa-phone"></i></p><br> --}}
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
        <div class="col-md-6">
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
          <form action="{{route('userChangepassword')}}" method="POST">
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
    <style>
        /* Custom styles */
        .box{
          opacity: 0.9;
          box-shadow: 0px 0px 10px #888888;

          padding: 30px;


  margin: 20px auto;


  max-width: 1000px;

        }
        h1, h2 {
          font-weight: bold;
          color: #3399FF;
          margin-top :0px;
        }
        .btn-logout {
          margin-top: 20pxpx;
        }
        .col-md-6 p {
            margin-top: 5px;
          /* margin-bottom: 5px; */
          font-weight: bold;
          color: #3399FF;
        }
        .change-password {
          padding-top :A5px;
          color: #009933;


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
    {{-- <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html> --}}




{{-- <p> <a href="{{ route('user.logout') }}"> Logout</a></p> --}}
{{-- <p><a href="#" id="changePass">Change Password</a></p> --}}
{{-- <p> <i class="fa-solid fa-user"></i> User Name: {{ Auth::user()->name }} </p> --}}
{{-- <p> User Email : {{ Auth::user()->email }}</p> --}}
{{-- <p> User Number : {{ Auth::user()->number }}</p> --}}



