<?php

session_start();


include("controller/controller.php");

?>
<!DOCTYPE html>
<html>
<title>Task Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>

body
{
	
	
}

.w3-bar-block .w3-bar-item
{
	padding:16px;font-weight:bold
}
</style>


<body>


<div class="w3-main">


<header class="w3-container w3-theme" style="padding:7px 19px;">
 <h2>Task Management System</h2>
</header>

<div class="w3-container" style="padding:32px;">
 <img src="images/b3.jpg" height="60" width="60" style="float: right;" >	
<form class="w3-container w3-card-4 w3-padding-16 w3-white" method="post" style="width:26.33333%; margin-left: 431px; margin-top: 70px;">     
        
        <label>Enter User ID:</label>
              <input type="text" class="w3-input" name="unid" autofocus>
            
            <br><br>
            <label>Enter Password:</label>
                <input type="password" name="pass" class="w3-input">
            
            <br><br>
            <button  style="background-color:#009688; width:114px; height:47px;" name="login" type="submit"><h5><b>Login <i ></i></b></h5></button>
            
      
      </form>
   <img src="images/b2.jpg" height="100" width="150" style="margin-top: -59px;">	
   <img src="images/b13.jpg" height="150" width="150" style="float: right;">	

</div>


     
</div>
<script>
// Open and close the sidebar on medium and small screens
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Change style of top container on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("myIntro").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("myIntro").classList.remove("w3-show-inline-block");
        document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
    }
}

// Accordions
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
</script>
     
</body>
</html> 