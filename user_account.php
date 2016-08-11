<?php session_start();
include_once '../head.html';
?>
<?php include_once '../conn.php';


?>


          
		
					
		
		
		 

			 <div class="login">
	 <?php if(!isset($_SESSION['uname'])){
	
	echo"<div class='totheleft'>";
	include_once 'start_buttons.php'; 
echo"</div>";
		 
}else{
	
	   echo "<div class='buttonCenter'><p><h3 style='color:#D9E598;'>Zdravo ".$_SESSION['uname']." </h3></p>
    <a href='../inc/sport.php'><p id='button'>Objavi post</p></a></p>
    <a href='../index.php'><p id='button'>Pocetna strana</p></a>
    <a href='../inc/logout_user.php'><p id='button'>Izloguj se</p></a>
    </div>";
	
 
}
?>
		
		 </div>

	<div class="pretraga" style="background-color:rgba(86,86,67,0.30)">		 			 



			
			
			<?php
  echo "<p>Datum " . date("d/m/Y/") . " &nbsp;&nbsp;Vreme &nbsp;" . date("h:i:sa")."</p>"; ?>
		

	


<div id="contentright">

  <div id="inner">

<div class="podaci">
	
	
	
	

	<div id="innerAccount" style="background-color:#DDE99B">e-mail<br />
<?php

	echo $_SESSION['email'];
	?>
	
	</div>
	
	
		
<div id="innerAccount" style="background-color:#DDE99B">Ime<br />
<?php echo $_SESSION['fname'];?>
</div>


<div id="innerAccount" style="background-color:#DDE99B">Prezime <br/>
<?php	echo $_SESSION['lname'];?></div>
	
<div id="innerAccount"  style="background-color:#DDE99B;">Korisnicko ime<br />
<?php echo $_SESSION['uname']; ?>
</div>



<div id="innerAccount" style="background-color:#DDE99B">Slika
Avatar: jpg.

<?php
  
if(isset($_SESSION['img'])){
    echo " <img class='grow' src='uploadimg/" .$_SESSION['img']. "' style='width:100px; height:100px;'/>";
}
include_once "upload.php";
?>
</div><br>
<div id="innerAccount" style="background-color:#DDE99B; height: 300px;">Moji komentari<br>
<?php
$q= "SELECT * FROM comments WHERE id_user = '{$_SESSION['uid']}' ORDER BY id_comment  DESC ";
$result = mysqli_query($conn, $q);
		
		if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{	
			echo "<p style='color:black';>".$r['text']."</p>";
			
			
			}
		}
?></div><br />
<div id="innerAccount" style="background-color:#DDE99B">Moji oglasi<br><p>


</div></p>
	<div class="categories">

	
	
</div><!-- end categories -->


             </div><!-- end inner -->
			
</div>
</div>
</div>
  
   	<div id="footer">


	   <div class="banner">
	
   </div>
              <p>Mesto poziva Funkcije za status o ukupno postavljenim postovima ili PoslednjiPost --datum-vreme--.</p>
        </div><!-- end innerHigher -->

</div><!-- end pretraga -->



</div>
</body>
</html>