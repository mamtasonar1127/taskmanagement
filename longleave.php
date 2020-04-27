<?php
include("header.php");
if(isset($_REQUEST['leavesubmit']))
{      
	$timeset=$_REQUEST['timeset'];
	$leavename=$_REQUEST['leavename'];
	$leaveempno=$_REQUEST['leaveempno'];
	$leavedept=$_REQUEST['leavedept'];
	$leaveshift=$_REQUEST['leaveshift'];
	$leaveemercon=$_REQUEST['leaveemercon'];
	//$tol=$_REQUEST['tol'];
	//$tor=$_REQUEST['tor'];
	$datefrom=$_REQUEST['datefrom'];
	$dateto=$_REQUEST['dateto'];
	$leavereason=$_REQUEST['leavereason'];
	$cat=$_REQUEST['cat'];
	$leavestatus=$_REQUEST['leavestatus'];
	

$sqlins="INSERT INTO `tbl_leave`(`presentdate`, `empname`, `emplno`, `department`, `shift`, `emergencycontact`, `datefrom`, `dateto`, `reason`,`category`,`status`) VALUES ('$timeset','$leavename','$leaveempno','$leavedept','$leaveshift','$leaveemercon','$datefrom','$dateto','$leavereason','$cat','$leavestatus')";
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
<script>
  $( function() {
    $( "#datepicketlong" ).datepicker(
	{
		dateFormat: 'dd-mm-yy',
		minDate: 0
	});
  } );
  </script>  

<script>
  $( function() {
    $( "#datepickerlong1" ).datepicker(
	{
		dateFormat: 'dd-mm-yy',
		minDate: 0
	});
  } );
  </script>  

<script type="text/javascript">
	 $(document).ready(function(e) {
    $('#datepickerlong').datepicker();
   
    $('#datepickerlong1').datepicker();
    

    $('#datepickerlong1').change(function() {
		
    var diff = $('#datepickerlong').datepicker("getDate") - $('#datepickerlong1').datepicker("getDate");
   // alert(diff);
    $('#diff').val(diff / (1000*60*60*24) * -1);
	
});
	 });
    
  </script> 

<form method="post">
<div class="w3-main" style="margin-left:300px;margin-top:54px;">
 <center><b style="font-size:20px;">Long-Leave Application</b></center><br>
          <table align="center" class="table-bordered" style="font-size:18px;">
          <tr>
          <td>Date:</td><td><input readonly style="border:hidden; width:225px; background-color:transparent;"  type="text" name="timeset" value="<?php
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d/m/Y', time());
			echo $date;
		?>">
          
          </td>
          </tr>
          <input  hidden type="text" name="cat" value="longleave">
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
          <td>Emergency Contact No.:</td><td><input type="text" required name="leaveemercon" style="width:273px; border:hidden;" data-bvalidator="required"></td>
          </tr>
          <tr>
          <td>Date:</td>
          <td>
          From:<input required id="datepickerlong" name="datefrom" style="width:225px; border:hidden;" type="text"><br><br>
              To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="datepickerlong1" required name="dateto" style="width:225px; border:hidden;" type="text">          
          </td>
          </tr>
          <tr>
          <td>No. of days taken:</td><td><input type="text" id="diff"></td>
          </tr>
          
          <tr>
          <td>Reason:</td><td><textarea required name="leavereason" style="width:273px; height:100px;"></textarea></td>
          </tr>
          
          <tr hidden>
          <td>status:</td><td><input readonly="" type="text" value="send" name="leavestatus"></td>
          </tr>
          
          </table> <br><br>
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
