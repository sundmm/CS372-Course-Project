<?php
    function show_course_table($sql, $connection, $headers, $refPage){
        echo "<table>\n";
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

?>