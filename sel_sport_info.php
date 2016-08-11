<?php	
			$sport= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM info WHERE sid = $sport";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)<=15)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$id=$r['id'];
				echo "<div id='vrsta'>";
		
			echo"<a href='select_news.php?id=". $r['id']."' style='color:black'><div class='innerVest'>";
			echo"<p style='color:style='color:#1E7096'; width:200px'>" . $r['title'] . "</p>";
			
			echo "<p style='color:#1E7096'>".$r['uvod']."</p>";
			
			echo "<p style='color:#1E7096'>" . $r['time_added'] . "</p>";
			echo"Vidi celu vest<a/>";

	
  
		
echo "</div>";

		echo	"</div>";}
		}
		?>
			