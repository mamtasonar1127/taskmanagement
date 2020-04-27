<?php
include("headeruser.php");

?>
<form method="post">
<div class="w3-main" style="margin-left:616px; margin-top:54px;">

<table style="font-size:24px;" cellpadding="3">
<?php foreach($uedittask as $e)
{ ?>
<tr>
<td>Ticket No.:</td>
<td><input type="text" style="border:hidden; font-size:24px; background:url(images/bg.jpg);" readonly name="t1" required value="<?php echo $e['task_id'];?>"></td>
</tr>
<tr>
<td>Task Given By:</td>
<td><input type="text" style="border:hidden; width:294px; font-size:24px;  background:url(images/bg.jpg);" readonly name="t2" required value="<?php echo $e['taskuser'];?>"></td>
</tr>
<tr>
<td>Task Given On:</td>
<td><input type="text" id="gon" style="border:hidden; width:294px; font-size:24px;  background:url(images/bg.jpg);" readonly name="tskuseremail1" required value="<?php echo $e['taskgivendate'];?>"></td>
</tr>
<tr>
<td>Task Description:</td>
<td><textarea style="border:hidden; font-size:24px; background:url(images/bg.jpg);" readonly name="t3" required><?php echo $e['taskdesc'];?></textarea></td>
</tr>
<tr>
<td>Required By:</td>
<td><input readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" type="text" name="t4" required value="<?php echo $e['tcompdate'];?>"></td> 
</tr>
<tr>
<td>Comments:</td>
<td><textarea readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" name="t5" ><?php echo $e['tskcomments'];?></textarea></td>
</tr>
<tr>
<td>HOD Suggestions:</td>
<td><textarea readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" name="tadminin" ><?php echo $e['input_required'];?></textarea></td>
</tr>
<tr>
<td>Assign To.:</td>
<td>
<input readonly style="border:hidden; width:295px; font-size:24px; background:url(images/bg.jpg);" type="text" name="t6"  value="<?php echo $e['assignto'];?>">
</td>
</tr>
<tr>
<td>Commit date-time:</td>
<td><input readonly style="border:hidden; font-size:24px; background:url(images/bg.jpg);" type="text" name="t7"  value="<?php echo $e['commitdatetime'];?>"></td>
</tr>
<tr>
<td>Completed on:</td>
<td><input  style="font-size:24px; border:hidden;" type="text" class="dropdate" name="compdatead" required 
value="<?php 

	date_default_timezone_set('Asia/Kolkata');
	$date = date('d-m-Y', time());
	echo $date;

?>">
</td>
</tr>
<tr hidden>
<td>No. of Days Taken:</td>
<td><input  type="text" id="diff" name="differencedays"></td>
</tr>
<tr>

<td>Status:</td>
<td>
<select name="statusad" style="font-size:24px; width:250px;" required>
<option>Forward for Check-In</option>
</select>
</td>
</tr>

  



<?php
}
?>


</table>
<br />
<input type="submit" name="adminranking1" class="btn btn-primary" value="Update"/> &nbsp; &nbsp;
<input class="btn btn-primary" type="button" name="cancel" value="Cancel" onClick="window.location='home.php';" />


</form>





   
  </div>
  <hr/>

  
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
