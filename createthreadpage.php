
<?php
				
	require_once('db_con.php');
	require_once('insertIntoDB.php');
	session_start();

	if(isset($_POST["thread_subject"])){
        
        if(insertThread($_GET["course"], $_GET["section"], $_POST["thread_subject"], $_COOKIE["user"], $_POST['thread_content'])){
	    	header("Location: coursepage.php?course=" . $_GET["course"] . "&section=" . $_GET["section"]);
        	
        }
        
	}
	
    if(!$_SESSION["authenticated"]){
    	echo '<script type="text/javascript">'; 
		echo 'alert("You must be logged in to add a thread.");'; 
		echo 'window.location.href = "coursepage.php?course='. $_GET["course"] . "&section=" . $_GET["section"] . '";';
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
		<script type="text/javascript" src="Javascript/main.js">
		</script>
		<title>Create New Thread</title>
	</head>
	<body>
		
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<section class ="container">
			<div class="header">
				Create new thread
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
<?php } ?>