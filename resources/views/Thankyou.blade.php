<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Thank You Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .full-screen {
            height: 100vh;
        }

        .card {
            background-color: #F3F4F6;
        }

        .card-header {
            background-color: #10B981;
            color: #FFFFFF;
        }

        /* .card-header h1 {
            font-size: 3rem;
        } */

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-body h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .card-body svg {
            margin-bottom: 1.5rem;
        }

        .card-body a,
        .card-body button {
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <div class="full-screen d-flex justify-content-center align-items-center">
        <div class="card col-md-4 shadow-md">
            <div class="card-header">
                <h1>Thank You For Shopping with us!</h1>
            </div>
            <div class="card-body">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75" fill="currentColor"
                    class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path
                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
                <h2>Your Order was Successful!</h2>w
                <h2>Your  will recieve a call to recive goods</h2>
                <a href="{{route('generate-pdf')}}" class="btn btn-primary btn-lg">Download Invoice</a>
                <a href="{{route('homePage')}}" class="btn btn-primary btn-lg">Download Invoice</a>
                <!-- <button class="btn btn-outline-success btn-lg {{route('homePage')}}">Back Home</button> -->

            </div>
        </div>
    </div>
    <style>
        html, body {
  height: 100%;
}

.card {
    margin-top: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}


@media (min-width: 992px) {
  .card {
    width: 80%;
  }
}

    </style>
</body>

</html>
