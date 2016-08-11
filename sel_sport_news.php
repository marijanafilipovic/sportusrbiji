<?php
/*
$aktivObjava= 1; //public admin
$aktivObjava= 0; //neobjavljen post
$aktivObjava = 3; // neobjavljen User post
$aktivObjava= 4; //aktivan User post
=====================================
$statusRoll = 1; //za administrator
$statusRoll= 2; //za registrovan korisnik >>> postavlja svoj avatar, komentar 
$statusRoll= 3; // napredni korisnik >>> ukoliko popuni anketu moze da objavljuje postove
$statusRoll= 4; 
*/
?>
<?
 if($_SESSION['status'] == 1){
		$aktiv= 0;
}else{
		$aktiv = 1;
}

		$sport= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM vesti  WHERE sid = $sport AND active >=$aktiv";
	// >>>>>>>>>>>>>>>>>>>>>>>>>URADITI JOIN tabele vesti i tabele info	
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)<=15)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$id=$r['id'];
				echo "<div id='vrsta'>";
		
			echo"<a href='select_news.php?id=". $r['id']."' style='color:#1E7096'><div class='innerVest' style='color:#1E7096'>";
			echo"<p style='color:#1E7096; width:200px'>" . $r['title'] . "</p>";
			
			echo "<p style='color:#1E7096'>".$r['uvod']."</p>";
			
			echo "<p style='color:#1E7096'>" . $r['time_added'] . "</p>";
			echo"Pogledaj vest<a/>";

		
			
echo"<a href='select_news.php?id=". $r['id']."' style='color:#1E7096'>Vidi komentare<a/>";	
  
		
echo "</div>";

		echo	"</div>";}
		}else{
			echo "Nema rezultata pretrage.";
		}





?>