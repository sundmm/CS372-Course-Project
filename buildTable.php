<?php
    function show_course_table($sql, $connection, $headers, $refPage){
        echo "<table border = ".'1'.">\n";
        echo "<tr>\n<th>". implode("</th>\n<th>", $headers)."</th>\n</tr>\n";
        $result = $connection->query($sql) or die(mysqli_error()); 
        
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<tr";
			if($i % 2 == 0){
				echo ' class = "post-even">' . "\n";
			}else{
				echo ' class = "post-odd">' . "\n";
			}
			
			echo "<td>".'<a href="' . $refPage . '?course='. array_values($user)[0] . '&section=' . array_values($user)[1] .'">' . implode("</td>\n<td>",$user) . "</td>\n</tr>\n";
			$i++;
        }
        echo "</table>\n";
    }
    
    function show_thread_table($sql, $connection, $headers, $refPage){
    	echo '<table border="2">'."\n";
        echo "<tr>\n<th>". implode("</th>\n<th>", $headers)."</th>\n</tr>\n";
        $result = $connection->query($sql) or die(mysqli_error()); 
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<tr";
			if($i % 2 == 0){
				echo ' class = "post-even">' . "\n";
			}else{
				echo ' class = "post-odd">' . "\n";
			}
			for($q = 0; $q < count($user); ++$q){
			    if($q != 3){
			        echo "<td>" . array_values($user)[$q] . "</td>\n" ;
			    }else{
			        $subject = str_replace(' ', '_', array_values($user)[3]);
			        echo "<td>".'<a href="' . $refPage . '?course='. array_values($user)[0] . '&section=' . array_values($user)[1] ."&subject='" . $subject . "'" . '">' . array_values($user)[$q] . "</a></td>\n";
			    }
			}
			$i++;
        }
        echo "</table>\n";
    }
    
    function show_comments($sql, $connection){
        $result = $connection->query($sql) or die(mysqli_error());
        
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<div";
			if($i % 2 == 0){
				echo ' class = "post-even">' . "\n";
			}else{
				echo ' class = "post-odd">' . "\n";
			}
			echo "Posted by: " . array_values($user)[3] ."<br/>\n";
			echo date('M j Y g:i A', strtotime(array_values($user)[4]))."<br/>\n";
			echo "<blockquote>" . array_values($user)[5] . "</blockquote>\n</div>\n";
			
			$i++;
        }
    }
?>