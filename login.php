<?php 
include_once 'conn.php';

// ---------LOG IN FORMA-----

    echo" 
<div class='loginform'>
<form action='' method='POST'>
    <p>Name:</p><br>
    <input type='text' name='username' placeholder='Pe...'/><br>
    <p>Password:</p>
    <input type='password' name='password' placeholder='Loz' /><br><br>
    <input type='submit' name='login' value='login'  /><a href='inc/forgot_pass.php'>Zaboravljena lozinka</a>
</form>
</div>
";


?>

<?php
if(isset($_POST['login'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        $error = "Morate uneti korisncko ime i lozinku.";
    }else
{ 
$username = $_POST['username'];
$password= $_POST['password'];

$usename =stripslashes($username);
$password=stripslashes($password);
$username=mysqli_real_escape_string($conn, $username);
$password=mysqli_real_escape_string($conn, $password);


$sql = "SELECT * FROM users WHERE uname='$username' AND password='$password'";
$res = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);


if (mysqli_num_rows($res) == 1){
     
 $_SESSION['uid'] = $row['uid'];
 $_SESSION['uname'] = $row['uname'];
  $_SESSION['fname'] = $row['fname'];
   $_SESSION['lname'] = $row['lname'];
 $_SESSION['email'] = $row['uemail'];
 $_SESSION['status'] = $row['status'];
 if(!empty($row['img'])){
$_SESSION['img']= $row['img'];

}
 header('Location: '.$_SERVER['HTTP_REFERER']);  
 exit();
   
   

    }else{
    
  echo "<p style='color:red';>Pogresni podaci. </p>";
  exit();
    }
}
}
?>