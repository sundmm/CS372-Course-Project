
<?php
				
	require_once('db_con.php');

	if(isset($_POST["thread_subject"])){
		$connection = connect_to_db();
		date_default_timezone_set('America/Indiana');
		
	    $sql = sprintf("INSERT INTO thread(CourseNumber, Section, Date, Subject, Author) VALUES ('%s', '%s', '%s', '%s', '%s')", 
		               		$connection->real_escape_string($_GET["course"]),
		               		$connection->real_escape_string($_GET["section"]),
		               		$connection->real_escape_string("STR_TO_DATE(" . date('m/d/Y h:i:s a', time()) . ", '%m/%d/%Y %h:%i %p')"),
							$connection->real_escape_string($_POST["thread_subject"]),
							$connection->real_escape_string("test"));
		echo $sql;					
        $result = $connection->query($sql) or die(mysqli_error());   
        
	    header("Location: coursepage.php?course=" . $_POST["course"] . "&section=" . $_POST["section"]);
	}
    
	echo('<input type="hidden" name="course" value="' . $_GET['course'] . '">');
	echo('<input type="hidden" name="section" value="' . $_GET['section'] . '">');
	echo('<input type="hidden" name="name" value="test">');
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js">
		</script>
		<title>Create New Thread</title>
	</head>
	<body>
		
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<section class ="container">
			<div class="header">
				Create New Thread
				<br/>
				<br/>
			</div>
			<form action="" id="createthread" method="POST" onsubmit="return validateCreateThread();">
				
					<label>Subject:
						<input class="form-control" type="text" name="thread_subject" size="40"/>
					</label>
					<br/>
					<label>Message: </label> <br/>
						<textarea class="form-control" name="thread_content" rows="4" cols="50"></textarea>
					<br/><br/>

				<input type="submit" class="btn btn-default" value="Create Thread"/>
			</form>
		<section>
	</body>
</html>