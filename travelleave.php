 <?php
include("header.php");

$aa=$_SESSION['user']->userdepartment;
$bb=$_SESSION['user']->location;


$sqltravellist="SELECT * FROM `travelrequisition` where `leavedept`='$aa' and `leavelocation`='$bb'";
$extravellist=$conn->query($sqltravellist);


$sqltravellist1="SELECT * FROM `travelrequisition` where leavestatus='Send to HR' and leavelocation='$bb'";
$extravellist1=$conn->query($sqltravellist1);

if(isset($_REQUEST['e_id']))
 {
 	$eid=$_REQUEST['e_id'];
 	$sqlupdate="UPDATE `travelrequisition` SET `leavestatus`='Send to HR' WHERE `travel_id`='$eid'";
 	$exupdate=$conn->query($sqlupdate);
 	if($exupdate)
 	 {
 	 	 echo "<script>
		  window.location.href='travelleave.php';
		  </script>";
 	 
 	 }
 	 else 
 	 {
 	 	 echo "<script>
		  alert('ERROR');
		  </script>";
 	 }
 }


if(isset($_REQUEST['e_id1']))
 {
 	$eid=$_REQUEST['e_id1'];
 	$sqlupdate1="UPDATE `travelrequisition` SET `leavestatus`='Approved' WHERE `travel_id`='$eid'";
 	$exupdate1=$conn->query($sqlupdate1);
 	if($exupdate1)
 	 {
 	 	 echo "<script>
		  window.location.href='travelleave.php';
		  </script>";
 	 
 	 }
 	 else 
 	 {
 	 	 echo "<script>
		  alert('ERROR');
		  </script>";
 	 }
 }

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div style="border:hidden; overflow:auto; height:600px; width:1007px; overflow-x:scroll; margin-left:-2px;">         
<table class="table table-striped table-advance table-hover" style="font-size: 12px; margin-top: 120px;" border="1">
<tr>
<th>ID</th>
<th>Employee Name</th>
<th>Employee No</th>
<th>Department</th>
<th>Shift</th>
<th>Location</th>
<th>Emergency Contact</th>
<th>Age</th>
<th>Leave Date From</th>
<th>Leave Date To</th>
<th>Total Days</th>
<th>Venu</th>
<th>Reason</th>
<th>Travel Mode</th>
<th>Action</th>



</tr>

<?php 

if($aa=='HR' && $extravellist1->num_rows>0)
{
while($all=$extravellist1->fetch_object())
{
	
?>
<tr>
<td><?php echo $all->travel_id;?></td>
<td><?php echo $all->leavename;?></td>
<td><?php echo $all->leaveempno;?></td>
<td><?php echo $all->leavedept;?></td>


<td><?php echo $all->leaveshift;?></td>
<td><?php echo $all->leavelocation;?></td>
<td><?php echo $all->leaveemercon;?></td>
<td><?php echo $all->leaveage;?></td>
<td><?php echo $all->datefrom;?></td>

<td><?php echo $all->dateto;?></td>
<td><?php echo $all->leavedays;?></td>
<td><?php echo $all->leavevenu;?></td>
<td><?php echo $all->leavereason;?></td>
<td><?php echo $all->travelmode;?></td>
<td><a href="travelleave.php?e_id1=<?php echo $all->travel_id;?>" style="color:red;"><?php echo $all->leavestatus?></a></td>


</tr>

<?php
}
}

elseif($aa!='HR' && $extravellist->num_rows>0) 
{
	while($all1=$extravellist->fetch_object())
{
	
?>
<tr>
<td><?php echo $all1->travel_id;?></td>
<td><?php echo $all1->leavename;?></td>
<td><?php echo $all1->leaveempno;?></td>
<td><?php echo $all1->leavedept;?></td>

<td><?php echo $all1->leaveshift;?></td>
<td><?php echo $all1->leavelocation;?></td>
<td><?php echo $all1->leaveemercon;?></td>
<td><?php echo $all1->leaveage;?></td>
<td><?php echo $all1->datefrom;?></td>

<td><?php echo $all1->dateto;?></td>
<td><?php echo $all1->leavedays;?></td>
<td><?php echo $all1->leavevenu;?></td>
<td><?php echo $all1->leavereason;?></td>
<td><?php echo $all1->travelmode;?></td>
<td>
<?php
if($all1->leavestatus=='Approved')
{
	echo "Approved";
	}
	else {
		?>
	
<a href="travelleave.php?e_id=<?php echo $all1->travel_id;?>" style="color:red;"><?php echo $all1->leavestatus?></a></td>
<?php
}
?>

</tr>
<?php
}
}

else 
 {
	echo "<td colspan=15><center><h4>No Leave Request</h4></center></td>";
 }
?>

</table>

</div>
<br>


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
