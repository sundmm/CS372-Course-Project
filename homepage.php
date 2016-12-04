<?php
//comment following 2 lines to hide PHP error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);


	require_once('db_con.php');
	require_once('buildTable.php');
	require_once('userControl.php');
	
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
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js"></script>
		<title>
			IPFW Course Forum
		</title>
	</head>
	<body>
		
		<?php addLogin(); ?>
		<img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo">
		<br/>
		<section class="container">
			<div class="header page-header page-heading">
				IPFW Course Forum<br/>
				<a href ="createCourse.php">Add Course</a>
				<br>
			</div>
			<ul class="breadcrumb">
				<li><a>Home</a></li>
			</ul>
			<br/>
			<div class="table">
				<?php getTable(); ?>
			</div>
		</section>
	</body>
</html>