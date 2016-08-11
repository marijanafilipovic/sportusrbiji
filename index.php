<?php
require_once("conn.php");
if(!isset($_POST['login'])){
    ?><div class="loginform">
<form action="log_in.php" method="POST">
    <p>Name:</p><br>
    <input type="text" name="name" placeholder="Pe..."/><br>
    <p>Password:</p>
    <input type="password" name="password" placeholder="Loz" /><br><br>
    <input type="submit" value="Login"  />
</form>
</div>
<?php
}
$username=$_POST['username'];
$password=$_POST['password'];
$first_name =$_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];

$exists = 0;
$result = $conn->query("SELECT username from admin_users WHERE username='{$username}' LIMIT 1");
if ($result->num_rows ==1){
    $exists = 1;
    $result = $conn->query("SELECT email FROM admin_users WHERE email='{$email}' LIMIT 1");
    if($result->num_rows == 1) $exists =3;
}

if($exists == 1) echo "<p>Username vec postoji!</p>";
else if ($exists == 2) echo "<p>Username i email vec postoje!</p>";
else if ($exists == 3) echo "<p>Email je vec registrovan!</p>";
else{
    $sql ="INSERT INTO `admin_users`(`id`,`username`,`password`,`fisrt_name`,`lasr_name`,`email`)
    VALUES(NULL, '{$username}','{$password}','{$fisrt_name}','{$last_name}','{$email}')";
if($conn->query($sql)){
    echo"<p>Registracija uspesna!</p>";
}else{
    echo"ERORR";
    exit();
}


}









