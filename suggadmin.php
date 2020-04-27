<?php
include("header.php");
if(isset($_REQUEST['sugg']))
{
	$suggmsg=$_REQUEST['suggmsg'];
	$uname=$_REQUEST['uname'];
	$uemail=$_REQUEST['uemail'];
	
	$sqlsugg="INSERT INTO `tbl_suggestions`(`name`,`email`,`suggestion`) VALUES ('$uname','$uemail','$suggmsg')";
	$exsugg=$conn->query($sqlsugg);
	
	if($exsugg)
	{
		echo "<script>
		alert('Send Successfully');
		window.location.href='suggadmin.php';
		</script>";
		
	}
	else
	{
		echo "<script>
		alert('Error');
		
		</script>";
	}
	
}


?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

<div style="margin-top:70px;">
 <center><caption style="font-size:24px;">Write Your Suggestion!</caption></center> <br>
          <table align="center">
          <tr>
          <td>
          <textarea style="width:400px;height:200px;" name="suggmsg"></textarea>
          </td>
          </tr>
          </table>
          <br>
          <center><input type="submit" name="sugg" value="Send &raquo;" class="form-control" style="background-color:#2196F3; width:100px; font-size:large; font-weight:bold"></center>
          
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
