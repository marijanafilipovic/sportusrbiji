<?php  session_start();
error_reporting(3);
include_once '../conn.php';
global $conn;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SerbianSportSpot</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../style.css" rel="stylesheet" type="text/css"/>
<link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Slabo+27px&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Jura:400,500&subset=latin-ext,cyrillic,latin' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="wrapper">
<div id="head">
</div><!--head-->
<div class="header">
</div><!--header-->
          
			
					
		
		
		 <div class="pretraga">
			
			 <div class="login">

		 <?php if(!isset($_SESSION['uname'])){
	
	echo"<div class='totheleft'>";
	include_once 'start_buttons.php'; 
echo"</div>";
		 
}else{
	   echo "<div class='buttonCenter'>
	   <p><h3 style='color:#D9E598;'>Zdravo ".$_SESSION['uname']." </h3></p>
    <a href='sport.php'><p id='button'>Objavi vest</p></a>
    <a href='user_account.php'><p id='button'>Tvoj nalog</p></a>
    <a href='logout_user.php'><p id='button'>Izloguj se</p></a>
	<a href='../index.php'> <p id='button' style='folat:left' style='color:black'>Pocetak &#8617;</a></p>
	
    </div>";
	
 
}
?>

		 </div>

								<div id="pretragainner">
		 	<?php
			if(!isset($_SESSION['uid'])){
		  if(isset($_POST['login']))
		 {
include '../login.php';}}
?>

				<?php
	if(!isset($_SESSION['uid'])){		
if(isset($_POST['register'])){
	include_once 'register_form.php';
	include_once 'registration_script.php';}
}?>


			<div class="search2">
<h2><?php
$sports= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM sportovi WHERE sid = $sports";
		
		$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$sport=$r['sport'];
				
 }
 echo  $sport ;
 }
 ?>



u Srbiji</h2>
		

			
<form action="" method="GET">
<input type="text" name="kriterijum" placeholder="Unesi kljucne reci..." class="search"><hr>
<button type="submit" name="submit" class="button" ><img src="../img/magnifyingglass.png" width="25px" height="25px" /></button>                         
			
<select name="selPost" value="selPost" method="POST">

<option   class="rounded" value="vesti">Vesti</option>
<option    class="rounded" value="info">Klubovi</option>
<option   class="rounded" value="literatura">Literatura</option></select>


				  </form>						
</div><!-- end search2 -->			


			</div><!-- end pretraga inner -->
			<?php
  echo "<p>Datum " . date("d/m/Y/") . " &nbsp;&nbsp;Vreme &nbsp;" . date("h:i:sa")."</p>"; ?>
		

	


</div><!-- end pretraga -->
</div>
<div id="contentright">
	<div class="account">
			 <a href="" class="hide"><strong>Sakrij vesti</strong></a>
         <a href="" class="show"><strong>Prikazi vesti</strong></a>
  <div id="list">
	<?php
	$sql = "SELECT * FROM vesti BY DESC";
$result = $conn->query($sql);


if ($result->num_rows > 0) 
	
		{
			while($r = mysqli_fetch_assoc($result))
			{
		
			echo "<a href='full_text.php?id=". $r['id']."'><h4 class='titleVest'>" . $r['title'] . "</h4></a>";
			
			}
		}
			
		?>
	
	
	
  </div>
  
	</div>
  <div id="inner">

	<div class="categories">

		
<?php

		$sport= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM vesti WHERE sid = $sport";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)<=15)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$id=$r['id'];
				echo "<div id='vrsta'>";
		
			echo"<div class='innerVest'>";
			echo"<h3 class='testInner'>" . $r['title'] . "</h3>";
			
			echo "<p class='testInner'>".$r['uvod']."</p>";
			
			echo "<p class='testInner'>" . $r['time_added'] . "</p>";
			echo"<a href='select_news.php?id=". $r['id']."'>Vidi celu vest<a/>";

	
  
		
echo "</div>";

		echo	"</div>";}
		}else{
			echo "Nema rezultata pretrage.";
		}





?>
	
</div><!-- end categories -->

	
   
             </div><!-- end inner -->
	
</div>
</div>
</div>
  
   	<div id="footer">

	   <div class="banner">
		
   </div>
              <p>Pored ove javne kategorizacije otvoren je forum za sve ljubitelje sporta.</p>
        </div><!-- end innerHigher -->
</body>
</html>