<?php
include("header.php");

$t=$_REQUEST['t'];
//echo $t;
$l=$_REQUEST['l'];
//echo $l;

$sqllist="select * from tbl_taskdata where tasklocation='$t' and taskdepartment='$l' ORDER BY task_id desc";
$exlist=$conn->query($sqllist);  

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
<center><h3>Task Request List</h3></center>
   <div style="border:hidden; overflow:scroll; height:500px; width:1031px; overflow-x:scroll; margin-left:20px; margin-top:20px;">         

<table class="w3-table-all" style="font-size:14px;" border="1">
<tr>
<th>Ticket No.</th>
<th>Task Given By</th>
<th>Task Description</th>
<th>Task Given Date</th>
<th>Task Given Time</th>
<th>Given To Location</th>
<th>Given To Department</th>
<th>Required By</th>
<th>Comments</th>
<th>Input Required</th>
<th>Assign To</th>
<th>Commited Date</th>
<th>Status</th>
<th>Forwarded On</th>
<th>Days Taken</th>
<th>Ratings</th>
<th>Rating Remarks</th>
<th><center>Actions</center></th>
<th colspan="2"><center>Admin Acknowledgement</center></th>
<th colspan="2"><center>Admin Acknowledgement Date and Time</center></th>

</tr>

<?php 

if($exlist->num_rows>0)
{
while($all=$exlist->fetch_object())
{
	
?>
<tr>
<td><?php echo $all->task_id;?></td>
<td><?php echo $all->taskuser;?></td>
<td><?php echo $all->taskdesc;?></td>

<td><?php echo $all->taskgivendate;?></td>
<td><?php echo $all->taskgiventime;?></td>
<td><?php echo $all->tasklocation;?></td>
<td><?php echo $all->taskdepartment;?></td>

<td><?php echo $all->tcompdate;?></td>
<td><?php echo $all->tskcomments;?></td>
<td><?php echo $all->input_required;?></td>
<td><?php echo $all->assignto;?></td>
<td><?php echo $all->commitdatetime;?></td>
<td><?php echo $all->status;?></td>
<td><?php echo $all->workdoneon;?></td>
<td>
<?php
if($all->daystaken=='0 day/s' || $all->daystaken=='0 months 0 days' )
{
	echo "1 Day";
}
else
{
 echo $all->daystaken;
}
?>
 
 
 
</td>
<td><?php echo $all->ratings;?></td>
<td><?php echo $all->ratingreasons;?></td>

<td>
<?php
if($all->status=='Forward for Check-In')
{
	echo "Forward for Check-In";
}
else if($all->status=='Completed')
{
	echo "Completed";
}
else if($all->status=='Assign')
{
	echo "Assigned";
}
else if($all->status=='Reopen')
{
	echo "Reopen";
}
else
{
?>
	<a href="edit.php?edit_id=<?php echo $all->task_id;?>&i=<?php echo $t?>&ii=<?php echo $l?>"><img src="images/download (2).png" width="25" height="25"></a>
    
    
    </td>
    <?php
}
?>

<td>

<?php 
if($all->status=='Forward for Check-In' || $all->status=='Reopen')
{
	?>
	<?php /*?><a href="suggestion.php?sugg_id=<?php echo $all->task_id;?>"><img src="img/suggestion.png" width="25" height="25"></a><?php */?>
    
    <a href="suggestion2.php?sugg_id=<?php echo $all->task_id;?>"><img src="images/suggestion.png" width="25" height="25"></a>
    <?php
}
else if($all->status=='Completed')
{
	echo "Completed";
}
else
{
	echo "Not Completed";
}

?>


</td>
<td><?php echo $all->suggestion;?></td>
<td><?php echo $all->adminconfirdate;?></td>
<td><?php echo $all->adminconfirtime;?></td>

</tr>


<?php
}
}
else
{
	echo "<td colspan=12><center><h4>No Task</h4></center></td>";
}

?>

</table>

</div>

  
  </div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
function myAccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}


function myAccordion1(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}

function myAccordion2(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}

function myAccordion3(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme", "");
    }
}



</script>

</body>
</html>
