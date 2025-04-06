<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Renting Information Updated</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
    <style>
        @import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    </style>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
    <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Lato', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .site-header {
            background: linear-gradient(90deg, #28a745, #218838);
            padding: 30px 0;
            text-align: center;
        }

        .site-header__title {
            font-size: 40px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            margin: 0;
            letter-spacing: 1px;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 30px;
        }

        .main-content__checkmark {
            color: #28a745;
            font-size: 80px;
            margin-bottom: 20px;
            animation: pop 0.8s ease;
        }

        @keyframes pop {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-message {
            font-size: 18px;
            font-weight: 600;
            color: #444;
            margin-bottom: 25px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            background: #28a745;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        a:hover {
            background: #1e7e34;
        }

        .site-footer {
            padding: 15px 0;
            background: #333;
            color: white;
            font-size: 14px;
            text-align: center;
        }

        /* Mobile Responsive */
        @media(max-width: 480px) {
            .site-header__title {
                font-size: 28px;
            }

            /* .main-content__checkmark {
                font-size: 60px; */
            }

            .success-message {
                font-size: 18px;
            }

            a {
                padding: 10px 20px;
                font-size: 16px;
            }
			.main-content strong {
   				 font-weight: bold;
    			font-size: 24px; 
    			color: #333; 
}

    </style>
</head>

<body>
    <header class="site-header" id="header">
        <h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
    </header>

    <!-- <div class="main-content">
        <i class="fa fa-check main-content__checkmark" id="checkmark"></i> -->
        <!-- You renting information has been updated successfully.<br> -->
        <!-- Add your details here.. -->
        <!-- <a href="{{ route('showrent') }}">click here</a> -->
    <!-- </div> -->
	<div class="main-content">
    <!-- <i class="fa fa-check main-content__checkmark" id="checkmark"></i> -->
    <strong>You renting information has been updated successfully.</strong><br>
    <strong>Add your details here..</strong>
    <a href="{{ route('showrent') }}">click here</a>
	</div>


    <footer class="site-footer" id="footer">
        <p class="site-footer__fineprint" id="fineprint">Copyright ©2025 | All Rights Reserved</p>
    </footer>
</body>

</html>
