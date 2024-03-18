<!DOCTYPE html>
<html>
<head>
	<title>SignUP</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="insert.php" id="signup-form">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="User name" required="" name="uname">
					<input type="email" name="email" placeholder="Email" required="" id="email">
					<input type="password" name="password" placeholder="Password" required="" id="psw">
					<button value="SignUp" id="SignUp" onclick="validateForm()">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form>
					<label><a href="login.php" style="text-decoration: none; color: black; cursor: pointer;">Login</a></label>
				</form>
			</div>
	</div>

	<script src=""></script>
</body>
</html>