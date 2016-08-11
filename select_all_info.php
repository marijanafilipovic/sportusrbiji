<?php
include_once 'inc/conn.php';
		$sport=['sport'];
		$query = "SELECT * FROM vesti WHERE vrsta_sporta = $sport";
		
		if($result = mysqli_query($conn, $query)){
			
		
		
	
			while($r = mysqli_fetch_row($result))
			{echo "<div id='vrsta'>";
		
			echo"<div class='innerPopular'>";
			echo"<h3>" . $r['title'] . "</h3>";
			
			echo "<p>".$r['text']."</p>";
echo "</div>";
		echo	"</div>";}}
		else{
			echo "Nema rezultata pretrage.";
		}

		



?>
