<?php
include("header.php");
$aa=$_SESSION['user']->userdepartment;
 $bb=$_SESSION['user']->location;
$sqlview="SELECT * FROM `tbl_reg` WHERE `userdepartment`='$aa' and `location`='$bb'"; 
$exview=$conn->query($sqlview);	


?>
<script language="javascript">
$(document).ready(function(e) {
    $("#srk1").keyup(function()
	{ 
	   //alert();
		$("#here1").show()
		var x=$(this).val();
		$.ajax(
		{
			type:"GET",
			url:"showdata1.php",
			data:"s1_id="+x,
			success: function(data)
			{
				$("#here1").html(data)
			}
		});
	});
		
});



</script>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    
  </header>

  <form method="post">
<div style="margin-top:20px;">
<center>Search:&nbsp;<input type="text" name="searchuser" id="srk1" placeholder=""></center><br>
<div id="here1">
<img src="images/downarrow.png" width="25" height="25" style="margin-top:10px; margin-left: 20px;"><input type="submit"  style="border:hidden; background-color:transparent; text-decoration:underline;" name="multi_delete" value="Delete All" /><br>

<div style="border:hidden; overflow:scroll; height:476px; width:990px; overflow-x:scroll; margin-left:20px;">
<table border="1">

<tr>
<th></th>
<th hidden="">User No.</th>
<th>User Name</th>
<th>User ID</th>
<th>User Email Address</th>
<th>Contact No.</th>
<th>Shift</th>
<th>Employee Code</th>
<th>Category</th>
<th>Department</th>
<th>Location</th>
<th colspan="2"><center>Action</center></th>

</tr>


<?php 
if($exview->num_rows>0)
{
while($resview=$exview->fetch_object())
{
?>
<tr>
<td><input type="checkbox" name="chk[]" value="<?php echo $resview->log_id;?>"></td>
<td hidden=""><?php echo $resview->log_id;?></td>
<td><?php echo $resview->username;?></td>
<td><?php echo $resview->userid;?></td>
<td><?php echo $resview->email_id;?></td>
<td><?php echo $resview->contact_no;?></td>
<td><?php echo $resview->shift;?></td>
<td><?php echo $resview->emp_code;?></td>
<td><?php echo $resview->usercategory;?></td>
<td><?php echo $resview->userdepartment;?></td>	
<td><?php echo $resview->location;?></td>
<td><a href="edituser.php?edituser_id=<?php echo $resview->log_id;?>"><img src="images/download (2).png" width="25" height="25"></a>
</td>
<td><a href="viewusers.php?deluser_id=<?php echo $resview->log_id;?>"><img src="images/delete.png" width="25" height="25"></a></td>

<?php /*?><td><?php echo $all->tcompdate;?></td>
<td><?php echo $all->tskcomments;?></td>
<td><?php echo $all->assignto;?></td>
<td><?php echo $all->commitdatetime;?></td>
<td><?php echo $all->status;?></td>
<td><a href="edit.php?edit_id=<?php echo $all->task_id;?>"><img src="images/edit.jpg" width="25" height="25"></a></td><?php */?>
</tr>
<?php
}
}
else
{
	echo "<td colspan=8><center><h4>No Users</h4></center></td>";
}
?>

</table>
</div>
<div style="margin-top:12px;">
<img src="images/leftuparrow.png" width="25" height="25" style="margin-top:-13px; margin-left: 20px;"><input type="submit"  style="border:hidden; background-color:transparent; text-decoration:underline;" name="multi_delete" value="Delete All" />
</div>
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
