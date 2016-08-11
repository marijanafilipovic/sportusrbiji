<?php
session_start();

		$quoter=time() - (24*60*60);
		$quo=date('Y-m-d h:i:s', $quoter);
		$now=date('Y-m-d h:i:s');
	
if ($quo < $now) {
    echo '$quo is less than $now.';

} else {
    echo '$d1 is greater than $d2.';
}
?>

<div id="pretragainner" style="float:left; width:500px;">
			<div class="search2">
<h2>Sportoteka</h2>





				  <form action="" method="GET">
                    <input type="text" name="pojam" placeholder="Pojam za pretragu..." class="search"><hr>
                 
					                      

<select name="selPost" value="selPost" method="POST">

<option   class="rounded" value="vesti">Vesti</option>
<option    class="rounded" value="info">Klubovi</option>
<option   class="rounded" value="legende">Legende</option></select>


<select name="selTime" value="selTime" method="POST">

<option   class="rounded" value="day">pre 24h </option>
<option    class="rounded" value="3day">3 dana </option>
<option   class="rounded" value="week">pre 7 dana </option>
</select>
<button type="submit" name="submit" class="button">Pretrazi</button>     
				  </form>

<?php
if(isset($_GET['pojam'])){
			$thing=trim($_GET['pojam']);
}

if(isset($_GET['selPost'])){
			$table=($_GET['selPost']);
}

/*
if(isset($_POST['qouter'])){
			echo $quo;
		$day=time() - (24*60*60);
		$quo=date('Y-m-d h:i:s', $quoter);
		$now=date('Y-m-d h:i:s');
		$search="SELECT * FROM $table WHERE
    time_added date('Y-m-d h:i:s')>$quoter";
	
	
if ($quo < $now) {
    echo '$quo is less than $now.';

} else {
    echo '$d1 is greater than $d2.';
}

	
	
$sea = mysqli_query($conn, $search);
		
		if(mysqli_num_rows($sea)>0)
		{
			while($s = mysqli_fetch_assoc($sea))
			{
		echo "<div id='vrsta'>";
		
			echo"<div class='innerVest'>";
			echo"<h3 class='testInner'>" . $s['title'] . "</h3>";
			
			echo "<p class='testInner'>".$s['uvod']."</p>";
			
			echo "<p class='testInner'>" . $s['time_added'] . "</p>";
			echo"<strong><a href=''> <p class='testInner'>Vidi celu vest</p></a></strong>";
	
  
echo "</div>";
		echo	"</div>";
}
}}



$lastWeek = time() - (7 * 24 * 60 * 60);



$last24h= time() - (24*60*60);

$lastDay=date('Y-m-d h:i:s', $last24h);

*/
	


$search="SELECT * FROM $table WHERE title LIKE '%$thing%'";
$sea = mysqli_query($conn, $search);
		
		if(mysqli_num_rows($sea)>0)
		{
			while($s = mysqli_fetch_assoc($sea))
			{
		echo "<div id='vrsta'>";
		
			echo"<div class='innerVest'>";
			echo"<h3 class='testInner'>" . $s['title'] . "</h3>";
			
			echo "<p class='testInner'>".$s['uvod']."</p>";
			
			echo "<p class='testInner'>" . $s['time_added'] . "</p>";
			
			if(isset($_SESSION['uid'])){
						
			}
			echo"<strong><a href=''> <p class='testInner'>Vidi celu vest</p></a></strong>";
	
  
echo "</div>";
		echo	"</div>";}
		}

 ?>
			<script type="mustache/x-templ"></script>
			<li>results</li>
  </ul>
  
  
				  </form>

			
?>
</div><!-- end search2 -->

			</div><!-- end pretraga inner -->
			