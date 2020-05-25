<?php
include("header.php");

?>
<script type="text/javascript">
  function checkPasswordMatch() {
    //alert();
    var password = $("#txtNewPassword").val();
    //alert(password);
    var confirmPassword = $("#txtConfirmPassword").val();
   // alert(confirmPassword);

    if (password != confirmPassword)
    {
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    }
    else
    {
        $("#divCheckPasswordMatch").html("Passwords match.");
    }
}

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});
  
  
  
  </script>


<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>
        <form method="post" id="myform">
        <center><h3 style="margin-top:100px;">Change Password</h3></center>
      
        <table align="center" style="font-size:20px; margin-top:50px;">
        	<tr>
            	<th>
                	Enter Your Old Password
                </th>
            	<td>
                	<input type="hidden" name="passid1" id="ops2"  value="<?php echo $_SESSION['user']->username;?>"/>
                	<input type="password" name="oldpass1" id="ops1" data-bvalidator="alphanum,required" />
                </td>
            </tr>
            <tr>
            	<th>
                	Enter New Password 
                </th>
                <td>
                	<input type="password" name="pass11"  required="" id="txtNewPassword"/>
                </td>
            </tr>
            <tr>
            	<th>
                	Enter Confirm New Password
                </th>
                <td>
                	<input type="password" name="pass11"  required=""  id="txtConfirmPassword" onkeyup="checkPasswordMatch();" />
                     <div  id="divCheckPasswordMatch">
                </td>
            </tr>
            
        </table><br><br>
        <center><input class="btn btn-primary" type="submit" name="change_pass1" value="Change Password" style="background-color:#2196F3; font-weight:bold;" />  &nbsp; &nbsp;
<input class="btn btn-primary" type="button" style="background-color:#2196F3; font-weight:bold;" name="cancel" value="Cancel" onClick="window.location='admin.php';" /></center>
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
