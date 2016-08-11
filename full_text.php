<?php  session_start();
error_reporting(3);
include_once '../conn.php';
global $conn;
?>
<?php
 
	
		
	
 
	 if(isset($_GET['id'])){
    $id_objave =(int)$_GET['id'];
    } 
	
	
        $q = mysqli_query($conn, "SELECT * FROM vesti WHERE id =$id_objave ");
 
	while($r = mysqli_fetch_assoc($row)){
   
				
				echo "<div id='vrsta'>";
		
			echo"<div class='innerVest'>";
				 
			echo"<h3 class='testInner'>" . $r['title'] . "</h3>";
				echo "<p>".$r['time_added']."</p>";
			echo "<p class='testInner'>".$r['uvod']."</p>";
			
		
			echo "<p>".$r['text']."</p>";
echo "</div>";
		echo	"</div>";}
		




?>