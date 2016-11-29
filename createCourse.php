<?php


    

?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo">
		<title>Create new thread</title>
	</head>
	<body>
		<section class ="container">
			<div class="header">
				Create Course
				<br/>
				<br/>
			</div>
			<form action="" id="createthread" method="get" onsubmit="return validateCreateThread();">
				Course Number:
				<input type="text" name="courseNumber" size="30"/>
				<br/>
				Section:      
				<input type = "text" name="section" size="30"/>
				<br/>
				Course Name:  
				<input type = "text" name ="courseName" size = "30"/>
				<br/>
				Professor:
				<input type = "text" name = "professor" size = "30"/>
				<br/>
				<input type="submit" value="Add Class"/>
			</form>
		<section>
	</body>
</html>