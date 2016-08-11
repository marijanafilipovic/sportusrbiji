
<?php session_start();
include_once '../conn.php';

function isUnique($email){
    $query = "SELECT * FROM users WHERE uemail = '{$email}'";
    global $conn;
   $result = $conn->prepare($query);
   $result->bindParam(':uemail', $email);
   $result->execute();
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
    echo "<p style='color:red;'>Korisnicko ime nemoze biti manje od 3 karaktera!</p> ";
 }
  if(strlen($_POST['password'])<5){
     echo "<p style='color:red;'>Lozinka mora imati min 5 karaktera!</p>";
       exit();
 }
 elseif(checkName($_POST['username'])){
     echo "<p style='color:red;'>Korisnicko ime je zauzetno.</p>";
 }
 
 
if($_POST['password'] != $_POST['password2']){
          echo "<p style='color:red;'>Lozinka se mora potvrditi identicnim unosom prve.</p>";
 }elseif(isUnique($_POST['email'])){
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
?>

<div class="SignUpform">
    <h1>Vasi podaci za registraciju</h1>
    <?php if(isset($_GET['err'])){ ?>
<h2 style="color:red;"><?php echo $_GET['err'];?></h2>
<?php } ?>
<form action="" method="POST">
    <p>Korisnicko ime*:</p><br>
    <input type="text" name="username" placeholder="Pe..."/><br>
    <p>Lozinka*:</p>
    <input type="password" name="password" placeholder="Loz" /><br><br>
      <p>Potvrdi lozinku*:</p>
    <input type="password" name="password2" placeholder="Loz" /><br><br>
        <p>Prvo ime*:</p><br>
    <input type="text" name="fname" placeholder="Pe..."/><br>
     <p>Prezime*:</p><br>
    <input type="text" name="lname" placeholder="Pe..."/><br>
     <p>Email*:</p><br>
    <input type="text" name="email" placeholder="xxx@ooo.yyy"/>
     <p>Email potvrdi*:</p><br>
    <input type="text" name="email2" placeholder="xxx@ooo.yyy"/>
    
    <input type="submit" value="Register" name="register"  />
</form>
</div>
