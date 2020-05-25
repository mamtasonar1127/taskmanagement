<?php
include("header.php");

?>
<style>
input[type='text']
{
    
    width:600px;
}

</style>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

 <form method="post">
 <center><h3>ADD USER</h3></center>
<table align="center" cellpadding="2" cellspacing="2" style="font-size:20px; margin-top:10px;">
<tr>
<td>Username</td>
<td><input type="text" name="adduseruname" required></td>
</tr>
<tr>
<td>User ID<br>
</td>
<td><input type="text" name="adduseruserid" required></td>
</tr>

<tr>
<td>Password</td>
<td><input type="text" name="adduserpass" required></td>
</tr>
<tr>                                                             
<td>Email Address:</td>
<td><input type="text" name="adduseremail" required></td>
</tr>
<tr>
<td>Category</td>
<td>
<select name="addusercategory" required>
<option></option>
<?php foreach($category as $category)
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
<td>Department</td>
<td>
<input type="text" readonly="" style="border: hidden; background-color:#F4F4F4;" value="<?php echo $_SESSION['user']->userdepartment;?>" name="adduserdepartment"/>
</td>
</tr>


<tr>
<td>Location</td>
<td>
<input type="text" readonly="" style="border: hidden; background-color:#F4F4F4;" value="<?php echo $_SESSION['user']->location;?>" name="adduserlocation"/>
</td>
</tr>
<tr>
<td>Contact No.</td>
<td><input type="text" name="addusercontact"></td>
</tr>

<tr>
<td>Shift</td>
<td><input type="text" name="addusershift"></td>
</tr>

<tr>
<td>Emp Code</td>
<td><input type="text" name="adduserempcode"></td>
</tr>



</table>
<br>
<center><input type="submit" name="adduser" class="btn btn-primary" style="background-color:#2196F3; border: hidden; font-weight: bold;" value="Add User">
 &nbsp; &nbsp;
<input class="btn btn-primary" type="button" name="cancel" value="Cancel" style="background-color:#2196F3; border: hidden; font-weight: bold;" onClick="window.location='admin.php';" /></center>


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
