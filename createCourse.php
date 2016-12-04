<?php
	require_once('db_con.php');

	if(isset($_POST["courseNumber"])){
		$connection = connect_to_db();
		
	    $sql = sprintf("INSERT INTO courses(CourseNumber, Section, CourseName, Professor) VALUES  ('%s' , '%s', '%s', '%s')", 
		               		$connection->real_escape_string($_POST["courseNumber"]),
		               		$connection->real_escape_string($_POST["section"]),
		               		$connection->real_escape_string($_POST["courseName"]),
		               		$connection->real_escape_string($_POST["professor"]));
		
        $result = $connection->query($sql) or die(mysqli_error());   
	    header("Location: homepage.php");
	}
    

?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js"></script>
		<title>Create Course</title>
	</head>
	<body>
		
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<div class ="container">
			<div class="header">
				Create Course
			</div>
			<br/><br/>
			<div class="form-group">
			<form action="" id="createcourse" method="POST" onsubmit="return validateCreateCourse();">
				
					<label>Course Number:
						<input class = "form-control" type="text" name="courseNumber" size="30"/>
					</label>
				<br/><br/>
					<label>Section:
						<input class = "form-control" type = "text" name="section" size="30"/>
					</label>
				<br/><br/>
					<label>Course Name:
						<input class = "form-control" type = "text" name ="courseName" size = "30"/>
					</label>
				<br/><br/>
					<label>Professor:
						<input class = "form-control" type = "text" name = "professor" size = "30"/>
					</label>
				

				<input type="submit" class="btn btn-default" value="Add Course"/>
			</form>
		</div>
		</div>
	</body>
</html>