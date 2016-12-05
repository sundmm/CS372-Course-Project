<?php
	//comment following 2 lines to hide PHP error reporting
	// error_reporting(E_ALL);
	// ini_set('display_errors', TRUE);
	require_once('userControl.php');
	$loggedin = login();
	require_once('db_con.php');
	require_once('buildTable.php');
	
    session_start();
	function getTable(){
		$connection = connect_to_db();
		$header = array('Course Number', 'Section', 'Course Name', 'Professor');
		$sql = sprintf("SELECT * FROM courses");
		show_course_table($sql, $connection, $header, "coursepage.php");
	}
?>
<!DOCTYPE html>

<html >
	
	<head>
		<meta charset="utf-8">
    	<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js"></script>
		<title>
			IPFW Course Forum
		</title>
		<?php  if($loggedin === -1){
	        echo '<script type="text/javascript">'; 
			echo 'alert("Invalid login information.");'; 
			echo '</script>';
		}?>
	</head>
	<body>
		
		<?php addLogin(); ?>
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<br/>
		<section class="container">
			<div class="header page-header page-heading">
				IPFW Course Forum<br/>
				<a href ="createCourse.php">Add Course</a>
				<br><br>
			</div>
			<ul class="breadcrumbs">
				<li><a>Home</a></li>
			</ul>
			<br/>
			<div class="table">
				<?php getTable(); ?>
			</div>
		</section>
	</body>
</html>