 @extends('fontend.fontend-design')

@section('title')
LOgin Page
@endsection


@section('content')
    <style>
        .front-page{
            height: 100vh;
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
            height:500px;
            object-fit: cover;
            border-radius: 2px;

        }
        .input-container{
            border: none;
            border: 1px solid rgb(106, 103, 103);
            height: 40px;
            margin-bottom: 20px;

        }
        .input-container i{
            padding-left: 20px;
        }
        .input-container input{
            border: none;
            background: transparent;
        }
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
            font-size: 32px;
            font-weight: bold;
            margin-top: 15px;
        }

    </style>
</head>
<body>
    <div class="front-page">
        <div class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 image">
                        <img src="https://picsum.photos/500" alt="login" >
                    </div>
                    <div class="col-md-6 login-form">
                        <h2 class="lofin">Log in</h2>
                        @include('session')
                        <form action="{{route('login-user')}}" method="POST">
                             @csrf


                            <div class="input-container">

                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                              @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                            <div class="input-container">
                                <input type="password"  name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
                              </div>
                              @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                            <a href="/forget-password"  class="fgt-pw" style="text-decoration: none; font-weight: bold;"> Forget password?</a>
                            <span><button type="submit" class="form-control">Log in</button></span>
                           <div class="d-flex google-link">
                            <button type="submit" class="form-control"><img src="https://cdn2.ettoday.net/images/2824/2824095.jpg" alt="google" width="25px" height="25px" ><a href="{{route('login')}}"  style="text-decoration: none;"><span style="font-weight: bold; font-size: 14px;">  Continue with google</span></a></button>
                           </div><br/>
                            <p>Don't have an account? <span> <a href="{{route('customer-register')}}">Sign Up</a></span></p>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
