 <?php
include("header.php");

$aa=$_SESSION['user']->userdepartment;
$bb=$_SESSION['user']->location;


$sqltravellist="SELECT * FROM `tbl_leave` WHERE `department`='$aa' and `sllocation`='$bb'";
$extravellist=$conn->query($sqltravellist);


$sqltravellist1="SELECT * FROM `tbl_leave` where status='Send to HR' and sllocation='$bb'";
$extravellist1=$conn->query($sqltravellist1);

if(isset($_REQUEST['e_id']))
 {
 	$eid=$_REQUEST['e_id'];
 	$sqlupdate="UPDATE `tbl_leave` SET `status`='Send to HR' WHERE `leave_id`='$eid'";
 	$exupdate=$conn->query($sqlupdate);
 	if($exupdate)
 	 {
 	 	 echo "<script>
		  window.location.href='sll.php';
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
 	$sqlupdate1="UPDATE `tbl_leave` SET `status`='Approved' WHERE `leave_id`='$eid'";
 	$exupdate1=$conn->query($sqlupdate1);
 	if($exupdate1)
 	 {
 	 	 echo "<script>
		  window.location.href='sll.php';
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
<th>Given On</th>
<th>Employee Name</th>
<th>Employee No</th>
<th>Department</th>
<th>Shift</th>
<th>Location</th>
<th>Emergency Contact</th>
<th>Time Of Leaving</th>
<th>Time Of Returning</th>
<th>Reason</th>
<th>Action</th>
</tr>

<?php 

if($aa=='HR' && $extravellist1->num_rows>0)
{
while($all=$extravellist1->fetch_object())
{
	
?>
<tr>
<td><?php echo $all->leave_id;?></td>
<td><?php echo $all->presentdate;?></td>
<td><?php echo $all->empname;?></td>
<td><?php echo $all->emplno;?></td>
<td><?php echo $all->department;?></td>
<td><?php echo $all->shift;?></td>
<td><?php echo $all->sllocation;?></td>
<td><?php echo $all->emergencycontact;?></td>
<td><?php echo $all->timeofleaving;?></td>
<td><?php echo $all->timeofreturning;?></td>
<td><?php echo $all->reasonsl;?></td>


<td><a href="sll.php?e_id1=<?php echo $all->leave_id;?>" style="color:red;"><?php echo $all->status?></a></td>


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
<td><?php echo $all1->leave_id;?></td>
<td><?php echo $all1->presentdate;?></td>
<td><?php echo $all1->empname;?></td>
<td><?php echo $all1->emplno;?></td>
<td><?php echo $all1->department;?></td>
<td><?php echo $all1->shift;?></td>
<td><?php echo $all1->sllocation;?></td>
<td><?php echo $all1->emergencycontact;?></td>
<td><?php echo $all1->timeofleaving;?></td>
<td><?php echo $all1->timeofreturning;?></td>
<td><?php echo $all1->reasonsl;?></td>

<td>
<?php
if($all1->status=='Approved')
{
	echo "Approved";
	}
	else {
		?>
	
<a href="sll.php?e_id=<?php echo $all1->leave_id;?>" style="color:red;"><?php echo $all1->status?></a></td>
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
