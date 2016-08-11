<?php  session_start();
error_reporting(3);
include_once 'conn.php';
global $conn;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SerbianSportSpot</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css"/>
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
	include_once 'inc/start_buttons.php'; 
echo"</div>";
		 
}else{
	   echo "<div class='buttonCenter'>
	 
    <a href='inc/sport.php'><p id='button'>Objavi vest</p></a>
    <a href='inc/user_account.php'><p id='button'>Tvoj nalog</p></a>
    <a href='inc/logout_user.php'><p id='button'>Izloguj se</p></a>
	  <p style='color:white;'><b>Zdravo :-) ".$_SESSION['uname']."</b> </p>
    </div>";
	
 
}
?>
			<div class="links">	
<a href="index.php"><p class="forum">Pocetna</p></a>
<a href=""><p class="forum">Oglasi</p></a>
<a href=""><p class="forum">Ishrana</p></a>



</div>	 
</div>
  <div id="pretragainner" >
			
		 	<?php
			if(!isset($_SESSION['uid'])){
		  if(isset($_POST['login']))
		 {
include 'login.php';}}
?>

				<?php
	if(!isset($_SESSION['uid'])){		
if(isset($_POST['register'])){
	
	include_once 'inc/registration_script.php';
	}
}?>
<div class="search2" >
<?php include_once 'search_sport.html';?>

				  </form>						
</div><!-- end search2 -->

<div><p style="color:#D1FFFF;">Sta je sport? Sport u Srbiji:<br/> "Svaka aktivnost koja razvija telo." </p></div>
</div><!-- end pretraga inner -->

<div class="login">
			<?php echo "<p >Datum " . date("d.m.Y.") . " &nbsp;&nbsp;Vreme &nbsp;" . date("h:i:s")."</p>"; ?>
</div>
</div><!-- end pretraga -->


</div>
<div id="contentright">
	   		 <?php
 	 
function vest_count(){
    global $conn;
    $query ="SELECT vid FROM vesti";
    if($result=mysqli_query($conn, $query)){
	   $rowcount=mysqli_num_rows($result);
	   echo $rowcount;
	   mysqli_free_result($result);
	}
}


	 ?>
<?php include_once 'mini_news.php'; ?>
<p>informarije o sportskim centrima</p>
<p>gde se nalaze sale</p>
<p>gde se nalaze teretane</p>
<p>gde se tereni na otvorenom</p>
<p>gde se nalaze</p>
<p>gde se statiodi</p>
<p>gde se nalaze klubovi</p>
<p>gde se nalaze</p>
<p>gde se nalaze</p>
<p>gde se nalaze</p>
<p>gde se nalaze</p>
<p>gde se nalaze</p>
<p>gde se nalaze</p>
  </div>

	

 
	 <div id="innerMid" style="width:450px; ">
	       <h2 style="color:#B8ED9D; border-bottom: 5px solid #B8ED9D;">O nama</h2>
	       <p class="inner" style="color:#E2EF9E; padding:10px; border-bottom: 5px solid #B8ED9D;"> Sport u Srbiji je aplikacija kreirana sa ciljom da objedini sve vrste rekareativnih  aktivnosti kako i profesionalnih sportova, kako bi inspirisala i osnazila orijentaciju osoba u pozitivnom i zdravom smeru.</p>
	      		<h2 style="color:#B8ED9D; border-bottom: 5px solid #B8ED9D; padding:5px;">Opcije za clanove</h2>
 
	        <p class="inner" style="color:#E2EF9E; padding:15px; border-bottom: 5px solid #B8ED9D;">
	       Svi registrovani korisnici na ovoj aplikaciji mogu pisati svoja vidjena, iskustva i impresije a vezano za odredjene sportsko rekreativne aktivnosti,<br>
	       koje nazivamo sportom. <br>Porebno je samo uputiti zahtev za Blogovanje.<br>
	       Svi registrovani korisnici imaju svoj korisnicki panel pregled naloga.. Statiska se ukljucuje ukoliko clan objavljuje postove ili komentare. 
	       </p>
	       
	       <p class="inner" style="color:#E2EF9E; padding:15px; border-bottom: 5px solid #B8ED9D;"> Sport u Srbiji je aplikacija kreirana u svrhu objedinjenja svih vrsta rekareativnih  aktivnosti kako i profesionalnih sportova.<br><hr></p>

	       
</div>
  <div id="inner" style="padding-left:15px;" >

	<div class="categories" style="width:600px;" >

	<?php include_once 'select.php';?>	
</div>

</div><!-- end inner -->
 


   	<div id="footer">

	   <div class="banner">
		
   </div>
              <p>Pored ove javne kategorizacije otvoren je forum za sve ljubitelje sporta.</p>
        </div><!-- end innerHigher -->
</body>
</html>