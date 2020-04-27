<?php
include("header.php");

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
  <form method="post">
<center><h3>Update User</h3></center>
<table align="center" cellpadding="2" cellspacing="2" style="font-size:20px;">
<?php 
foreach($eee1 as $eee1)


 ?>
<tr hidden="">
<td>User No.</td>
<td><input readonly style="width:500px; border:hidden; background:url(images/bg.jpg);" type="text" value="<?php echo $eee1['log_id'];?>" name="log1"></td>
</tr>
						
<tr>
<td>Username:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['username'];?>" name="adduseruname1"></td>
</tr>
<tr>
<td>UserID:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['userid'];?>" name="adduserid1"></td>
</tr>
<tr>
<td>Email Id:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['email_id'];?>" name="adduserem1"></td>
</tr>
<tr>
<td>Contact No.:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['contact_no'];?>" name="addusercon1"></td>
</tr>
<tr>
<td>Shift:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['shift'];?>" name="addusershift1"></td>
</tr>
<tr>
<td>Emp Code:</td>
<td><input type="text" style="width:500px;" value="<?php echo $eee1['emp_code'];?>" name="addusercon1"></td>
</tr>

<tr>
<td>Category:</td>
<td>
<select name="addusercat1" style="width:500px;">
<option ><?php echo $eee1['usercategory'];?></option>
<option>
<?php
foreach($category as $category)
{
?>
<option><?php echo $category['category'];?></option>
<?php	
}
?>
</select>
</td>
</tr>

<tr>
<td>Department:</td>
<td>
<input type="text" name="adduserdept1" readonly="" style="width:500px; border: hidden; background-color: #F4F4F4;" value="<?php echo $eee1['userdepartment'];?>"/>
</td>
</tr>
<tr>
<td>Location:</td>
<td>
<input type="text" name="adduserlocation1" readonly="" style="width:500px; border: hidden; background-color: #F4F4F4;" value="<?php echo $eee1['location'];?>"/>

</td>
</tr>


</table>
<br>
<center><input type="submit" name="adduseredit" class="btn btn-primary" value="Update User"> &nbsp; &nbsp;
<input class="btn btn-primary" type="button" name="cancel" value="Cancel" onClick="window.location='viewusers.php';" /></center>
</form>

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
