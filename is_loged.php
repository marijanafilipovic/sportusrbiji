		 <?php if(!isset($_SESSION['uname'])){
	
	echo"<div class='totheleft'>";
  ?>   <div id="button" style="float:left">
   <a href='../index.php'> <p>Pocetak &#8617;</p></a>
</div>
    <?php
	include_once 'start_buttons.php';


echo"</div>";
		 
}else{
	   echo "<div class='buttonCenter'>
	
    <a href='sport.php'><p id='button'>Objavi vest</p></a>
    <a href='user_account.php'><p id='button'>Tvoj nalog</p></a>
    <a href='logout_user.php'><p id='button'>Izloguj se</p></a>
	<a href='../index.php'> <p id='button' style='folat:left' style='color:black'>Pocetak &#8617;</a></p>
	
    </div>";

 
}
?>