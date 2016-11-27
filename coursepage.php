<?php
	require_once('db_con.php');
	require_once('buildTable.php');
	
	function getTable(){
		$connection = connect_to_db();
		$header = array('Course Number', 'Section', 'Date', 'Thread Name', 'Author');
		
		$sql = sprintf("SELECT * FROM thread WHERE CourseNumber = '%s' AND Section = '%s'", 
								$connection->real_escape_string($_GET["course"]),
								$connection->real_escape_string($_GET["section"]));
		show_thread_table($sql, $connection, $header, "threadpage.php");
		//INSERT INTO `thread`(`Course Number`, `Section`, `Date`, `Subject`, `Author`) VALUES ("CS372","01",STR_TO_DATE('10/20/16 12:00 PM','%m/%d/%Y %h:%i %p'),"When is the final exam?","Steve Jobs")
	}

    session_start();
?>


<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
    	<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript" src="Javascript/main.js">
		</script>
		<img class="logo" src="IPFW-logo.jpg" alt="IFPW Logo">
		<title>CS372 Forum</title>
	</head>
	<body>
		<section class="container" style="margin-top: 35px">
			<div class="header page-header page-heading">
				<h1>CS372 Forum</h1>
				<h4><a href="createthreadpage.html">Create new thread</a></h4>
			</div>
			<div class="table table-inverse">
				<?php getTable(); ?>
			</div>
		</section>
		
	</body>
</html>

