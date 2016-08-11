<?php
include_once 'conn.php';
?>


<?php
if(isset($_GET['kriterijum'])){
	
	$kriterijum = trim($_GET['kriterijum']);

	if(!empty($kriterijum)){
		$query = "SELECT * FROM sportovi WHERE sport LIKE '%$kriterijum%' ORDER BY sport ASC";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				
				
				
				
				
				echo "<div id='vrsta' class='animated'>";
		
echo "<div class='innerVest' style='width:180px; height:350px;'>";
			echo"<div class='innerPopular'>";
			echo"<h2>" . $r['sport'] . "</h2>";
	$sid=$r['sid'];
	echo"<a href='inc/select_sport.php?sid=". $row['sid']."'><img src='img/". $row['sport']. ".png' />";
echo"<div class='innerSpark' >";
echo "</div></div>";
		




		$query ="SELECT * FROM vrsta_sporta WHERE sid = $sid";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{	echo"<div  style='padding-top:30px;  '>";
			echo "<p>". $sport ." disciplina: </p>";
			while($r = mysqli_fetch_assoc($result))
			{
				$vrsta=$r['vrsta'];			
			echo "<div class='login' style='padding-right:10px; width:100px;  color:#1E7096;'>".$r['vrsta']."</div>";	 
		}
		}else{
			echo $sport ." nema pod kategorije.";
		}





echo "</div>";
		echo	"</div>";}
		}
	



}


}

?>
</div>
<?php
if(!isset($_GET['kriterijum'])){
		$query = "SELECT * FROM sportovi ORDER BY sport DESC";
		
		$r = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($r)>0)
		{
			while($row = mysqli_fetch_assoc($r))
			{
				
				
				
				
				
				echo "<div id='vrsta'>";
		
			echo"<div class='innerPopular' >";
			
			echo"<h2 style='color:white;'>" . $row['sport'] . "</h2>";
	
		echo"<a href='inc/select_sport.php?sid=". $row['sid']."'><img src='img/". $row['sport']. ".png' width='60px' height='60px' />";
echo"<div class='innerSpark' >";
	
echo "</div></div>";
		echo	"</div>";
}
		}
}


?>
