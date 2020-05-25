<?php
session_start();

 include("controller.php");


$ashow=$_SESSION['user']->userdepartment;
$bshow=$_SESSION['user']->location;

if(isset($_REQUEST['s1_id']))
{
   $sshow=$_REQUEST['s1_id'];
   
  $sqlshow="SELECT * FROM `tbl_reg` WHERE `userid`='%$sshow%' OR `email_id`='%$sshow%' OR `shift`='%$sshow%' OR `emp_code`='%$sshow%' OR `usercategory` like '%$sshow%' OR `location` like '%$sshow%' OR `username` like '%$sshow%' and `userdepartment`='$ashow' and `location`='$bshow'"; 
   $exshow=$conn->query($sqlshow);	
    
}





 ?>
<img src="images/downarrow.png" width="25" height="25" style="margin-top:10px;"><input type="submit"  style="border:hidden; background-color:transparent; text-decoration:underline;" name="multi_delete" value="Delete All" /><br><br>

<div style="border:hidden; overflow:scroll; height:476px; width:990px; overflow-x:scroll; margin-left:20px;">
<table class="" border="1">
<tr>
<th></th>
<th hidden="">User No.</th>
<th>User Name</th>
<th>User ID</th>
<th>User Email Address</th>
<th>Contact No.</th>
<th>Shift</th>
<th>Employee Code</th>
<th>Category</th>
<th>Department</th>
<th>Location</th>
<th colspan="2"><center>Action</center></th>
</tr>

<?php 
if($exshow->num_rows>0)
{
while($resshow=$exshow->fetch_object())
{
?>
<tr>
<td><input type="checkbox" name="chk[]" value="<?php echo $resshow->log_id;?>"></td>
<td hidden=""><?php echo $resshow->log_id;?></td>
<td><?php echo $resshow->username;?></td>
<td><?php echo $resshow-> userid;?></td>
<td><?php echo $resshow->email_id;?></td>
<td><?php echo $resshow->contact_no;?></td>
<td><?php echo $resshow->shift;?></td>
<td><?php echo $resshow->emp_code;?></td>
<td><?php echo $resshow->usercategory;?></td>
<td><?php echo $resshow-> userdepartment;?></td>
<td><?php echo $resshow->location;?></td>
<td><a href="edituser.php?edituser_id=<?php echo $resshow->log_id;?>"><img src="images/download (2).png" width="25" height="25"></a></td>
<td><a href="viewusers.php?deluser_id=<?php echo $resshow->log_id;?>"><img src="images/delete.png" width="25" height="25"></a></td>

<?php
}
}
else
{
	echo "<td colspan=8><center><h4>No Users</h4></center></td>";
}
?>
</tr>
</table>
</div>
<img src="images/leftuparrow.png" width="25" height="25" style="margin-top:-13px;"><input type="submit"  style="border:hidden; background-color:transparent; text-decoration:underline;" name="multi_delete" value="Delete All" />
