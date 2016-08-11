<?php session_start();
require "../conn.php";

global $conn;
if(isset($_POST['izmeni'])){
     
    

$autor = $_SESSION['uid'];
$vrsta_sporta = $_POST['v_sporta'];  
      
        mysqli_query($conn,"UPDATE vrsta_sporta(vid,sid,vrsta,user) SET VALUES (null,'{$selected_id}','{$vrsta_sporta}''{$autor}')");
          
}



?>

   	 <div id="selection">
<form method="POST" action=" " >
    <?php
    $q = mysqli_query($conn, "SELECT * FROM sportovi");

    ?>
    <select onchange="window.location='?sid='+this.value" name="selSport" class="innerPopular">
          <option value="-1">Select sport</option>
         <?php
        while($row=mysqli_fetch_object($q)){
            echo"<option " . ($selected_id==$row->sid?"selected":" ") ." value='{$row->sid}'->{$row->sport} </option>";
           echo"<img src='img/". $selected_sport. ".png' />";
			}
            ?>
		  <?php
		 
      ?>
    </select>
    <br/>
    Sport:<br />
    <input type="text" name="s_name" value= "<?php echo $selected_sport; ?>" />
    <br /><br />
	Vrsta sporta:
	  <?php
    $q = mysqli_query($conn, "SELECT * FROM vrsta_sporta WHERE sid = $selected_id");
	
    ?>
    <select name="selVrsta" >
          <option value="0">Select category</option>
         <?php
        while($row=mysqli_fetch_object($q)){
            echo"<option " . ($selected_vid==$row->vid?"selected":" ") ." value='{$row->vid}'->{$row->vrsta} </option>";
            }
            ?>
	</select>
		  
	 <input type="submit" name="insert" value="Dodaj nov"/>
    <input type="submit" name="update" value="Izmeni"/>
    <input type="submit" name="delete" value="Izbrisi"/><br />