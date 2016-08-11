<?php
include_once '../conn.php';
    global $conn;  
$uemail=isset($_GET['email'])?$_GET['email']:"";
    
   ?>
     
     <?php
   $q="SELECT uid, uname, uemail, password FROM users WHERE uemail='{$uemail}'";

   $res = mysqli_query($conn, $q);
if(mysqli_num_rows($res) > 0){
 while($r = mysqli_fetch_assoc($res)){

  $uid=  $r['uid'];
  $pass=$r['password'];
  $uname=$r['uname'];
    echo "<h1>Dobrodosli nazad " . $uname."</h1>";
     }
}
   
?>
  <form action="" method="POST">
  <p> Nova lozinka:</p><br/>
  <input type="text" name="new1"/>
  <br/> <p>Ponovi lozinku: </p>
  <input type="text" name="new2"/>
  <input type="submit" name="submit" value="Postavi"/>
  <?
  if(isset($_POST['submit'])){
        if($_POST['new1'] == $_POST['new2']){
         $newPass=$_POST['new1'];
         $q = mysqli_query($conn, "UPDATE users SET password= '{$newPass}'  WHERE uid='{$uid}'");
         echo "Lozinka je uspesno promenjena." .$newPass;
         
        }else{
     header("Location: ../index.php");
        }
    }

 
?>
