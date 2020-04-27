  <?php
include("header.php");
$a=$_SESSION['user']->email_id;
$sqlleave="select * from tbl_reg where `email_id`='$a'";
$exleave=$conn->query($sqlleave);
$resleave=$exleave->fetch_object();
$_SESSION['lea']=$resleave;
         
  
if(isset($_REQUEST['leavesubmitadmintravel']))
{
	$tatimeset=$_REQUEST['tatimeset'];
	$taleavename=$_REQUEST['taleavename'];
	$taleaveempno=$_REQUEST['taleaveempno'];
	$taleavedept=$_REQUEST['taleavedept'];
	$taleaveshift=$_REQUEST['taleaveshift'];
	$taleavelocation=$_REQUEST['taleavelocation'];
	$taleaveemercon=$_REQUEST['taleaveemercon'];
	$taleaveage=$_REQUEST['taleaveage'];
	$tadatefrom=$_REQUEST['tadatefrom'];
	$tadateto=$_REQUEST['tadateto'];
	$taleavedays=$_REQUEST['taleavedays'];
	$taleavevenu=$_REQUEST['taleavevenu'];
	$taleavereason=$_REQUEST['taleavereason'];
	$tachk=implode(",",$_REQUEST['tachk']);
	$taleavestatus=$_REQUEST['taleavestatus'];
	
	$sqlta="INSERT INTO `travelrequisition`(`givenon`,`leavename`, `leaveempno`, `leavedept`, `leaveshift`,`leavelocation`, `leaveemercon`, `leaveage`, `datefrom`, `dateto`, `leavedays`, `leavevenu`, `leavereason`, `travelmode`, `leavestatus`)
	 VALUES ('$tatimeset','$taleavename','$taleaveempno','$taleavedept','$taleaveshift','$taleavelocation','$taleaveemercon','$taleaveage','$tadatefrom','$tadateto','$taleavedays','$taleavevenu','$taleavereason','$tachk','$taleavestatus')";
	 $exta=$conn->query($sqlta);
	
	
	}

          


?>
 <script>
  $( function() {
    $( "#datepickertravel2" ).datepicker(
	{
	
	dateFormat: 'dd-mm-yy',
	minDate: 0
	});
  } );
  </script>
  
<script>
  $( function() {
    $( "#datepickertravel3" ).datepicker(
	{
	
	dateFormat: 'dd-mm-yy',
	minDate: 0
	});
  } );
  </script>  
  
   




<script type="text/javascript">
	 $(document).ready(function(e) {
    $('#datepickertravel2').datepicker();
    $('#datepickertravel3').datepicker();

    $('#datepickertravel3').change(function() {
		//alert();
    var diff = $('#datepickertravel2').datepicker("getDate") - $('#datepickertravel3').datepicker("getDate");
    $('#diff').val(diff / (1000*60*60*24) * -1);
	
});
	 });
    
  </script>


<form method="post">

<div class="w3-main" style="margin-left:300px;margin-top:55px;">
 
          <center><b style="font-size:20px;">Travel Requisition</b></center><br>
          
        
          <p style="color:red;">*Note: This requisition has to be submitted atleast one week in advance to organize ticket.</p>
         <br>
          <table align="center" class="table-bordered" style="font-size:18px;">
          <tr>
          <td>Date:</td><td><input readonly style="border:hidden; width:225px; background-color:transparent;"  type="text" name="tatimeset" value="<?php
			date_default_timezone_set('Asia/Kolkata');
			$date = date('d/m/Y', time());
			echo $date;
		?>">
          
          </td>
          </tr>
          <tr>
          <td>Name:</td><td><input readonly  style="width:225px; border:hidden; background-color:transparent;" type="text" name="taleavename" value="<?php echo $_SESSION['lea']->username;?>"></td>
          </tr>
          <tr>
          <td>Empl. No.:</td><td><input  readonly  style="width:225px; border:hidden; background-color:transparent;" type="text" name="taleaveempno" value="<?php echo $_SESSION['lea']->emp_code; ?>"></td>
          </tr>
          <tr>
          <td>Department:</td><td><input  readonly name="taleavedept"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->userdepartment;?>"></td>
          </tr>
          <tr>
          <td>Shift:</td><td><input  readonly name="taleaveshift"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->shift;?>"></td>
          </tr>
          <tr>
          <td>Location:</td><td><input  readonly name="taleavelocation"  style="width:225px; border:hidden; background-color:transparent;" type="text" value="<?php echo $_SESSION['lea']->location;?>"></td>
          </tr>
          <tr>
          <td>Emergency Contact No.:</td><td><input type="text" required name="taleaveemercon" style="width:273px; border:hidden;" data-bvalidator="required"></td>
          </tr>
          <tr>
          <td>AGE:</td>
          <td><input type="number" name="taleaveage" style="width:273px; border:hidden;"></td>
          </tr>
          <tr>
          <td>Date:</td>
          <td>
          From:<input required  id="datepickertravel2" name="tadatefrom" style="width:225px; border:hidden;" type="text"><br><br>
              To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="datepickertravel3" required name="tadateto" style="width:225px; border:hidden;" type="text">          
          </td>
          </tr>
          <tr>
          <td>No. of days taken:</td><td>
         
		    <input type="text" id="diff" name="taleavedays">
       
          </td>
          </tr>
           <tr>
          <td>Venu</td><td>
        
		    <textarea name="taleavevenu" required > </textarea> 
          </td>
          </tr>
          
          
          <tr>
          <td>Purpose of Visit:</td><td><textarea required name="taleavereason" style="width:273px; height:100px;" data-bValidator="required"></textarea></td>
          </tr>
          <tr>
          <td>Mode of Journey (Please tick):</td>
          <td>
         
          <?php
          foreach($travel as $travel)
		  {
		  ?>
          <input type="checkbox" name="tachk[]"  value="<?php echo $travel['transport_mode'];?>"><?php echo $travel['transport_mode'];?><br>
          <?php
		  }
		  ?>
         
          
           </td>
          </tr>
          <tr hidden>
          <td>Status:</td><td><input readonly="" value="send" name="taleavestatus" ></td>
          </tr>
          </table> <br><br>
          <table align="center">
          <tr>
         <td> <input  type="submit" name="leavesubmitadmintravel" value="Submit"  class="form-control" style="width:100px; color:rgba(0,0,0,1.00); font-size:18px; font-family:'Arial Black', Arial;">  </td>
         <td> <input type="reset" name="reset" value="Reset" class="form-control" style="width:100px; color:rgba(0,0,0,1.00); font-size:18px; font-family:'Arial Black', Arial;" /></td>
         </tr>
         </table>
         <br>
         
  
    </div>
  </div>
  <hr/>

  
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
