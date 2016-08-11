<?php session_start();
require "../conn.php";

$selected_id = -1;
$selected_sport=" ";
  $sv_sport=" ";
$word=" ";
$selected_vid= -1;



if(isset($_GET['sid'])){
        $q = mysqli_query($conn, "SELECT * FROM sportovi WHERE sid ='{$_GET['sid']}' ");
		$row = mysqli_fetch_object($q);
		if($row){
				$selected_id= $row->sid;
				$selected_sport=$row->sport;
				$word=$row->opis;
				}
						}
						
	// >>>>>>>>>> P D O <<<<<<<<<<<<<<<<<<<< get all object from Sport class
	/*
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 *
	 **/

if(isset($_GET['vid'])){
 $q = mysqli_query($conn, "SELECT * FROM vrsta_sporta WHERE sid = '{$selected_id}'");
     while($row=mysqli_fetch_object($q)){
    $selected_vid= $row->vid;
    $sv_sport=$row->vrsta;
    $vsid=$row->sid;
}
}

if(isset($_POST['dodaj_vrstu']))
{
		$new_sv=$_POST['new_sv_sport'];
		if(!empty($new_sv))
		{
$new_s="INSERT INTO vrsta_sporta(vid, sid, vrsta) VALUES(null, '{$selected_id}', '{$new_sv}')";
	mysqli_query($conn, $new_s);
	mysqli_insert_id($conn);
		}
}

if(isset($_SESSION['uid'])){
$autor = $_SESSION['uid'];
}
?>
<?php
	if(isset($_POST['insert'])){
        $selected_sport=$_POST['s_name'];
     
      
        mysqli_query($conn,"INSERT INTO sportovi(sid,sport) VALUES (null,'{$selected_sport}')");
          $new_sid=mysqli_insert_id($conn);

}	
	?>
<? include_once "../head.html";?>
		<body>
		<div id="wrapper" style="overflow:hidden;">
		<div class="pretraga" style="width: 650px; float:left;">
		<div class="login">
		 <?php if(!isset($_SESSION['uname'])){
		echo"<div class='totheleft'>";
		include_once 'start_buttons.php'; 
		echo"</div>";
		}else{
		echo "<div class='buttonCenter'><p><h3 style='color:#D9E598;'>Zdravo ".$_SESSION['uname']." </h3></p>
		<a href='user_account.php'><p id='button'>Tvoj nalog</p></a>
		<a href='logout_user.php'><p id='button'>Izloguj se</p></a>
		<a href='../index.php'><p id='button'>Pocetna strana</p></a>
		</div>";
		}
echo "<p style='float:left; color:black; padding-left: 10px;'>Datum " . date("Y/m/d") ." &nbsp; Vreme ". date("h:i:sa")."</p>";
?>
		</div> 
		<div id="selection">
		<form method="POST" action=" " >
    <?php
    $q = mysqli_query($conn, "SELECT * FROM sportovi");

    ?>
    <select onchange="window.location='?sid='+this.value" name="selSport" class="innerPopular">
          <option value="-1">ODABERI SPORT</option>
         <?php
        while($row=mysqli_fetch_object($q)){
			
            echo"<option " . ($selected_id==$row->sid?"selected":" ") ." value='{$row->sid}'->{$row->sport} </option>";
           echo"<img src='img/". $selected_sport. ".png' />";
			}
            ?>
		</select>
		<br/>
		Sport:<br />
		<input type="text" name="s_name" value= "<?php echo $selected_sport; ?>" />
		
		<input type="submit" name="insert" value="Dodaj nov"/>
		<input type="submit" name="update" value="Izmeni"/>
		<input type="submit" name="delete" value="Izbrisi"/><br />
		<br />
	Vrsta sporta:
	  <?php
    $q = mysqli_query($conn, "SELECT * FROM vrsta_sporta WHERE sid = '{$selected_id}'");
	
    ?>
    <select   name="selVrsta" >
          <option value="">ODABERI PODVRSTU</option>
         <?php
        while($row=mysqli_fetch_object($q)){
            echo"<option " . ($selected_vid==$row->vid?"selected":" ") ." value='{$row->vid}'->{$row->vrsta} </option>";
			$selected_vid=$row->vid;	
            }
            ?>
		</select>
		<br/>
		
		<br/>
	
    Vrsta:<br />
		<input type="text" name="new_sv_sport" />
		<input type="submit" name="dodaj_vrstu" value="Dodaj vrstu"/>
		<input type="submit" name="update" value="Izmeni"/>
		<input type="submit" name="delete" value="Izbrisi"/><br />

		<br /><br />
		<legend>
		<select name="selPost" value="selPost" method="POST">
<?php			
if(isset($_POST['selPost']))
{
  $table = $_POST['selPost'];
  $uvod=$_POST['uvod'];
}
?>

		<option   class="rounded" value="vesti" >Vesti</option>
		<option    class="rounded" value="info">Info</option>
		<option   class="rounded" value="legende">Legende</option></select>
				
		</legend><br />
		<h2>Naslov:</h2>
		<input type="text" name="title">
		<h2>Uvod vesti:</h2>
		<textarea  name="uvod" cols="60" rows="2" placeholder="Uvod za Vase objave..." ></textarea><br/>
		<h2>Sadrzaj vesti:</h2>
		<textarea  name="text" cols="60" rows="10" placeholder="Sadrzaj Vase objave..." ></textarea><br/>
		
		<input type="submit" name="addPost" value="Dodaj nov"/>
		<input type="submit" name="update" value="Izmeni"/>
		<input type="submit" name="delete" value="Izbrisi"/><br />
<?php
if(isset($_POST['addPost'])){

		 
		if(empty($_POST['text'])||empty($_POST['title'])){
		
		$warrned="Sva polja trebaju biti popunjena..";}else{
if(!empty($_POST['uvod']&&$_POST['text']&&$_POST['title'])){
$text=$_POST['text'];
	$title=$_POST['title'];

		
  mysqli_query($conn, "INSERT INTO $table(id,time_added,sid,vid,title,uvod,text,autor)VALUES(null, NOW(), '{$selected_id}', '{$selected_vid}','{$title}', '{$uvod}', '{$text}', '{$autor}')");
        mysqli_insert_id($conn);
}}
}

?>
</form>
<h3> UPLOAD IMAGE</h3>

</div>
</div>
</body>
</html>
