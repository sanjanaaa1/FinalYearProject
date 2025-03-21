<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .container{
            text-align: center;
            margin-right: auto;
            margin-left: auto;
            padding-bottom: 350px;
            margin-top: 100px;
        }
        .key i{
            background-color: rgb(177, 175, 175);
            padding: 15px;
            border-radius: 50%;
            color:#7f56da;
            font-size: 20px;
        }
        label{
          margin-left:-26%;
        }
        input,button{
          margin: auto;
        }
        input:focus{
          border: none;
          box-shadow: none;
        }
        .form-control{
            width: 30%;
        }
        .resetpw{
          background-color: #7f56da;
          color: #fff;
          font-weight: 600;
        }
    </style>
    </head>

  <body>
    <div class="container">
        <form action="{{route('password-forget')}}"  method="POST">
            @csrf
            <div class="container">

            <div class="key">
                <i class="fa-solid fa-key"></i>
            </div><br>

            <h3>Forgot Password?</h3>
            <h6>You will get a rest link.<h6><br>
                @if(Session::has('message'))
                <div class="row">
                    <p class="alert alert-success">{{ Session::get('message') }}</p>
                </div>
                @endif
            <label for="email">Email</label><br>
            <input class="form-control" type="email" name="email"><br><br>
            @if ($errors->has('email'))
                                  <span class="text-danger">{{ $errors->first('email') }}</span>
                              @endif
            <button class="form-control resetpw" type="submit" >Reset Password </button>
            </form>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>
