<?php 
include("header.php"); 
$i=$_REQUEST['i'];
//echo $i;
$ii=$_REQUEST['ii'];
//echo $ii;
?>

<form method="post">
<section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
						<li><i class="icon_document_alt"></i>Task Assign Window</li>	
                        <input id="usersee" type="text" name="uname" readonly  style=" border:hidden; color:rgba(11,189,3,1.00); background-color:rgba(255,255,255,1.00);font-size:16px; margin-left: 514px; width: 200px;" value="<?php echo strtoupper($_SESSION['user']->username);
?>" >

<input id="usersee" type="text" name="assigntaskemail" readonly  style=" border:hidden; color:rgba(11,189,3,1.00); background-color:rgba(255,255,255,1.00);font-size:16px; float:right; width: 253px;" value="<?php echo  $_SESSION['user']->email_id;?>" >						  	
					</ol>
				</div>
			</div>
          
<br />



<div id="tas" style="margin-left:200px;">

<table style="font-size:24px;" cellpadding="3" >
<?php
foreach($edittask as $e)
{ 
?>
<tr>
<td>Ticket No.:</td>
<td><input type="text" style="border:hidden; font-size:24px; background:url(images/bg.jpg);" readonly name="xx1" required value="<?php echo $e['task_id'];?>"></td>
</tr>
<tr>
<td>Task Given By:</td>
<td><input type="text" style="border:hidden; font-size:24px; width:294px; background:url(images/bg.jpg);" readonly name="xx2" required value="<?php echo $e['taskuser'];?>"></td>
</tr>
<?php /*?><tr>
<td>Email Of Assignee:</td>
<td><input type="text" style="border:hidden; font-size:24px; width:450px; background:url(images/bg.jpg);" readonly name="xx3" required value="<?php echo $e['email'];?>"></td>
</tr><?php */?>
<tr>
<td>Task Description:</td>
<td><textarea style="border:hidden; font-size:24px; background:url(images/bg.jpg);" readonly name="xx4" required><?php echo $e['taskdesc'];?></textarea></td>
</tr>
<tr>
<td>Required By:</td>
<td><input readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" type="text" name="xx5" required value="<?php echo $e['tcompdate'];?>"></td>
</tr>
<tr>
<td>Comments:</td>
<td><textarea readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" name="xx6" required><?php echo $e['tskcomments'];?></textarea></td>
</tr>
<tr>
<td>Input Required:</td>
<td><textarea name="inputreuired"></textarea></td>
</tr>
<tr>
<td>Assign To.:</td>
<td>
<select name="assigntoxx" id="mail" style="font-size:24px; width:336px;">
<option></option>
<?php
$i=$_REQUEST['i'];
//echo $i;
$ii=$_REQUEST['ii'];
//echo $ii;
$suser="select username from tbl_reg where userdepartment='$ii' and location='$i'";
$euser=$conn->query($suser);
while($ul=$euser->fetch_object())
{
?>

<option value="<?php echo $ul->username;?>"><?php echo $ul->username;?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" id="sq" style="font-size:24px; width:450px;" name="emailassigneexx" required readonly></td>
</tr>
<tr>
<td>Commit Date:</td>
<td><input  type="text" id="Datepicker1" name="commitdatetimexx" required style="font-size:24px; width:209px;"></td>
</tr>

<tr>
<td>Status:</td>
<td>
<select required name="tskstatusxx" style="font-size:24px; width:209px;">
<option></option>
<option>Assign</option>
<option>Cancel</option>
<option>Completed</option>
</select>
</td>
</tr>
<?php
}
?>


</table>
<br />
<input type="submit" name="updatexx" class="btn btn-primary" value="Update Task"/> &nbsp; &nbsp;
<input class="btn btn-primary" type="button" name="cancel" value="Cancel" onClick="window.location='list.php';" />

    </div>
</section>
</form>
<?php include("footer.php"); ?>