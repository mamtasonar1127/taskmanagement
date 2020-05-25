  <?php
include("header.php");
?>


<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
   <p style="margin-left: 433px;" id="loading"><img src="images/ajax-loader (1).gif" width="30" height="30"/>&nbsp;Please wait...</p></center>
  
  <form method="post" id="myform">
<div id="tas" style="margin-left:200px;">
<br><br>

<input id="usersee" type="text" name="adminaddtask" readonly  hidden="" value="<?php echo strtoupper($_SESSION['user']->username);
?>">						  	


  <table style="font-size:24px;" cellpadding="3">
<tr>
<td>Task Description:</td>
<td><textarea name="atskdesc" required style="width:500px; height:80px; font-size:24px;"></textarea></td>
</tr>
<tr>
<td>Given on(Date):</td>
<td><input readonly type="text" name="dedate" style="width: 264px; border:hidden; background-color:rgba(241,239,239,1.00);" value="
<?php 

	date_default_timezone_set('Asia/Kolkata');
	$date = date(' d-m-Y ', time());
	echo $date;

?>



"></td>
<td><input readonly type="text" name="detime" style="margin-left: -238px; width: 231px; border:hidden; background-color:rgba(241,239,239,1.00);" value="
<?php 

	

?>"></td>

</tr>
<tr>
<td>Given To Location:</td>
<td>
<select name="loc" style="font-size:24px; width:336px;">
<option></option>
<?php
foreach($location as $ul)
{
?>

<option value="<?php echo $ul['location'];?>"><?php echo $ul['location'];?></option>
<?php } ?>
</select>

</td>
</tr>
<tr>
<td>Given To Department:</td>
<td>
<select name="dept" style="font-size:24px; width:336px;">
<option></option>
<?php
foreach($dept as $uldept)
{
?>

<option value="<?php echo $uldept['department'];?>"><?php echo $uldept['department'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>	
<td>Required By:</td>
<td><input type="text" id="datepicker" name="acompdate" style="width:500px; height:30px; font-size:24px;" required></td>
</tr>
<tr>
<td>Comments:</td>
<td><textarea name="atskcomments" style="width:500px; height:80px; font-size:24px;" required></textarea></td>
</tr>
</table>
<br />
<input type="submit" id="submit" style="background-color:#2196F3; width:100px; font-size:large; font-weight:bold" name="aaddtask" class="btn btn-primary" value="Add Task"/>
 &nbsp; &nbsp;
<input class="btn btn-primary" style="background-color:#2196F3; width:100px; font-size:large; font-weight:bold;" type="button" name="cancel" value="Cancel" onClick="window.location='admin.php';" />
</div>

  </form>
  </div>

<?php include("footer.php"); ?>
