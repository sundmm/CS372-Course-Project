<?php
	require_once('db_con.php');
	require_once('buildTable.php');
	require_once('userControl.php');
	$loggedin = login();
	session_start();
	
	function getTable(){
		$connection = connect_to_db();
		$header = array('Course Number', 'Section', 'Date', 'Thread Name', 'Author');
		
		$sql = sprintf("SELECT * FROM thread WHERE CourseNumber = '%s' AND Section = '%s'", 
								$connection->real_escape_string($_GET["course"]),
								$connection->real_escape_string($_GET["section"]));
		show_thread_table($sql, $connection, $header, "threadpage.php");
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
		<title>
			<?php echo($_GET["course"] . " Forum"); ?>
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
		<section class="container" style="margin-top: 35px">
			<div class="header page-header page-heading">
				<?php echo($_GET["course"] . " Forum"); ?><br/>
				<a href="createthreadpage.php?course=<?php echo($_GET["course"] ."&section=" . $_GET["section"]); ?>">Create New Thread</a>
				<br>
			</div>
			<ul class="breadcrumbs">
				<li><a href="homepage.php">Home</a></li>
				<li><a><?php echo($_GET["course"]) ?> Forum</a></li>
			</ul>
			<br/>
			<div class="table">
				<?php getTable(); ?>
			</div>
		</section>
	</body>
</html>

