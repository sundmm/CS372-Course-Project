<?php
	require_once('db_con.php');
	
	session_start();

	function login(){
		if(isset($_SESSION["authenticated"])){
			return true;
		} else if (isset($_POST["email"]) && isset($_POST["password"])){
			$connection = connect_to_db();
	        $sql = sprintf("SELECT 1 FROM users WHERE email= '%s' AND password=PASSWORD('%s')", 
								$connection->real_escape_string($_POST["email"]),
								$connection->real_escape_string($_POST["password"]));
        	$result = $connection->query($sql) or die(mysqli_error());     
	
	        if ($result->num_rows == 1) {
	            $_SESSION["authenticated"] = true;
	            header("Location: homepage.php");
	            return true;
	        }
	    }
	    return false;
	    
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
			<?php if(login()){ ?>
			
				<a href ="logout.php">Log Out</a>
				
			<?php } else { ?>
				<form class="form-group" id="login" action="<?php echo("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" method="post" onsubmit="return validateLogin();">
					Email: <input name="email" type="email" class="form-control" placeholder="Enter email">
						<br><br>
					Password: <input name="password" class="form-control" type="password" placeholder="Password"> 
					<br><br>
					<input class="btn btn-primary" type="submit" value="Login">
					<br><br>
					<p>No account? <a href="signup.php">Sign up</a></p>
				</form>
			<?php } ?>
		</aside>
	<?php }
?>