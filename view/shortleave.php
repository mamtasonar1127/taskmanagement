<?php	
include("header.php");
$a=$_SESSION['user']->email_id;
$sqlleave="select * from tbl_reg where `email_id`='$a'";
$exleave=$conn->query($sqlleave);
$resleave=$exleave->fetch_object();
$_SESSION['lea']=$resleave;

if(isset($_REQUEST['leavesubmit']))
{      
	$timeset=$_REQUEST['timeset'];
	$leavename=$_REQUEST['leavename'];
	$leaveempno=$_REQUEST['leaveempno'];
	$leavedept=$_REQUEST['leavedept'];
	$leaveshift=$_REQUEST['leaveshift'];
	$leavelocation=$_REQUEST['leavelocation'];
	$leaveemercon=$_REQUEST['leaveemercon'];
	$tol=$_REQUEST['tol'];
	$tor=$_REQUEST['tor'];
	$leavereason=$_REQUEST['leavereason'];
	$cat=$_REQUEST['cat'];
	$leavestatus=$_REQUEST['leavestatus'];


$sqlins="INSERT INTO `tbl_leave`(`presentdate`, `empname`, `emplno`, `department`, `shift`,`sllocation`, `emergencycontact`, `timeofleaving`, `timeofreturning`,`reason`, `category`, `status`) VALUES ('$timeset','$leavename','$leaveempno','$leavedept','$leaveshift','$leavelocation','$leaveemercon','$tol','$tor','$leavereason','$cat','$leavestatus')";
$exins=$conn->query($sqlins);

if($exins)
{
	echo "<script>
	alert('Added Successfully');
	window.location.href='longleave.php';
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




<form method="post">
<div class="w3-main" style="margin-left:300px;margin-top:54px;">

 <center><b style="font-size:20px;">Short-Leave Application</b></center><br>
          <table align="center" class="table-bordered" style="font-size:18px;">
          <tr>
          <td>Date:</td><td><input readonly style="border:hidden; width:225px; background-color:transparent;"  type="text" name="timeset" value="<?php
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d/m/Y', time());
			echo $date;
		?>">
          
          </td>
          </tr>
          <tr>
          <td>Name:</td><td><input readonly  style="width:225px; border:hidden; background-color:transparent;" type="text" name="leavename" value="<?php echo $_SESSION['lea']->username;?>"></td>
          </tr>
          <tr>
          <td>Empl. No.:</td><td><input  readonly  style="width:225px; border:hidden; background-color:transparent;" type="text" name="leaveempno" value="<?php echo $_SESSION['lea']->emp_code;?>"></td>
          </tr>
          <tr>
          <td>Department:</td><td><input  readonly name="leavedept"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->userdepartment;?>"></td>
          </tr>
          <tr>
          <td>Shift:</td><td><input  readonly name="leaveshift"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->shift;?>"></td>
          </tr>
          <tr>
          <td>Location:</td><td><input  readonly name="leavelocation"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->location;?>"></td>
          </tr>
          <tr>
          <td>Emergency Contact No.:</td><td><input type="text" required name="leaveemercon" style="width:273px; border:hidden;" data-bvalidator="required"></td>
          </tr>
          <tr>
          <td>Time Of Leaving:</td><td><input type="time" required  name="tol" style="width:273px; border:hidden;"></td>
          </tr>
          <tr>
          <td>Time Of Returning:</td><td><input name="tor" style="width:273px; border:hidden;" type="time"></td>
          </tr>
          
          <tr>
          <td>Reason:</td><td><textarea required name="leavereason" style="width:273px; height:100px;" data-bValidator="required"></textarea></td>
          </tr>
          
          <tr hidden>
          <td>category:</td><td> <input readonly type="text" name="cat" value="shortleave"></td>
          </tr>
          
          <tr hidden>
          <td>Status</td><td><input readonly="" type="text" name="leavestatus" value="send"><td>
          </tr>
          
          
          
          </table> <br>
          <table align="center">
          <tr>
         <td> <input  type="submit" name="leavesubmit" value="Submit"  class="form-control" style="width:100px; color:rgba(0,0,0,1.00); font-size:18px; font-family:'Arial Black', Arial;">  </td>
         <td> <input type="reset" name="reset" value="Reset" class="form-control" style="width:100px; color:rgba(0,0,0,1.00); font-size:18px; font-family:'Arial Black', Arial;" /></td>
         </tr>
         </table>



 
  </div>
</form>
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
