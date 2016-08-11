<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" /><br />
	  
		
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>

<?php
global $conn;

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
	  $tmp=explode('.', $file_name);
      $file_ext=end($tmp);
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploadimg/".$file_name);
	
		 $uploaded=($_FILES['image']['name']);

	$q=mysqli_query($conn, "UPDATE users SET img = ".$_FILE['image']['name'] ." WHERE uid= ". $_SESSION['uid']." ");
	
         echo " <img src='uploadimg/" . $_FILE['image']['name']. "' width=100px height=100px/>";
      }else{
         print_r($errors);
      }
   }
?>
