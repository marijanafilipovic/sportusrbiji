<?php
   $uid=$_SESSION['uid'];
   if(isset($_FILES['image']['name'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower((end(explode('.',$_FILES['image']['name']))));
      $newName=$uid ."." .$file_ext;
      $expensions= array("jpeg","jpg","png");
    
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploadimg/".$newName);		
		 $uploaded=($_FILES['image']['name']);

		 $q = mysqli_query($conn,"UPDATE users SET img= '{$newName}' WHERE uid =$uid");
         echo "Success uploaded <img src='uploadimg/" . $newName. "' style='width:100px; height:100px;'/>";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name ="image" />
         <input type = "submit"/>
      </form>
   </body>
</html>