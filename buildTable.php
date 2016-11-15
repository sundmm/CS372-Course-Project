<?php
    function show_table($sql, $connection, $headers, $refPage){   
        echo "<table>\n";
        echo "<tr>\n<th>". implode("</th>\n<th>", $headers)."</th>\n</tr>\n";
    
        $result = $connection->query($sql) or die(mysqli_error());           
        $i = 0;
        while ($user = $result->fetch_assoc()){
            echo "<tr";
			if($i % 2 == 0){
				echo ' class = "even"';
			}else{
				echo ' class = "odd"';
			}
			echo ">\n<td>".'<a href="' . $refPage .'?query='. array_values($user)[0] .'">' . implode("</td>\n<td>",$user) . "</td>\n</tr>\n";
			$i++;
        }
        echo "</table>\n";
    }

?>