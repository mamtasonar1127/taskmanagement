        <?php
include("headeruser.php");

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
  <form method="post"> 
  <input hidden="" type="text" name="taskuname" readonly style=" border:hidden; color:rgba(11,189,3,1.00); background-color:rgba(255,255,255,1.00);font-size:16px; float:right; width:255px;" value="<?php
	echo strtoupper($_SESSION['user']->username);
?>"/>	 
<input hidden="" type="text" name="addtaskmail" readonly style=" border:hidden; color:rgba(11,189,3,1.00); background-color:rgba(255,255,255,1.00);font-size:16px; float:right; width:255px;" value="<?php
	echo ($_SESSION['user']->email_id);
?>"/>
  <div id="tas" style="margin-left:124px; margin-top:50px;">
<center><h3>Add Task</h3></center>
<table style="font-size:24px;" cellpadding="3">
<tr>
<td>Task Description:</td>
<td><textarea name="tskdesc" required style="width:500px; height:80px; font-size:24px;"></textarea></td>
</tr>
<tr>
<td>Given on(Date):</td>
<td><input readonly type="text" name="dedate" style="width: 264px; border:hidden; background-color:rgba(241,239,239,1.00);" value="
<?php 

	date_default_timezone_set('Asia/Kolkata');
	$date = date('d/m/Y', time());
	echo $date;

?>



"></td>


</tr>
<tr>
<td>Given To Location:</td>
<td>
<select name="loc" style="font-size:24px; width:336px;">
<option></option>
<?php
foreach($location as $ul)
{
?>

<option value="<?php echo $ul['location'];?>"><?php echo $ul['location'];?></option>
<?php } ?>
</select>

</td>
</tr>
<tr>
<td>Given To Department:</td>
<td>
<select name="dept" style="font-size:24px; width:336px;">
<option></option>
<?php
foreach($dept as $uldept)
{
?>

<option value="<?php echo $uldept['department'];?>"><?php echo $uldept['department'];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>	
<td>Required By:</td>
<td><input type="text" id="datepicker1" name="compdate" style="width:500px; height:30px; font-size:24px;" required></td>
</tr>
<tr>
<td>Comments:</td>
<td><textarea name="tskcomments" style="width:500px; height:80px; font-size:24px;" required></textarea></td>
</tr>
</table>
<br />
<input type="submit" style="background-color:#2196F3; font-weight: bold;" name="addtask" class="btn btn-primary" value="Add Task"/> &nbsp; &nbsp;
<input class="btn btn-primary" style="background-color:#2196F3; font-weight: bold;" type="button" name="cancel" value="Cancel" onClick="window.location='home.php';" />

    </div>
</form>
  
  
  
  
  
  
  
  
  
  
  
  
  

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
