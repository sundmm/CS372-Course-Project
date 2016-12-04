<?php 

    session_start();
    setcookie('user', "", time() - 3600);
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
	header("Location: homepage.php");
	
?>