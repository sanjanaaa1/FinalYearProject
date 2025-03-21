

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Welcome to artifact nepal</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #f9f9f9;
			color: #333333;
			font-size: 16px;
			line-height: 1.5;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #ffffff;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}
		h4, p {
			margin-top: 0;
			margin-bottom: 20px;
		}
		a {
			display: inline-block;
			padding: 10px 20px;
			background-color: #4CAF50;
			color: #ffffff;
			text-decoration: none;
			border-radius: 5px;
			font-weight: bold;
			transition: background-color 0.3s ease;
		}
		a:hover {
			background-color: #3e8e41;
		}
		.signature {
			margin-top: 20px;
			font-weight: bold;
			text-align: right;
		}
	</style>
</head>
<body>

	<div class="container">
        @include('session')

		<h4><strong>Hello {{ $customer->name }},</strong></h4>

		<p>Thank you for registering with OutFitTops. We're thrilled to have you join us!</p>

		<p>Please click the following link to verify your email address:</p>

		<a href="{{ route('verify.account', ['id' => $customer->id]) }}">Verify Email</a>

		<p>If you did not register with us, please ignore this email.</p>
        <p> OutFit@gmail.com</p>

		<div class="signature">
			Best regards,<br>
			OutFitTops
		</div>

	</div>

</body>
</html>


