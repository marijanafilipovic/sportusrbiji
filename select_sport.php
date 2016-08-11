<?php  session_start();
error_reporting(3);
include_once '../conn.php';
global $conn;?>
<?php include_once '../head.html'; ?>
<body>
<div id="wrapper">
<div id="head">
</div><!--head-->
<div class="header">
</div><!--header-->        	
		 <div class="pretraga">	
		<div class="login">

<?php include_once '../is_loged.php'; ?>
<?php include_once '../pozdrav.php'?>
		<div class="links">
<?php include_once 'links.php' ?>
		</div><!-- end links -->
	<div id="pretragainner">
<?php include_once 'log.php';

 
?>

	<div class="search2">	
	<p style="color:white;">
	<?php 
$sports= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM sportovi WHERE sid = $sports";		
		$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$sport=$r['sport'];		
 }
echo "<img src='../img/". $sport .".png' style='width:40px' 'height:40px' /><br />";	
 echo  $sport ;
 }
?> </p>		
<?php include_once 'search_sport.html';
if(isset($_POST['selPost'])){
  $table = $_POST['selPost'];
 		   }
?>
</div><!-- end search2 -->

</div><!-- end pretraga inner -->
			<div class="login">
			<?php include_once 'time.php'; ?>
			</div>
</div><!-- end pretraga -->
<div class="login">
		
		
		
		<?
$sports= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM vrsta_sporta WHERE sid = $sports";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$vrsta=$r['vrsta'];
				
		
			echo"<div class='login' style='float:left; padding-right:10px;  border-right:1px solid #1E7096;'>";
		
		
			echo"<div  style='float:left; padding:10px;'>";
			
			/*$vrsta=upcfirst($r['vrsta']); */
		
	
			echo "<p style='color:#1E7096'>".$r['vrsta']."</p>";
			echo"</div>";echo"</div>";
		}
		}else{
			echo $sport ." nema pod kategorije.";
		}



 if(isset($_POST['insert'])){
$vrsta_sporta=$_POST['vrsta_sporta'];
 
		  mysqli_query($conn,"INSERT INTO vrsta_sporta(vid,sid,vrsta) VALUES (null, $sports, $vrsta_sporta");
          $new_vid=mysqli_insert_id($conn);
 }
 ?>
</div>

	<div id="innerOutdoor" >


	
	</div>
	<div class="innerOutdoor">
			<div class="login" style="margin:0 auto; " >
			<p style="color:black">Vesti - Aktuelnosti <?php echo $sport; ?></p>
			</div>
		<div class="categories">
		<?php include_once 'sel_sport_news.php'; ?>	
		</div><!-- end categories -->
	</div><!-- end inner -->
	<div class="innerOutdoor">
			<div class="login">
			<p style="color:black">Info o klubovima - javnim igralistima </p>
			</div>
		<div class="categories">	
<?php include_once 'sel_sport_info.php'; ?>	
		 </div><!-- end categories -->
		</div><!-- end inner -->
	</div></div></div>
	
	<div id="footer">
	<div class="banner">
	</div>
              <p>Pored ove javne kategorizacije otvoren je forum za sve ljubitelje sporta.</p>
        </div><!-- end innerHigher -->
</body>
</html>