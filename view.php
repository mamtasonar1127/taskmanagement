<?php
include("headeruser.php");

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>


   <div class="w3-twothird"  style="margin-left: 170px; margin-top: 25px;">
     <table align="center" style="font-size:12px;" class="table table-striped">

<tr>
<th>Ticket No.</th>
<th>Task Description</th>
<th>Task Given Date</th>
<th>Task Given Time</th>
<th>Given To Location</th>
<th>Given To Department</th>
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

if($editdata->num_rows>0)
{

foreach($editdata as $all)
{
?>
    <tr>
    <td><?php echo $all['task_id'];?></td>
    <td><?php echo $all['taskdesc'];?></td>
    <td><?php echo $all['taskgivendate'];?></td>
    <td><?php echo $all['taskgiventime'];?></td>
    <td><?php echo $all['tasklocation'];?></td>
    <td><?php echo $all['taskdepartment'];?></td>
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
    <a href="useredit.php?uedit_id=<?php echo $all['task_id'];?>"><img src="img/download (2).png" width="25" height="25"></a>
    <?php
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
