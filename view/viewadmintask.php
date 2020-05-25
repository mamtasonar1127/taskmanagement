<?php
include("header.php");
?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

  <div style="border:hidden; overflow:scroll; height:533px; width:977px; overflow-x:scroll; margin-left:32px; margin-top:50px;"> 
<table align="center" style="font-size:12px;" class="w3-table-all">

<tr>
<th>Ticket No.</th>
<th>Task Given By</th>
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
if($v->num_rows>0)
{
foreach($v as $a)
{
?>

    <tr>
    <td><?php echo $a['task_id'];?></td>
    <td><?php echo $a['taskuser'];?></td>
    <td><?php echo $a['taskdesc'];?></td>
    <td><?php echo $a['tcompdate'];?></td>
    <td><?php echo $a['tskcomments'];?></td>
    <td><?php echo $a['assignto'];?></td>
    <td><?php echo $a['commitdatetime'];?></td>
    <td><?php echo $a['status'];?></td>
    <td><?php echo $a['workdoneon'];?></td>
    <td><?php echo $a['ratings'];?></td>
    <td><?php echo $a['ratingreasons'];?></td>
    <td>
    <?php 
	if($a['status']=='Assign' || $a['status']=='Reopen')
    {
	?>
		 <a href="adtskedit.php?uedit_id=<?php echo $a['task_id'];?>"><img src="images/download (2).png" width="25" height="25"></a>
     <?php
	}
	else
	{
		echo "Completed";
	}
    ?>
    
    </td>
    </tr>
<?php
}
}
else
{
	echo "<td colspan=12><center><h4>Task Not Assigned</h4></center></td>";
}
?>
</table>
</div>

  
  </div>
<?php include("footer.php"); ?>