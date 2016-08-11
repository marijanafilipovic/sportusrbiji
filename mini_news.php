	<div class="account"  style="background: none;">
			 <a href="" class="hide"><strong>Sakrij vesti<? vest_count();?></strong></a>
         <a href="" class="show"><strong>Prikazi vesti</strong></a>
  <div id="list">
	<?php
	 
    
	$sql = "SELECT * FROM vesti WHERE active = 1 ORDER BY id DESC LIMIT 15";
$result = $conn->query($sql);
if ($result->num_rows>0) 
		{
			while($r = mysqli_fetch_assoc($result))
			{
					  $id_vesti=$r['id'];
			echo "<h4 class='titleVest'><a href='inc/select_news.php?id=" . $id_vesti. "'>" . $r['title'] . "</h4>";
		
			}
		}

		?>

		 
  </div> 