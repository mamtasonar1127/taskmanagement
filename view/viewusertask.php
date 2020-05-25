<?php 
session_start();

include("controller.php");

if(!isset($_SESSION['user']))
{
	header("location:logout.php");
}

$u=$_SESSION['user']->email_id;



?>
<!DOCTYPE html>
<html>
<title>TMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
  <link rel="stylesheet" href="/resources/demos/style.css"/>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker(
	{
	
	dateFormat: 'dd-mm-yy',
	minDate: 0
	});
  } );
  </script>

<script language="javascript">
  $(document).ready(function(e) {
	  
	  $("#loading").hide();
	  
	  $('#myform').on('submit', function (e) {
      $("#loading").show();
	  $("#submit").fadeOut(1000);
	  $('html,body').animate(
			{
				scrollTop: $("#ok").offset().top
			},
				'slow');
	  
	  });
    
});
  
  </script>
  
  
  
  



<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>




<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-left"><img src="images/rotexlogo.jpe" width="100" height="35	"></span>
  <span class="w3-bar-item w3-right"><i class="fa fa-sign-out"></i><a href="">Logout</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;margin-top:-138px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <?php
	if($_SESSION['user']->profile_pic=='images/' || $_SESSION['user']->profile_pic=='')
	{
		echo "<img src='images/noimage.jpe' style='width: 71px;height: 69px;'>";
	}
	else
	{
    ?>
      <img src="<?php echo $_SESSION['user']->profile_pic;?>" class="w3-circle w3-margin-right" style="width: 71px;
    height: 69px;">
    <?php
	 }
	?>
    
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome<br> <strong><?php echo $_SESSION['user']->username;?></strong></span><br>
      <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>-->
     <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>-->
      <a href="changeprofileuser.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i><i style="font-size:9px;">Change Image</i></a>
    </div>
  </div>
  <hr>
  <!--<div class="w3-container">
    <h5>Dashboard</h5>
  </div>-->
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="home.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>Home</a>
   
     <a class="w3-bar-item w3-button" onclick="myAccordion('demo')" href="javascript:void(0)"><i class="fa fa-user fa-fw"></i>Manage&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo" class="w3-hide">
    
      <a class="w3-bar-item w3-button" href="homies.php">&nbsp;&nbsp;&nbsp;&nbsp;Add Task</a>
      <a class="w3-bar-item w3-button" href="view.php?uid=<?php echo $_SESSION['user']->username;?>">&nbsp;&nbsp;&nbsp;&nbsp;View Task</a>
      <a class="w3-bar-item w3-button" href="viewusertask.php?uidad=<?php echo $_SESSION['user']->username;?>">&nbsp;&nbsp;&nbsp;&nbsp;My Task</a>
      <a class="w3-bar-item w3-button" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Travel Requisition</a>
      <a class="w3-bar-item w3-button" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Short Leave</a>
      <a class="w3-bar-item w3-button" href="#">&nbsp;&nbsp;&nbsp;&nbsp;Long Leave</a>
      <a class="w3-bar-item w3-button" href="">&nbsp;&nbsp;&nbsp;&nbsp;Suggestion</a>
      <a class="w3-bar-item w3-button" href="">&nbsp;&nbsp;&nbsp;&nbsp;Message To MD</a>
    </div>
    
      
         
      <a class="w3-bar-item w3-button" onclick="myAccordion3('demo3')" href="javascript:void(0)"><i class="fa fa-pencil-square fa-fw"></i>Edit Profile&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo3" class="w3-hide">
      <a class="w3-bar-item w3-button" href="">&nbsp;&nbsp;&nbsp;&nbsp;Add Contact</a>
      <a class="w3-bar-item w3-button" href="">&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a>
      
    </div>
    
    
   
  </div>
 
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<div style="margin-top:180px;">
<table align="center" style="font-size:12px;" border="1">

<tr>
<th>Ticket No.</th>
<th>Task Given By</th>
<th>Task Description</th>
<th>Required By</th>
<th>Comments</th>
<th>HOD Suggestions</th>
<th>Assign To</th>
<th>Commited Date</th>
<th>Status</th>
<th>Completed On</th>
<th>Ratings</th>
<th>Ratings Comments</th>
<th>Actions</th>
</tr>

<?php
if($v->num_rows>0)
{
foreach($v as $a)
{
?>

    <tr>
    <td><?php echo $a['task_id'];?></td>
    <td><?php echo $a['taskuser'];?></td>
    <td><?php echo $a['taskdesc'];?></td>
    <td><?php echo $a['tcompdate'];?></td>
    <td><?php echo $a['tskcomments'];?></td>
    <td><?php echo $a['input_required'];?></td>
    <td><?php echo $a['assignto'];?></td>
    <td><?php echo $a['commitdatetime'];?></td>
    <td><?php echo $a['status'];?></td>
    <td><?php echo $a['workdoneon'];?></td>
    <td><?php echo $a['ratings'];?></td>
    <td><?php echo $a['ratingreasons'];?></td>
    <td>
    <?php 
	if($a['status']=='Assign' || $a['status']=='Reopen')
    {
	?>
		 <a href="usertskedit.php?uedit_id=<?php echo $a['task_id'];?>"><img src="images/download (2).png" width="25" height="25"></a>
     <?php
	}
	else
	{
		echo "Completed";
	}
    ?>
    
    </td>
    </tr>
<?php
}
}
else
{
	echo "<td colspan=12><center><h4>Task Not Assigned</h4></center></td>";
}
?>
</table>
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
