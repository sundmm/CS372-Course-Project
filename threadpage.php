<?php
	require_once('userControl.php');
	$loggedin = login();
	require_once('db_con.php');
	require_once('buildTable.php');
	require_once('insertIntoDB.php');
	$commentWork = 0;
	function getComments(){
		$connection = connect_to_db();
		
		$sql = sprintf("SELECT * FROM  comments WHERE CourseNumber =  '%s' AND CourseSection =  '%s' AND ThreadSubject like  '%s%%'", 
								$connection->real_escape_string($_GET["course"]),
								$connection->real_escape_string($_GET["section"]),
								str_replace("\'", '', str_replace('_', ' ',$connection->real_escape_string($_GET["subject"]))));
		
		show_comments($sql, $connection);
	}	
	
	if(isset($_POST['thread_reply'])){
		if(isset($_COOKIE['user'])){
			if(insertComment($_GET["course"], $_GET["section"], $_GET["subject"], $_COOKIE["user"], $_POST['thread_reply'])){
	    		header("Location: threadpage.php?course=" . $_GET["course"] . "&section=" . $_GET["section"] . "&subject=" . $_GET["subject"]);
        	
        	}
		}else{
			$commentWork = -1;
		}
		
		
	}
	
    session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<script type="text/javascript" src="Javascript/main.js"></script>
		<title>Thread: <?php echo(str_replace('_', ' ',$_GET["subject"])); ?></title>
		<?php  if($loggedin === -1){
	        echo '<script type="text/javascript">'; 
			echo 'alert("Invalid login information.");'; 
			echo '</script>';
		} else if ($commentWork === -1){
		
	        echo '<script type="text/javascript">'; 
			echo 'alert("You must be logged in to comment!");'; 
			echo '</script>';
		
		}?>
	</head>

	<body>
		<?php addLogin(); ?>
		<a href="homepage.php"><img class="logo" src="ipfw-logo-white.png" alt="IPFW Logo"></a>
		<section class="container">
			<div class="header">
				<?php echo($_GET["course"] . " Thread: " .str_replace('_', ' ',$_GET["subject"])); ?>
				<br/>
			</div>
			<ul class="breadcrumbs">
				<li><a href="homepage.php">Home</a></li>
				<li><a href="coursepage.php?course=<?php echo($_GET["course"] ."&section=" . $_GET["section"]); ?>"><?php echo($_GET["course"]) ?> Forum</a></li>
				<li><a>View Thread</a></li>
			</ul>
			<br/>
			<!-- Begin thread posts -->
			<?php getComments(); ?>
			<!-- End thread posts -->
			<br/>
			<form action="" class="form-group" id="createreply" method="POST" onsubmit="return validateReply();">
				<label>Reply:</label>
					<br/>
					<textarea class="form-control" name="thread_reply" rows="4" cols="50"></textarea>
					<br/>
					<br/>
					<button type="submit" class="btn btn-primary" value="Submit Reply"/>Submit Reply</button>
			</form>
		</section>
	</body>

</html>