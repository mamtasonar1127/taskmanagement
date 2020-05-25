<?php
include("headeruser.php");

$a=$_SESSION['user']->userid;
if(isset($_REQUEST['cpp']))
{
	$proname=$_FILES['pro']['name'];
	$protype=$_FILES['pro']['type'];
	$prosize=$_FILES['pro']['size'];
	$proold=$_FILES['pro']['tmp_name'];
	
	$pronew="profile_pic/".$proname;
	move_uploaded_file($proold,$pronew);
	
	$sql="UPDATE `tbl_reg` SET `profile_pic`='$pronew' WHERE `userid`='$a'";
	$ex=$conn->query($sql);
	
	if($ex)
	{
		echo "<script>
		alert('Image Changed Successfully');
		window.location.href='changeprofile.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('Error In Updating Image...Try Again');
		window.location.href='changeprofile.php';
		</script>";
	}
}



?>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

 <div class="w3-container">
 
 <form class="w3-container w3-card-4 w3-padding-16 w3-white"  method="post" enctype="multipart/form-data" style="margin-top:200px; margin-left:400px; font-size:16px; width:30.33333%;">
 
 
 <label><b>Change Image:</b></label><br><br>
 <input type="file" name="pro">
 
<br><br>
            <button class="w3-button" style="background-color:#009688; width:200px; height: 49px;" name="cpp" type="submit"><h5><b>Change<i ></i></b></h5></button>
 
 
 
 
 
 </form>
 
 
 
 
 </div>




  </div>











<?php
include("footer.php");
?>