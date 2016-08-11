<?php
include_once"../conn.php";
include_once"../head.html";
global $conn;
//>>>>>>>>GET ALL USERS<<<<<<<<<<<<<<<<<<
 echo "<tr><td>Korisnicko ime:</td><td>Prezime</td> <td>EMAIL</td><td>Status</td></tr><hr>";
 $q = mysqli_query($conn, "SELECT * FROM users");
  while($row=mysqli_fetch_object($q)){
           $uname=$row->uname;
           $uid=$row->uid;
           $uemail=$row->uemail;
           $status=$row->status;
           echo "<div class='innerVest' style='height:180px; width:550px;'><a href='admin_update.php?uid=$uid&uname=$uname&uemail=$uemail&status=$status'>";
            echo "<img src='uploadimg/". $uid .".jpg' style='width:80px' 'height:80px' /><br>";
            echo "<p style='border-bottom: 1px dashed grey; padding:5px;'>Korisnicko ime: " . $uname=$row->uname ." || </p>";
            echo "<p  style='border-bottom: 1px dashed grey; padding:5px;'>Redni broj:". $uid=$row->uid. " || </p>";
            echo "<p  style='border-bottom: 1px dashed grey; padding:5px;'>Registrovana email posta: ". $uemail=$row->uemail."  || </p>"; ?><?
            echo"<p  style='border-bottom: 1px dashed grey; padding:5px;'>";
            if(($row->status)==1 ){
                echo $statuss="Korisnik je aktivan.";
               
            }
             if(($row->status) == 0){
                echo $statuss="Korisnik nije potvrdio registraciju.";
            }
            if(($row->status) == 2){
                echo $statuss="Korisnik je objavljuje postove.";
            }
            if(($row->status) ==3 ){
                echo $statuss="Korisnik je administrator.";
            }
            if(($row->status) == 4){
                echo $statuss="Korisnik je zabranjen pristup.";
            }
            
            echo"</p></div></a>";
            
            }	
?>

