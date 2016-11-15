<?php
	require_once('db_con.php');
	require_once('buildTable.php');
	
	function getTable(){
		$connection = connect_to_db();
		$header = array('Course Number', 'Section', 'Course Name', 'Professor');
		$sql = sprintf("SELECT * FROM courses");
		show_table($sql, $connection, $header, "coursepage.html");
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
	<body>
		<aside>
			Email: <input name="email" type="text">
			<br><br>
			Password: <input name="password" type="password"> 
			<br><br>
			<input type="submit" value="Login">
			<br><br>
			<p>No account? <a href="signup.html">Sign up</a></p>			
		</aside>
		<img class="logo" src="IPFW-logo.jpg" alt="IFPW Logo">
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