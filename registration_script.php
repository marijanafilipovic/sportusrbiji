<?php session_start(); ?>

<html>
<div class="SignUpform">
    <h1>Vasi podaci za registraciju</h1>
    <?php if(isset($_GET['err'])){ ?>
<h2 style="color:red;"><?php echo $_GET['err'];?></h2>
<?php } ?>
<form action="" method="POST">
    <h4>Trenunto ima ukupno <? count_users();?> registrovanih korisnika.</h4>
    <p >Korisnicko ime*:</p>
    <input type="text" name="username" placeholder="<?php echo @$_SESSION['username']; ?>" style="margin-left:100px;"/><br />
    <p>Lozinka*:</p>
    <input type="password" name="password" placeholder="<?php echo  @$_SESSION['password']; ?>" style="margin-left:100px;"/><br />
      <p>Potvrdi lozinku*:</p>
    <input type="password" name="password2" placeholder="<?php echo  @$_SESSION['password2']; ?>" style="margin-left:100px;"/><br />
        <p>Prvo ime*:</p>
    <input type="text" name="fname" placeholder="<?php echo  @$_SESSION['fname']; ?>" style="margin-left:100px;"/><br>
     <p>Prezime*:</p>
    <input type="text" name="lname" placeholder="<?php echo  @$_SESSION['lname']; ?>" style="margin-left:100px;"/><br>
     <p>Email*:</p>
    <input type="text" name="email" placeholder="<?php echo   @$_SESSION['email']; ?>" style="margin-left:100px;"/><br />
     <p>Email potvrdi*:</p>
    <input type="text" name="email2" placeholder=" <?php echo  @$_SESSION['email2']; ?> " style="margin-left:100px;"/><br /><br />
    
    <input type="submit" value="Posalji" name="register" style="margin-left:100px; margin-bottom:20px;" /><br />
</form>
</div>
</html>
<?php 


?>
<?php
function isExist($email){
    $query = "SELECT * FROM users WHERE uemail = '{$email}'";
    global $conn;
   $result = $conn->query($query);
if($result->num_rows > 0){
    return true;
}else return false;
}
function checkName($username){
    $query = "SELECT * FROM users WHERE uname = '{$username}'";
    global $conn;
   $result = $conn->query($query);
if($result->num_rows > 0){
    return true;
}else return false;
}
?>
<?php
if(isset($_POST['register'])){
    $_SESSION['username']=$_POST['username'];
     $_SESSION['fname']=$_POST['fname'];
      $_SESSION['lname']=$_POST['lname'];
       $_SESSION['email']=$_POST['email'];
       $_SESSION['email2']=$_POST['email2'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['password2']=$_POST['password'];
 if(strlen($_POST['username'])<3){
       echo "<p style='color:red;'>Korisnicko ime nemoze biti manje od 3 karaktera!</p><hr> ";
      
 }
  if(strlen($_POST['password'])<5){
       echo "<p style='color:red;'>Lozinka mora imati min 5 karaktera!</p><hr>";
       exit();
  }
 elseif(checkName($_POST['username'])){
    echo "<p style='color:red;'>Korisnicko ime je zauzetno.</p><hr>";

 }
 
 
if($_POST['password'] != $_POST['password2']){
   echo "<p style='color:red;'>Lozinka se mora potvrditi identicnim unosom prve.</p><hr>";
           
 }elseif(isExist($_POST['email'])){
    
   echo "<p style='color:red;'>Email je vec registrovan.</p>";
          
 }
 else{
    $username=mysqli_real_escape_string($conn, $_POST['username']);
     $lname=mysqli_real_escape_string($conn, $_POST['lname']);
      $fname=mysqli_real_escape_string($conn, $_POST['fname']);
      $email=mysqli_real_escape_string($conn, $_POST['email']);
        $pass=mysqli_real_escape_string($conn, $_POST['password']);
          $token=bin2hex(openssl_random_pseudo_bytes(32));
          
          $query = "INSERT INTO users( uname, uemail, lastname, fname, password, active_code)VALUES('{$username}', '{$email}', '{$lname}', '{$fname}', '{$pass}', '{$token}')";


$conn->query($query);
echo "<p style='color:red;'>Cestitamo! Postali ste registrovan korisnik..</p><hr>";
 header('Location: '.$_SERVER['HTTP_REFERER']);  
            exit();

 }

}

function count_users(){
     $query = "SELECT uname FROM users";
    global $conn;
   $result = $conn->query($query);
if($result->num_rows > 0){
   	   $rowcount=mysqli_num_rows($result);
	   echo $rowcount;

}
}
?>
