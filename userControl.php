<?php
	require_once('db_con.php');
	
	session_start();

	function login(){
		if(isset($_SESSION["authenticated"])){
			return 1;
		} else if (isset($_POST["email"]) && isset($_POST["password"])){
			$connection = connect_to_db();
	        $sql = sprintf("SELECT name FROM users WHERE email= '%s' AND password=PASSWORD('%s')", 
								$connection->real_escape_string($_POST["email"]),
								$connection->real_escape_string($_POST["password"]));
        	$result = $connection->query($sql) or die(mysqli_error());     
	
	        if ($result->num_rows == 1) {
	        	$user = $result->fetch_assoc();
	            $_SESSION["authenticated"] = true;
	            $username = $user["name"];
	            setcookie("user", $username, time() + (3600 * 30)) or die("couldn't set cookie. login failed.");
	            
	            if(isset($_GET["subject"])){
	            	header('Location: threadpage.php?course=' . $_GET['course'] . '&section=' . $_GET['section'] . "&subject=" . $_GET["subject"]);
	            	
	            }else if(isset($_GET["course"])){
	            	header('Location: coursepage.php?course=' . $_GET["course"] . "&section=" . $_GET["section"]);
	            	
	            }else{
	            	header("Location: homepage.php");
	            }
	            return 1;
	        }else{
	        	return -1;
	        }
	        
	    }
	    return 0;
	    
	}
	function addUser($name, $email, $password){
	    $connection = connect_to_db();
	    $sql = sprintf("INSERT INTO users( user_id, name, email, password ) VALUES (NULL , '%s', '%s', PASSWORD('%s'))", 
		               		$connection->real_escape_string($name),
		               		$connection->real_escape_string($email),
							$connection->real_escape_string($password));
		
        $result = $connection->query($sql) or die(mysqli_error());   
	    header("Location: homepage.php");
	}
	
	function addLogin(){ ?>
		<aside>
			<?php if($_SESSION["authenticated"]){ ?>
				<p><?php echo "Hello " . $_COOKIE["user"]; ?></p>
				<a href ="logout.php?location=
				<?php 
					if(isset($_GET["subject"])){
		            	echo 'threadpage.php&course=' . $_GET['course'] . '&section=' . $_GET['section'] . "&subject=" . $_GET["subject"] . '"';
		            	
		            }else if(isset($_GET["course"])){
		            	echo 'coursepage.php&course=' . $_GET["course"] . "&section=" . $_GET["section"] . '"';
		            	
		            }else{
		            	echo  'homepage.php"';
		            }
				?>
				>Log Out</a>
				
			<?php } else { ?>
				<form id="login" action="<?php echo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" method="post" onsubmit="return validateLogin();">
					Email: <input name="email" type="text">
						<br><br>
					Password: <input name="password" type="password"> 
					<br><br>
					<input type="submit" value="Login">
					<br><br>
					<p>No account? <a href="signup.php">Sign up</a></p>
				</form>
			<?php } ?>
		</aside>
	<?php }
?>