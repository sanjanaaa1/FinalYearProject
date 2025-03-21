<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Delivery Address Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-03rx7Lioe0J0/ejKpgmz48CHmPIlJdECzoKjZ08I9cX1sL/yzLxOwI/7j+EmQFWt3qEi09NpN7OeB9jPe4vy4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Delivery Address</h1>
		<form>
			<div class="form-group">
				<label for="name"><i class="fas fa-user"></i>Name</label>
				<input type="text" id="name" name="name" placeholder="Enter your name" required>
			</div>
			<div class="form-group">
				<label for="phone"><i class="fas fa-phone"></i>Phone Number</label>
				<input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
			</div>
			<div class="form-group">
				<label for="address"><i class="fas fa-map-marker-alt"></i>Address Line 1</label>
				<input type="text" id="address" name="address" placeholder="Enter your address" required>
			</div>
			<div class="form-group">
				<label for="address2"><i class="fas fa-map-marker-alt"></i>Address Line 2</label>
				<input type="text" id="address2" name="address2" placeholder="Enter additional address information">
			</div>
			<div class="form-group">
				<label for="city"><i class="fas fa-city"></i>City</label>
				<input type="text" id="city" name="city" placeholder="Enter your city" required>
			</div>
			<div class="form-group">
				<label for="state"><i class="fas fa-map-marker-alt"></i>State/Province/Region</label>
				<input type="text" id="state" name="state" placeholder="Enter your state/province/region" required>
			</div>
			<div class="form-group">
				<label for="postal"><i class="fas fa-envelope"></i>Postal Code</label>
				<input type="text" id="postal" name="postal" placeholder="Enter your postal code" required>
			</div>
			<button type="submit"><i class="fas fa-paper-plane"></i>Submit</button>
		</form>
	</div>
</body>
<style>
    body {
	background-color: #F5F5F5;
	font-family: Arial, sans-serif;
}

.container {
	background-color: #FFFFFF;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
	margin: 20px auto;
	max-width: 600px;
	padding: 20px;
	text-align: center;
}

h1 {
	color: #333333;
	font-size: 24px;
	margin-bottom:
}

</style>
</html>
