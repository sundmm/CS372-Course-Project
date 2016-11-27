<?php
    function insertCourse($number, $section, $name, $professor){
    	
    	if(isset($_SESSION["authenticated"])){
    	    
    	    $sql = sprintf("SELECT 1 FROM courses WHERE CourseNumber = '%s' and Section =  '%s' and CourseName =  '%s' and Professor = '%s')",
                                                    $connection->real_escape_string($number),
                                                    $connection->real_escape_string($section),
                                                    $connection->real_escape_string($name),
                                                    $connection->real_escape_string($professor));
                                                    
            $result = $connection->query($sql) or die(mysqli_error()); 
            
            if ($result->num_rows == 1) {
	            $_SESSION["authenticated"] = true;
	            header("Location: homepage.php");
	            exit;
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
    


?>