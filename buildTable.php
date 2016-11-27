<?php
    function show_course_table($sql, $connection, $headers, $refPage){
        echo "<table border = ".'1'.">\n";
        echo "<tr>\n<th>". implode("</th>\n<th>", $headers)."</th>\n</tr>\n";
        $result = $connection->query($sql) or die(mysqli_error()); 
        
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<tr";
			if($i % 2 == 0){
				echo ' class = "even">' . "\n";
			}else{
				echo ' class = "odd">' . "\n";
			}
			
			echo "<td>".'<a href="' . $refPage . '?course='. array_values($user)[0] . '&section=' . array_values($user)[1] .'">' . implode("</td>\n<td>",$user) . "</td>\n</tr>\n";
			$i++;
        }
        echo "</table>\n";
    }
    
    function show_thread_table($sql, $connection, $headers, $refPage){
    	echo '<table border="2" id="threads">'."\n";
    	echo '<thead class="thead-inverse">'."\n";
        echo "<tr>\n<th>". implode("</th>\n<th>", $headers)."</th>\n</tr>\n";
        echo "</thead>\n";
        $result = $connection->query($sql) or die(mysqli_error()); 
        echo "<tbody>\n";
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<tr";
			if($i % 2 == 0){
				echo ' class = "even">' . "\n";
			}else{
				echo ' class = "odd">' . "\n";
			}
			for($q = 0; $q < count($user); ++$q){
			    if($q != 3){
			        echo "<td>" . array_values($user)[$q] . "</td>\n" ;
			    }else{
			        $subject = str_replace(' ', '_', array_values($user)[3]);
			        echo "<td>".'<a href="' . $refPage . '?course='. array_values($user)[0] . '&section=' . array_values($user)[1] .'&subject=' . $subject .'">' . array_values($user)[$q] . "</a></td>\n";
			    }
			}
			$i++;
        }
        echo "</tbody>\n</table>\n";
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
			echo "Posted by: " . array_values($user)[4] ."<br/>\n";
			echo date('M j Y g:i A', strtotime(array_values($user)[5]))."<br/>\n";
			echo "<blockquote>" . array_values($user)[6] . "</blockquote>\n</div>\n";
			
			$i++;
        }
    }
?>