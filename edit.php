<?php
include("header.php");
$i=$_REQUEST['i'];
echo $i;
$ii=$_REQUEST['ii'];
echo $ii;


?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

  <div class="w3-row-padding w3-margin-bottom" style="margin-left: 300px;">
  
  <form method="post">
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
<select name="assigntoxx" id="mail" style="font-size:24px; width:336px;" required>
<option></option>
<?php
$i=$_REQUEST['i'];
echo $i;
$ii=$_REQUEST['ii'];
echo $ii;
$suser="select username from tbl_reg where userdepartment='$ii' and location='$i'";
echo $suser;
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
<td><input  type="text" id="datepickeredit" name="commitdatetimexx" required style="font-size:24px; width:209px;"></td>
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
  
  
  
  </form>
    
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
