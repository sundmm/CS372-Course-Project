<?php

	require_once('db_con.php');
	
    function insertCourse($number, $section, $name, $professor){
		$connection = connect_to_db();
    	
    	if(isset($_SESSION["authenticated"])){
    	    
    	    $sql = sprintf("SELECT 1 FROM courses WHERE CourseNumber = '%s' and Section =  '%s'",
                                                    $connection->real_escape_string($number),
                                                    $connection->real_escape_string($section));
                                                    
            $result = $connection->query($sql) or die(mysqli_error()); 
            
            if ($result->num_rows == 1) {
	            return false;
	        }else{
	            $sql = sprintf("INSERT INTO  courses (CourseNumber, Section,  CourseName,  Professor) VALUES ( '%s',  '%s',  '%s',  '%s')",
                                                    $connection->real_escape_string($number),
                                                    $connection->real_escape_string($section),
                                                    $connection->real_escape_string($name),
                                                    $connection->real_escape_string($professor));
                                                    
                $result = $connection->query($sql) or die(mysqli_error()); 
                return true;
	        }
    	} 
    	return false;
        
    }
    
    function insertThread($number, $section, $subject, $user, $comment){
        
        $connection = connect_to_db();
		date_default_timezone_set('America/Indiana');
    	if(isset($_SESSION["authenticated"])){
    	    
    	    $sql = sprintf("SELECT 1 FROM thread WHERE CourseNumber = '%s' and Section =  '%s' and Subject =  '%s'",
                                                    $connection->real_escape_string($number),
                                                    $connection->real_escape_string($section),
                                                    $connection->real_escape_string($subject));
                                                    
            $result = $connection->query($sql) or die(mysqli_error()); 
            
            if ($result->num_rows == 1) {
	            return false;
	        }else{
	            $sql = sprintf("INSERT INTO thread(CourseNumber, Section, Date, Subject, Author) VALUES ('%s', '%s', NOW( ) - INTERVAL 5 HOUR, '%s', '%s')", 
		               		                        $connection->real_escape_string($number),
		               		                        $connection->real_escape_string($section),
							                        $connection->real_escape_string($subject),
							                        $connection->real_escape_string($user));
                $result = $connection->query($sql) or die(mysqli_error());  
                
                insertComment($number, $section, $subject, $user, $comment);
                return true;
	        }
    	} 
    	return false;
    }
    function insertComment($number, $section, $subject, $user, $comment){
        
        $connection = connect_to_db();
        
    	if(isset($_SESSION["authenticated"])){
    	    
	       $sql = sprintf("INSERT INTO comments(CourseNumber, CourseSection, ThreadSubject, User, PostDate, Comment) VALUES ('%s', '%s', '%s', '%s', NOW( ) - INTERVAL 5 HOUR, '%s')", 
		          		                        $connection->real_escape_string($number),
		           		                        $connection->real_escape_string($section),
						                        $connection->real_escape_string($subject),
						                        $connection->real_escape_string($user),
						                        $connection->real_escape_string($comment));
			echo $sql;
            $result = $connection->query($sql) or die(mysqli_error());  
            return true;
	    }
    	
    	return false;
    }
    
    
    


?>