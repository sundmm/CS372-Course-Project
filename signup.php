<?php
	require_once('db_con.php');
	require_once('userControl.php');
	
	if(isset($_POST["name"])){
		addUser($_POST["name"], $_POST["email"], $_POST["password1"]);
	}

?>

<!DOCTYPE html>

<html>
<head>
	<title>Sign Up</title>

	<meta charset="utf-8">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<script type="text/javascript" src="Javascript/main.js"></script>
</head>
	<body>
	<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>


	<div class="container">
		<div class="header">
			IPFW Course Forum
		</div>

		<legend>Sign Up</legend>

		<div class="form-group">

		<form id="signup" action="" method="POST" onsubmit="return validateSignup();">
			
			
			<label>Name: <input name="name" type="text" class="form-control"></label>
			<br/><br/>
			<label>Email: <input name="email" type="text" class="form-control"></label>
			<br/><br/>
			<label>Password: <input name="password1" type="password" class="form-control"></label>
			<br/><br/>
			<label>Password (again): <input name="password2" type="password" class="form-control"></label>
			<br/><br/>
			<input type="submit" value="Sign Up" class="btn btn-default">
		</form>
	</div>
	</div>
</body>
</html>