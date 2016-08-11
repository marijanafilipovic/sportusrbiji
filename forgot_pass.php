<?php session_start(); ?>
<?php include_once '../conn.php';


?>

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
          
      <!-- end nav -->

			<div class="pretraga">
		 <div class="login">
<?php include_once 'start_buttons.php';
 echo "<p>
	 <a href='../index.php'>Pocetna strana</a>";
?>
</div>
		
								<div id="pretragainner">
									<form action="" method="POST">
	<label>Vasa mail adresa:</label>
    <input type="email" name="email" placeholder="xxxx@service.com" class="novalozinka"/>
			
            <button type="submit" name="send">Promena lozinke</button>
            <button type="submit" name="no_send">Odustajem</button>
			</form>
            <div class="search2">
				</div><!-- end search2 -->
<!--   //echo "<p>Dobrodosli na Vas nalog" . $_SESSION['username'] . "</p>" -->
						
<?php

		if((isset($_POST['send']))&&(!empty($_POST['email']))){
		$email=($_POST['email']);
		if(isRegister($email));}
		
		
 function isRegister($email){
  $query = "SELECT * FROM users WHERE uemail = '{$email}'";
    global $conn;
   $result = $conn->query($query);

if($result->num_rows > 0){
require '../PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'marijana.beograd@gmail.com';          // SMTP username
$mail->Password = 'underthebridge'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('marijana.beograd@gmail.com', 'MarFiArtFit');
$mail->addReplyTo('marijana.beograd@gmail.com', 'MarFiArtFit');
$mail->addAddress($email);   // Add a recipient


$mail->isHTML(true);  // Set email format to HTML




$mail->Subject = 'Poruka od Sport u Srbiji';
$mail->Body='Zdravo, ovaj mail je poslat na vas zahtev. <br/> IDite na link ispod da bi postavili novu lozinku<br/>http://localhost/ssss/1/inc/newPass.php?email='. $email;
     echo "Proverite vasu elektronsku postu. Kliknite na link iz poruke da bi promenili lozinku..";
if(!$mail->send()) {		
     echo "Doslo je greske";

}}}

?>
						



			</div><!-- end pretraga inner -->
	

</div><!-- end pretraga -->
<div id="contentright">

  <div id="inner">

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
</body>
</html>