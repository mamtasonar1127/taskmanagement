<?php
include("header.php");

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-check-square w3-large"></i></div>
        <div class="w3-right">
          <h5><?php
         $dept=$_SESSION['user']->userdepartment;  
        $sqlleave="SELECT COUNT(`leave_id`) as a FROM `tbl_leave` WHERE `status`='' and `department`='$dept'";
         $exleave=$conn->query($sqlleave);
         $resleave=$exleave->fetch_object();
         echo $resleave->a;
          
          ?></h5>
        </div>
        <div class="w3-clear"></div>
        <h5>Leave Approval Request</h5>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-dropbox w3-large"></i></div>
        <div class="w3-right">
          <h5><?php
          $dept1=$_SESSION['user']->userdepartment;
          $sqlntr="SELECT COUNT( `task_id`) AS b FROM `tbl_taskdata` WHERE `taskdepartment`='$dept1' and `assignto`=''";
          $exntr=$conn->query($sqlntr);
          $resntr=$exntr->fetch_object();
          echo $resntr->b;
          
          
           ?></h5>
        </div>
        <div class="w3-clear"></div>
        <h5>New Task Request</h5>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-check w3-large"></i></div>
        <div class="w3-right">
          <h5><?php
          $dept2=$_SESSION['user']->userdepartment;
          $sqlttd="SELECT count(`task_id`) AS c FROM `tbl_taskdata` WHERE `taskdepartment`='$dept2 ' and `status`='Complete'";
          $exttd=$conn->query($sqlttd);
          $resttd=$exttd->fetch_object();
          echo $resttd->c;
          
           ?></h5>
        </div>
        <div class="w3-clear"></div>
        <h5>Total Task Done</h5>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-hourglass w3-large"></i></div>
        <div class="w3-right">
          <h5><?php 
          $tskname=$_SESSION['user']->username;
          $sqlttp="SELECT count(`task_id`) AS e FROM `tbl_taskdata` WHERE `taskuser`='$tskname' and `status`='Assign' or `status`='Reopen'"; 
          $exttp=$conn->query($sqlttp);
          $resttp=$exttp->fetch_object();
          echo $resttp->e; 
          
          ?></h5>
        </div>
        <div class="w3-clear"></div>
        <h5>Your Pending Task</h5>
      </div>
    </div>
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
