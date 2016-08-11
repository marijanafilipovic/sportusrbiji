<?php session_start();
error_reporting(0);
include_once '../conn.php';
include_once '../head.html';
?>
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
<a href="onama.php"><p class="forum">O nama</p></a>
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
<?php // include_once 'search_sport.html';?>

				  </form>						
</div><!-- end search2 -->
<div>
	
	
<?php
				if(isset($_SESSION['uid'])){
			include 'add_comment.php';
				}
?>
	
	
	
	
	<p style="color:#D1FFFF;">Sta je sport? Sport u Srbiji:<br/> "Svaka aktivnost koja razvija telo." </p></div>
</div><!-- end pretraga inner -->


	
<?php

//$link=get_permalink();

		$sel_id= isset($_GET['id'])&& is_numeric($_GET['id'])?$_GET['id']:1;
		$query ="SELECT * FROM vesti WHERE id = $sel_id";
		
		$result = mysqli_query($conn, $query);
		
		if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{echo "<div id='vrsta'>";
		
			//echo"<div class='innerVest'>";
			echo"<h3>" . $r['title'] . "</h3>";
			
			echo "<p>".$r['text']."</p>";
	
			//echo "</div>";
				
			
			
			
		
echo "</div>";

		echo	"</div>";}
		}
?><div class="login"><iframe src="https://docs.google.com/forms/d/1zAUFlTko7-V6ymC8hFvV3Z3cDjsIZOwdUKirNuEnZC8/viewform?embedded=true" width="600" height="250" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
			<?php echo "<p >Datum " . date("d.m.Y.") . " &nbsp;&nbsp;Vreme &nbsp;" . date("h:i:s")."</p>"; ?>
</div>
</div><!-- end pretraga -->
