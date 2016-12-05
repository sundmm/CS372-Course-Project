<?php 

    session_start();
    setcookie('user', "", time() - 3600);
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
    echo(isset($_GET['location']));
    
    if(isset($_GET["location"])){
        if(startsWith($_GET["location"], "threadpage")){
	        header('Location: threadpage.php?course=' . $_GET['course'] . '&section=' . $_GET['section'] . "&subject=" . $_GET["subject"]);
        }else if (startsWith($_GET["location"], "coursepage")){
	        header('Location: coursepage.php?course=' . $_GET["course"] . "&section=" . $_GET["section"]);
            
        }else if (startsWith($_GET["location"], "homepage")){
	   	    header("Location: homepage.php");
            
        }
	            	
	}
	
	
	
	function startsWith($string, $location){
        $length = strlen($location);
        return (substr($string, 0, $length) === $location);
    }
	
?>