<?php 
session_start();

include("controller.php");

if(!isset($_SESSION['user']))
{
	header("location:logout.php");
}

$u=$_SESSION['user']->email_id;
//echo $u;

$s="select location,userdepartment,profile_pic from tbl_reg where email_id='$u'";
$e=$conn->query($s);
$rt=$e->fetch_object();
$_SESSION['mm']=$rt;



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
    $( "#datepicker" ).datepicker(
	{
	
	dateFormat: 'dd-mm-yy',
	minDate: 0
	});
  } );
  </script>
  
<script>
  $( function() {
    $( "#datepickeredit" ).datepicker(
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
  
 <script language="javascript">
	$(document).ready(function() {
        $("#mail").change(function() {
            x=$("#mail").val();
			
			$.ajax(
			{
			
			type:"post",
			url:"controller.php",
			data:"email_sq_id="+x,
			success:function(data)
			{
				//alert(x);
				$("#sq").val(data)
			}
			
			}
		)
        });
    });

</script> 
  
  



<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>




<body class="w3-light-grey" style="background-image: url('images/.jpg');">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-left"><img src="images/rotexlogo.jpe" width="100" height="35	"></span>
  <span class="w3-bar-item w3-right"><i class="fa fa-sign-out"></i><a href="logout.php">Logout</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:267px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
    <?php
	if($_SESSION['mm']->profile_pic=='images/' || $_SESSION['mm']->profile_pic=='')
	{
		echo "<img src='images/noimage.jpe' style='width: 71px;height: 69px;'>";
	}
	else
	{
    ?>
      <img src="<?php echo $_SESSION['mm']->profile_pic;?>" class="w3-circle w3-margin-right" style="width: 71px;
    height: 69px;">
    <?php
	 }
	?>
    
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome<br> <strong><?php echo $_SESSION['user']->username;?></strong></span><br>
      <!--<a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>-->
     <!-- <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>-->
      <a href="changeprofile.php" class="w3-bar-item w3-button"><i class="fa fa-cog"></i><i style="font-size:9px;">Change Image</i></a>
    </div>
  </div>
  <hr>
  <!--<div class="w3-container">
    <h5>Dashboard</h5>
  </div>-->
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="admin.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-home fa-fw"></i>Home</a>
    <a class="w3-bar-item w3-button" href="list.php?t=<?php echo $_SESSION['mm']->location;?>&l=<?php echo $_SESSION['mm']->userdepartment;?>"><i class="fa fa-book fa-fw"></i>Assign Task</a>
     <a class="w3-bar-item w3-button" onclick="myAccordion('demo')" href="javascript:void(0)"><i class="fa fa-user fa-fw"></i>Manage&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo" class="w3-hide">
    
      <a class="w3-bar-item w3-button" href="addtaskadmin.php">&nbsp;&nbsp;&nbsp;&nbsp;Add Task</a>
      <a class="w3-bar-item w3-button" href="viewadminmembertask.php?uidaduser=<?php echo $_SESSION['user']->		username;?>">&nbsp;&nbsp;&nbsp;&nbsp;View Task</a>
      <a class="w3-bar-item w3-button" href="viewadmintask.php?uidad=<?php echo $_SESSION['user']->username;?>">&nbsp;&nbsp;&nbsp;&nbsp;My Task</a>
      <a class="w3-bar-item w3-button" href="travelradmin.php">&nbsp;&nbsp;&nbsp;&nbsp;Travel Requisition</a>
      <a class="w3-bar-item w3-button" href="shortleave.php">&nbsp;&nbsp;&nbsp;&nbsp;Short Leave</a>
      <a class="w3-bar-item w3-button" href="longleave.php">&nbsp;&nbsp;&nbsp;&nbsp;Long Leave</a>
      <a class="w3-bar-item w3-button" href="suggadmin.php">&nbsp;&nbsp;&nbsp;&nbsp;Suggestion</a>
      <a class="w3-bar-item w3-button" href="mdformadmin.php">&nbsp;&nbsp;&nbsp;&nbsp;Message To MD</a>
    </div>
    
      <a class="w3-bar-item w3-button" onclick="myAccordion1('demo1')" href="javascript:void(0)"><i class="fa fa-check-square fa-fw"></i>Leave Approvals&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo1" class="w3-hide">
      <a class="w3-bar-item w3-button" href="sll.php">&nbsp;&nbsp;&nbsp;&nbsp;Approve Short/Long Leave</a>
      
      <a class="w3-bar-item w3-button" href="travelleave.php">&nbsp;&nbsp;&nbsp;&nbsp;Approve Travel Leave</a>
 </div>
     <a class="w3-bar-item w3-button" onclick="myAccordion2('demo2')" href="javascript:void(0)"><i class="fa fa-user fa-fw"></i>Manage Users&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo2" class="w3-hide">
      <a class="w3-bar-item w3-button" href="adduser.php">&nbsp;&nbsp;&nbsp;&nbsp;Add User</a>
      <a class="w3-bar-item w3-button" href="viewusers.php">&nbsp;&nbsp;&nbsp;&nbsp;View User</a>
      
    </div>
    
      <a class="w3-bar-item w3-button" onclick="myAccordion3('demo3')" href="javascript:void(0)"><i class="fa fa-pencil-square fa-fw"></i>Edit Profile&nbsp;<i class="fa fa-caret-down"></i></a>
    <div id="demo3" class="w3-hide">
      <a class="w3-bar-item w3-button" href="addcontact.php">&nbsp;&nbsp;&nbsp;&nbsp;Add Contact</a>
      <a class="w3-bar-item w3-button" href="adminchangepass.php">&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a>
      
    </div>
    
    
   
  </div>
 
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
