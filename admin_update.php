
<?php
include_once "../conn.php";
global $conn;
include_once"../head.html";
/*
if($_SESSION['status'] == 3){}
is_numeric || javascript validation
*/
$uid =($_GET['uid']);

    echo "<div class='innerVest' style='height:480px; width:950px;'>";
echo "<div class='innerPopular' style='padding-left:50px; margin-botton: 150px; padding-top:50px'><img src='uploadimg/". $uid .".jpg' style='width:80px' 'height:80px'  /></div>";
$name=$_GET['uname'];
echo "<p style='; padding:10px;'>Korisnik sa rednim brojem <strong>". $uid . "</strong></p><p style=' padding:10px;'> i korisnickim imenom: </p><p style=' padding:10px;'><strong>". $name ;
echo"</strong></p><hr>";
echo "<p style=' padding:10px;'>Registrovan sa email adrresom: </p><p style=' padding:10px;'><strong>" .$email =$_GET['uemail'];
echo"</strong></p><hr><p style=' padding:10px; margin-left:180px;'> Ima status:  </p>";
echo "<div style=' padding:10px;  margin-left:180px;'>";

 $statuss= $_GET['status'];
 


 if(($statuss)==1 ){
 echo "<form method='POST' action='' >";
                echo "<p style='background-color:#E1E58B; width:150px; border-radius:10px; padding:10px;'><strong>Korisnik je aktivan.</strong></p>";
                echo "<p><input type='submit' name= 'set2' value='Postavi za pisca'/></p><br>";
              
                echo "<p><input type='submit' name='set3' value='Postavi za administratora'/></p><br>";
                echo "<p><input type='submit' name='set4' value='Deaktiviraj korisnika'/></p><br>";
echo "<hr></form>";
}
if(($statuss) == 0){
                 echo "<form method='POST' action='' >";
                echo "<p style='background-color:#E1E58B; width:150px; border-radius:10px; padding:10px;'><strong>Korisnik nije potvrdio registraciju</strong></p><br>";
                echo "<p><input type='submit' name='set1' value='Aktiviraj korisnika'/></p><br>";
echo "<hr></form>";
                }
            if(($statuss) == 2){
                  echo "<form method='POST' action='' >";
                echo "<p style='background-color:#E1E58B; width:150px; border-radius:10px; padding:10px;'><strong>Korisnik objavljuje tekstove</strong></p><br>";
                echo "<p><input type='submit' name= 'set1' value='Obican korisnik'/></p><br>";
                echo "<p><input type='submit' name='set3' value='Postavi za administratora'/></p><br>";
                echo "<p><input type='submit' name='set4' value='Deaktiviraj korisnika'/></p><br>";
echo "</form>";
//GET ALL POSTS WHERE UID is this >>>>> $Posts= Posts->getAll($uid);

            }
            if(($statuss) ==3){
                  echo "<form method='POST' action='' >";
                echo "<p style='background-color:#E1E58B; width:150px; border-radius:10px; padding:10px;'><strong>Korisnik je administrator.</strong></p>";
                 echo "<p><input type='submit' name= 'set1' value='Obican korisnik'/></p><br>";
                echo "<p><input type='submit' name='set2' value='Postavi za pisca'/></p><br>";
                echo "<p><input type='submit' name='set4' value='Deaktiviraj korisnika'/></p><br>";
echo "<hr></form>";
            }
            if(($statuss) == 4){
                echo "<p style='background-color:#D67C7C; width:150px; border-radius:10px; padding:10px;'>Korisniku je zabranjen pristup.</p><br><hr>";
echo "<p><input type='submit' name= 'set4' value='Deaktiviran korisnik'/></p><br>";

   
            }
              echo"</p>";
            /*CHANGE STATUS ACTIVE
            implement swich case for post param 
            and than can use one same query 
            */
              if(isset($_POST['set2'])){
                    $q="UPDATE users SET status = 2 WHERE uid = '{$uid}'";
                     mysqli_query($conn, $q);
               $statuss=2;
                    echo "Korisnik je postavljen za pisca";
                 
                }
                if(isset($_POST['set1'])){
                    $q="UPDATE users SET status = 1 WHERE uid = '{$uid}'";
                     mysqli_query($conn, $q);
               $statuss=1;
                    echo "Korisniku je postavljen status obicnog korisnika!";
                }
              
              
                if(isset($_POST['set3'])){
                    $q="UPDATE users SET status = 3 WHERE uid = '{$uid}'";
                     mysqli_query($conn, $q);
               $statuss=3;

                    echo "Korisnik je postavljen za administratora!";
                }
                                if(isset($_POST['set4'])){
                    $q="UPDATE users SET status = 4 WHERE uid = '{$uid}'";
                     mysqli_query($conn, $q);
                     
                $statuss=4;
                    echo "Korisnik je deaktiviran i nemoze koristiti svoj nalog!";
                }
?>
