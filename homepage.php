<?php
	require_once('db_con.php');
	require_once('buildTable.php');
	
    session_start();
	
	function getTable(){
		$connection = connect_to_db();
		$header = array('Course Number', 'Section', 'Course Name', 'Professor');
		$sql = sprintf("SELECT * FROM courses");
		show_course_table($sql, $connection, $header, "coursepage.php");
	}
	
	function login(){
		if(isset($_SESSION["authenticated"])){
			return true;
		} else if (isset($_POST["email"]) && isset($_POST["password"])){
			$connection = connect_to_db();
	        $sql = sprintf("SELECT 1 FROM users WHERE email= '%s' AND password=PASSWORD('%s')", 
								$connection->real_escape_string($_POST["email"]),
								$connection->real_escape_string($_POST["password"]));
	        echo("$sql");
        	$result = $connection->query($sql) or die(mysqli_error());     
	
	        if ($result->num_rows == 1) {
	            $_SESSION["authenticated"] = true;
	            header("Location: homepage.php");
	            exit;
	            return true;
	        }
	    }
	    return false;
	    
		//INSERT INTO users( user_id, email, PASSWORD ) VALUES (NULL ,  'email', PASSWORD('''))
	}
	

?>
<!DOCTYPE html>

<html >
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<title>
			IPFW Course Forum
		</title>
	</head>
	<body background="ipfw-background.jpg">
		<aside>
			<?php if(login()){ ?>
				<a href ="logout.php">Log Out</a>
				
			<?php } else { ?>
				<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
					Email: <input name="email" type="text">
					<br><br>
					Password: <input name="password" type="password"> 
					<br><br>
					<input type="submit" value="Login">
					<br><br>
					<p>No account? <a href="signup.html">Sign up</a></p>
				</form>
			<?php } ?>
		</aside>
		<img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo">
		<section class="container">
			<div class="header">
				IPFW Course Forum<br/>
				<a href ="createCourse.php">Add Course</a>
				<br><br>
			</div>
			<div class="table">
				<?php getTable(); ?>
			</div>
		</section>
	</body>
</html>