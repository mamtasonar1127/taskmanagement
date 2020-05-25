<?php
include("header.php");
?>


<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
   
   
   <div style="border:hidden; overflow:scroll; height:500px; width:977px; overflow-x:scroll; margin-left:32px; margin-top:50px;">
<table align="center" style="font-size:14px;" class="w3-table-all">

<tr>
<th>Ticket No.</th>
<th>Task Description</th>
<th>Required By</th>
<th>Comments</th>
<th>Assign To</th>
<th>Commited Date</th>
<th>Status</th>
<th>Completed On</th>
<th>Ratings</th>
<th>Ratings Comments</th>
<th>Actions</th>
</tr>

<?php
if($editdataaduser->num_rows>0)
{
foreach($editdataaduser as $all)
{
?>
    <tr>
    <td><?php echo $all['task_id'];?></td>
    <td><?php echo $all['taskdesc'];?></td>
    <td><?php echo $all['tcompdate'];?></td>
    <td><?php echo $all['tskcomments'];?></td>
    <td><?php echo $all['assignto'];?></td>
    <td><?php echo $all['commitdatetime'];?></td>
    <td><?php echo $all['status'];?></td>
    <td><?php echo $all['workdoneon'];?></td>
    <td><?php echo $all['ratings'];?></td>
    <td><?php echo $all['ratingreasons'];?></td>
    <td>
    <?php
    if($all['status']=='Completed')
	{
	?>
    <a href="adminuseredit.php?aduseredit_id=<?php echo $all['task_id'];?>"><img src="img/download (2).png" width="25" height="25"></a>
    <?php
	}
	else if(!empty($all['ratings']))
	{
		
		echo "Completed";
	}
	else
	{
		echo "Not Completed";
	}
	?>
    
    </td>
    </tr>
<?php
}
}
else
{
	echo "<td colspan=11><center><h4>No Task</h4></center></td>";
}
?>
</table>
</div>
   
   
   
   <br><br><br><br>
   
   

<?php include("footer.php"); ?>
