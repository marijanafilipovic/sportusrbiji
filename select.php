<?php
include_once 'conn.php';
global $conn;
if(isset($_GET['kriterijum'])){
	
	$kriterijum =($_GET['kriterijum']);

	if(!empty($kriterijum)){
		if(isset($_POST['selPost'])){
	$table=($_POST['selPost']);

}
		$query = "SELECT * FROM $table WHERE key_words LIKE '%$kriterijum%'";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			
			while($r = mysqli_fetch_assoc($result))
			{
				
		
				
				
				echo "<div id='vrsta'>";
		
			echo"<div class='innerPopular'>";
			echo"<h2>" . $r['title'] . "</h2>";
	
	
		echo"<a href='inc/select_all_vesti.php?sid=". $r['sid']."'><img src='img/". $r['sport']. ".png' />";
echo "</div>";
		echo	"</div>";}
		}
	



}


}



?>
