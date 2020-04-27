  <?php
include("headeruser.php");

?>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>


   <div class="w3-twothird"  style="margin-left: 170px; margin-top: 25px;">
        <h5 style="font-family: monospace;">Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-dropbox w3-text-blue w3-large"></i></td>
            <td>Your New Task Request</td>
            <td><i><?php
          $dept1=$_SESSION['user']->userdepartment;
          $usname=$_SESSION['user']->username;
          $sqlntr1="SELECT COUNT( `task_id`) AS b FROM `tbl_taskdata` WHERE `taskdepartment`='$dept1' and `assignto`='$usname' and `status`=''";
          $exntr1=$conn->query($sqlntr1);
          $resntr1=$exntr1->fetch_object();
          echo $resntr1->b;
          
          
           ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-check w3-text-red w3-large"></i></td>
            <td>Your Total Task Done</td>
            <td><i><?php
          $usname1=$_SESSION['user']->username;
          $sqlttd2="SELECT count(`task_id`) AS c FROM `tbl_taskdata` WHERE `assignto`='$usname1' and `status`='Complete'";
          $exttd2=$conn->query($sqlttd2);
          $resttd2=$exttd2->fetch_object();
          echo $resttd2->c;
          
           ?></i></td>
          </tr>
          <tr>  
            <td><i class="fa fa-refresh w3-text-green w3-large"></i></td>
            <td>Your Reopened Task</td>
            <td><i><?php 
          $usname2=$_SESSION['user']->username;
          $sqlttp3="SELECT count(`task_id`) AS e FROM `tbl_taskdata` WHERE `assignto`='$usname2' and `status`='Reopen'"; 
          $exttp3=$conn->query($sqlttp3);
          $resttp3=$exttp3->fetch_object();
          echo $resttp3->e; 
          
          ?></i></td>
          </tr>
          
          <tr>
            <td><i class="fa fa-pencil w3-text-cyan w3-large"></i></td>
            <td>Task Given By You</td>
            <td><i><?php 
          $usname3=$_SESSION['user']->username;
          $sqlttp4="SELECT count(`task_id`) AS e FROM `tbl_taskdata` WHERE `taskuser`='$usname3'"; 
          $exttp4=$conn->query($sqlttp4);
          $resttp4=$exttp4->fetch_object();
          echo $resttp4->e; 
          
          ?></i></td>
          </tr>
          
          
          
        </table>
      </div>
    </div>
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
