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
