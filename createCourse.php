<?php
	require_once('db_con.php');
	require_once('insertIntoDB.php');
	
	session_start();
	
	if(isset($_POST["courseNumber"])){
        if(insertCourse($_POST["courseNumber"], $_POST["section"], $_POST["courseName"], $_POST["professor"])){
	    	header("Location: homepage.php");
        }else{
        	
        }
	}
    if(!$_SESSION["authenticated"]){
    	echo '<script type="text/javascript">'; 
		echo 'alert("You must be logged in to create a course.");'; 
		echo 'window.location.href = "homepage.php";';
		echo '</script>';
	}else{

?>
<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js"></script>
		<title>Create new thread</title>
	</head>
	<body>
		
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<section class ="container">
			<div class="header">
				Create Course
				<br/>
				<br/>
			</div>
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
				
				<br/><br/>
				<input type="submit" class="btn btn-default" value="Add Course"/>
			</form>
		</div>
		</div>
	</body>

</html>
<?php } ?>