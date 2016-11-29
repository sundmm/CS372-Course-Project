<?php
	require_once('db_con.php');
	require_once('buildTable.php');
	
	function getComments(){
		$connection = connect_to_db();
		
		$sql = sprintf("SELECT * FROM  comments WHERE CourseNumber =  '%s' AND CourseSection =  '%s' AND ThreadSubject like  '%s%%'", 
								$connection->real_escape_string($_GET["course"]),
								$connection->real_escape_string($_GET["section"]),
								str_replace('_', ' ',$connection->real_escape_string($_GET["subject"])));
		show_comments($sql, $connection);
		//INSERT INTO comments(CourseNumber, CourseSection, ThreadSubject, ThreadDate, PostDate, Comment) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	}	
	function buildComments(){
		
	}
	
    session_start();
?>

﻿<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js">
		</script>
		<img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo">
		<title>Thread: When is the final exam?</title>
	</head>
	<body>
		<section class="container">
			<div class="header">
				CS372 Thread: When is the final exam?
				<br/>
				<br/>
			</div>
			<!-- Begin thread posts -->
			<?php getComments(); ?>
			<!-- End thread posts -->
			<br/>
			<form>
				Reply:
					<br/>
					<textarea name="thread_reply" rows="4" cols="50"></textarea>
					<br/>
					<br/>
					<input type="submit" value="Submit Reply"/>
			</form>
		</section>
	</body>
</html>