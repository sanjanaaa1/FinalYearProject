@extends('fontend.fontend-design')

@section('title')
Products
@endsection

@section('content')
<br><br><br><br><br><br><br><br><br><br>


    <style>
        .front-page{
            height: 60vh;
           display: flex;
           justify-content: center;
           align-items: center;

        }
        .login-page{
            padding: 20px;
            border-radius: 10px;
            width:65%;
           box-shadow: 1px 2px 16px grey;

        }
        .image img{
            width: 100%;
            height:100%;
            object-fit: cover;
        }
        /* .input-container{
            border: 1px solid rgb(181, 88, 88);
            margin-bottom: 20px;

        }
        .input-container i{
            padding-left: 20px;
            border:none;
        }
        .input-container input{
            border: none;
            background: transparent;
        } */

        .login-form h2{
            text-align: center;
            color: #d7135f;
            margin-bottom: 40px;
        }
        .login-form .fgt-pw{
            float: right;
            color: #d7135f;
            margin-bottom: 30px;
        }
        .login-form button{
            border: 1px solid #d7135f;
            color: #d7135f;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
        }
        /* .login-form .google-link{
            text-decoration: none;
        } */
        .login-form .google{
            border: none;
            background: transparent;
            text-align: left;
            width: 100%;
            font-weight: bold;
            font-size: 18px;
        }
        .login-form p span a{
            color: #d7135f;
            text-decoration: none;
            font-weight: 600;
        }

        .lofin{
            font-size: 25x;
            font-weight: bold;

        }
        .nam{
            display: flex;
        }
        .ready{
             margin-top: -5px;
            padding-left:635px;
        }
        .input-container::selection{
            border: #d7135f;


        }
    </style>
</head>
<body>
    <div class="front-page">
        <div class="login-page">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 image">
                        {{-- <img src="https://ticosneaker.com.vn/shop/wp-content/uploads/2022/07/6f73a39954649e3ac77522.jpg" alt="login" > --}}
                        <img src="https://picsum.photos/500 " alt="login" >
                        {{-- //https://picsum.photos/500 --}}
                    </div>
                    <div class="col-md-6 login-form">
                        <h2 class="lofin">Sign Up</h2>
                        <form action="{{route('add.customer')}}" method="POST">
                            @csrf
                            @if(Session::has('success'))
                            <div class="row">
                                <p class="alert alert-success">{{ Session::get('success') }}</p>
                            </div>

    @endif
                            <div class="input-container">
                                <input type="text" name="name"  aria-describedby="emailHelp" placeholder="Enter Full Name" value="{{old('name')}}">

                          </div>
                          @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif

                            <div class="input-container">
                            <input type="text" name="number"  aria-describedby="emailHelp" placeholder="Enter number"  @error('name') is-invalid @enderror value="{{old('number')}}">

                          </div>
                          @if ($errors->has('number'))
                            <span class="text-danger">{{ $errors->first('number') }}</span>
                           @endif

                          <div class="input-container">
                            <input type="text" name="email"  placeholder="Enter email" value="{{old('email')}}">

                           </div>
                           @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                             @endif


                            <div class="input-container">
                                <input type="password" name="password"  aria-describedby="emailHelp" placeholder="Enter password">
                              </div>
                              @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                              <div class="input-container">
                                <input type="password"  name="confirm_password"  aria-describedby="emailHelp" placeholder="Confirm password">

                              </div>
                              @if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif

                              <div class="col-xs-12 col-sm-12 col-md-6">
                                 <!-- <div class="form-group">
                                   <strong>Recaptcha:</strong>
                                   {!! NoCaptcha::renderJs() !!}
                                   {!! NoCaptcha::display() !!}
                                   @if ($errors->has('g-recaptcha-response'))
                                   <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                               @endif
                                </div> <br> -->
                             </div>

                              <span style="background-color: #d7135f; color: white;"><button type="submit" class="form-control">CREATE ACCOUNT</button></span>



                           </div><br/>
                            <p class="ready">Already Have an account? <span><a href="{{route('customer-login')}}">Login</a></span></p>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div> <br><br><br><br> <br><br><br> <br>

@endsection
