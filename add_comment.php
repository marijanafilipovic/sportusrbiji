<?php session_start();?>
<?php
include_once '../conn.php';
global $conn;

 $uid = ($_SESSION['uid']);
$sport=" ";


echo $uid;


?>
<form method="POST" action="">
    
 <input type="text"  name="com" cols="30" rows="13" placeholder="Ovde mozete postaviti Vas komentar..." />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="prokomentarisi" value="Prokomentarisi <?php echo $_SESSION['uname']; ?>"/><br />


<?php

if(isset($_POST['prokomentarisi'])){
 
             $sport= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
             $coment=($_POST['com']);
             $id_vest= isset($_GET['id'])&& is_numeric($_GET['id'])?$_GET['id']:1;

 mysqli_query($conn,"INSERT INTO comments(id_comment,id_user,id_sport,id_vest,text) VALUES (null,'{$uid}','{$sport}','{$id_vest}','{$coment}')");
          $new_id=mysqli_insert_id($conn);
}
?>
</form>
