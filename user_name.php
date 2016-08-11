<?php
$sports= isset($_GET['sid'])&& is_numeric($_GET['sid'])?$_GET['sid']:1;
		$query ="SELECT * FROM sportovi WHERE sid = $sports";
		
		$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)>0)
		{
			while($r = mysqli_fetch_assoc($result))
			{
				$sport=$r['sport'];
				
 }
 echo "<img src='../img/". $sport .".png' />";
 echo  $sport ;
 }
 ?>