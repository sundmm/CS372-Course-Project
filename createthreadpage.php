
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
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript" src="Javascript/main.js">
		</script>
		<title>Create new thread</title>
	</head>
	<body>
		
		<img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo">
		<section class ="container">
			<div class="header">
				Create new thread
				<br/>
				<br/>
			</div>
			<form action="" id="createthread" method="POST" onsubmit="return validateCreateThread();">
				Subject:
				<br/>
				<input type="text" name="thread_subject" size="40"/>
				<br/>
				<br/>
				Message:
				<br/>
				<textarea name="thread_content" rows="4" cols="50"></textarea>
				<br/>
				<br/>
				<input type="submit" value="Create Thread"/>
			</form>
		<section>
	</body>
</html>