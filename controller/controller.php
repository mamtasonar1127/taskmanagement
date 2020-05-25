<?php

include("model\model.php");
include('PHPMailer/PHPMailerAutoload.php');

 $model=new model;


 $location=$model->select_all1($conn,"tbl_location");
 $dept=$model->select_all1($conn,"tbl_department");
 $travel=$model->select_all1($conn,"tbl_transportmode");
 $mdmessage=$model->select_all1($conn,"tbl_mdform");

$all=$model->select_all($conn,"tbl_taskdata");
	
$allexcel=$model->select_allexcel($conn,"tbl_taskdata");

//$assigne=$model->select_all2($conn,"tbl_reg");
$userlist=$model->select_whereuser($conn,"tbl_reg");
//$d=$model->select_reminder($conn);

 
               






///////////////////////////////////////////delete multi users/////////////////////////////////////
if(isset($_REQUEST['multi_delete']))
{
	
	$chk=$_REQUEST['chk'];
	foreach($chk as $val)
	{
	$where=array("log_id"=>$val);
	$ex=$model->delete($conn,"tbl_reg",$where);
	}
	echo "deleted";
	header("location:viewusers.php");
}
/////////////////////////////////////////////delete multi task//////////////////////////////////
if(isset($_REQUEST['multi_deletetsk']))
{
	$chk1=$_REQUEST['chk1'];
	foreach($chk1 as $val1)
	{
	$where=array("task_id"=>$val1);
	$ex=$model->delete($conn,"tbl_taskdata",$where);
	}
	echo "deleted";
	header("location:list.php");
}

/////////////////////////////////////////////delete user//////////////////////////////////////////
if(isset($_REQUEST['deluser_id']))
{
	$did1=$_REQUEST['deluser_id'];
	$where=array("log_id"=>$did1);
	$del1=$model->delete($conn,"tbl_reg",$where);
	if($del1)
	{
		echo "<script>
        alert('User Deleted');
        window.location.href='viewusers.php';
        </script>";
		//header("location:viewusers.php");
	}
	else
	{
			echo "<script>
        alert('ERROR');
        window.location.href='viewusers.php';
        </script>";
	}
}
/////////////////////////////////////////////delete task//////////////////////////////////////////
if(isset($_REQUEST['del_id']))
{
	$did=$_REQUEST['del_id'];
	$where=array("task_id"=>$did);
	$del=$model->delete($conn,"tbl_taskdata",$where);
	if($del)
	{
		echo "deleted";
		header("location:list.php");
	}
	else
	{
		echo "error";
	}
}




if(isset($_GET['s_id']))
{
	 $se=$_GET['s_id'];
	
	//$where=array("firstname"=>$se);
	$sea=$model->search($conn,"tbl_taskdata",$se);
}



if(isset($_REQUEST['aaddtask']))
{
	$adminaddtask=$_REQUEST['adminaddtask']; 
	$atskdesc=$_REQUEST['atskdesc'];
	$acompdate=$_REQUEST['acompdate'];
	$atskcomments=$_REQUEST['atskcomments'];
	
		
	$data=array(
	"taskuser"=>$adminaddtask,
	"taskdesc"=>$atskdesc,
	"tcompdate"=>$acompdate,
	"tskcomments"=>$atskcomments,
	
	);
	
	$table="tbl_taskdata";
	
	
	$insadmin=$model->insert($conn,$table,$data);
	
	if($insadmin)
	{
		echo "Task Added Successfully....";
		header("location:list.php");
		exit;
	}
	else
	{
		echo "Error";
	}
}



/////////////////////////////////////////mail///////////////////////////////////////////////////////////////////////

	
///////////////////////////////////////////user added by admin//////////////////////////////////////////////////////

if(isset($_REQUEST['adduser']))
{
	     
	$adduseruname=$_REQUEST['adduseruname']; 
	$adduseruserid=$_REQUEST['adduseruserid'];
	$adduserpass=$_REQUEST['adduserpass'];
	$adduseremail=$_REQUEST['adduseremail'];
	$addusercategory=$_REQUEST['addusercategory'];
	$adduserdepartment=$_REQUEST['adduserdepartment'];
	$adduserlocation=$_REQUEST['adduserlocation'];
	$addusercontact=$_REQUEST['addusercontact'];
    $addusershift=$_REQUEST['addusershift'];
    $adduserempcode=$_REQUEST['adduserempcode'];
	
		
	$data=array(
	"username"=>$adduseruname,
	"userid"=>$adduseruserid,
	"password"=>$adduserpass,
	"usercategory"=>$addusercategory,
	"location"=>$adduserlocation,
	"email_id"=>$adduseremail,
	"userdepartment"=>$adduserdepartment,
	"contact_no"=>$addusercontact,
    "shift"=>$addusershift,
    "emp_code"=>$adduserempcode,	
	);
	
	$table="tbl_reg";
	
	
	$insadduser=$model->insert1($conn,$table,$data);
	
	if($insadduser)
	{
		/*echo "Added Successfully....";
		header("location:viewusers.php");*/
		
		echo "<script>
		
		alert('User Added Successfully');
		window.location.href='viewusers.php';
		</script>";
		
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');

$mail->addAddress($adduseremail);
//$mail->addAddress('mumusonar@gmail.com');


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Your Login Information</h3></caption>
				<table border="1">
				<tr>
				<td><b>Username:</b></td>
				<td>'.$adduseruname.'</td>
				</tr>
				<tr>
				<td><b>User ID:</b></td>
				<td>'.$adduseruserid.'</td>
				</tr>
				<tr>
				<td><b>Password:</b></td>
				<td>'.$adduserpass.'</td>
				</tr>
				 <tr>
				<td><b>Category:</b></td>
				<td> 
				'.$addusercategory.'
				</td>
				</tr>
				 <tr>
				<td><b>Location:</b></td>
				<td> 
				'.$adduserlocation.'
				</td>
				</tr>
				<tr>
				<td><b>Department:</b></td>
				<td> 
				'.$adduserdepartment.'
				</td>
				</tr>
				<tr>
				<td><b>Contact Number:</b></td>
				<td> 
				'.$addusercontact.'
				</td>
				</tr>
				
				
				
				</table>';
$bodyContent .= '';

$mail->Subject = 'User Data';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>User Added Successfully</h4></center>';
}
			
		exit;
	}
	else
	{
		echo "<script>    
		alert('Error');
		</script>";
	}
	
	
}
//////////////////////////////////////////////////add task by user/////////////////////////////////////////////////

if(isset($_REQUEST['addtask']))
{
	$taskuname=$_REQUEST['taskuname']; 
	$tskdesc=$_REQUEST['tskdesc'];
	$compdate=$_REQUEST['compdate'];
	$tskcom=$_REQUEST['tskcomments'];
	$addtaskmail=$_REQUEST['addtaskmail'];
	$dedate=$_REQUEST['dedate'];
	//$detime=$_REQUEST['detime'];
	$loc=$_REQUEST['loc'];
	$dept=$_REQUEST['dept'];
	
	date_default_timezone_set('Asia/Kolkata');
	$date = date('h:i:s a', time());
	//echo $date;
	
		
	$data=array(
	"taskuser"=>$taskuname,
	"taskdesc"=>$tskdesc,
	"tcompdate"=>$compdate,
	"tskcomments"=>$tskcom,
	"email"=>$addtaskmail,
	"taskgivendate"=>$dedate,
	"taskgiventime"=>$date,
	"tasklocation"=>$loc,
	"taskdepartment"=>$dept
	);
	
	$table="tbl_taskdata";
	
	
	$ins=$model->insert($conn,$table,$data);
	
	if($ins)
	{
		  $sqlut="select email_id from tbl_reg where `userdepartment`='$dept' and `usercategory`='ADMIN' and `location`='$loc'";
	      $exut=$conn->query($sqlut);
		
		echo "<script>
		
		alert('Task Added Successfully');
		window.location.href='home.php';
		</script>";
		
		
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'mamta.georgian@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = '9033418996';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('mamta.georgian@gmail.com@gmail.com','Rotex TMS');

while($resut=$exut->fetch_object())
{
$mail->addAddress($resut->email_id);
}

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>User Task Data</h3></caption>	 
				<table border="1">
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$taskuname.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$tskdesc.'</td>
				</tr>
				<tr>
				<td><b>Task Given On Date:</b></td>
				<td>'.$dedate.'</td>
				</tr>
				<tr>
				<td><b>Task Given At(Time):</b></td>
				<td>'.$date.'</td>
				</tr>
				<tr>
				<td><b>Given To(Location):</b></td>
				<td>'.$loc.'</td>
				</tr>
				<tr>
				<td><b>Given To(Department):</b></td>
				<td>'.$dept.'</td>
				</tr>
				<tr>
				<td><b>Required By:</b></td>
				<td>'.$compdate.'</td>
				</tr>
				 <tr>
				<td><b>Comments:</b></td>
				<td> '.$tskcom.'
				</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'Task Allocated Data';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}	
	exit;
	}
	else
	{
		echo "Error";
	}
	
	
}
////////////////////////////////////////////////status updated by admin/////////////////////////////////////////////

if(isset($_REQUEST['assupdate']))
{
	$a1=$_REQUEST['tskno1'];
	$g1=$_REQUEST['tskstatus1'];
	$h1=$_REQUEST['workdone'];
		
	$data=array(
	
	"status"=>$g1,
	"workdoneon"=>$h1,
	
	);
	$table="tbl_taskdata";
	$where=array("task_id"=>$a1);
	
	$update1=$model->update($conn,$table,$data,$where);
	
	if($update1)
	{
		/*echo "done";
		header("location:assignee.php");*/
		echo "<script>
		
		alert('Work Updated');
		window.location.href='assignee.php';
		</script>";
		
	}
	else
	{
		echo "Update Error";
	}
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['rankingupdate3']))
{
	$t11=$_REQUEST['tskno3'];
	$t18=$_REQUEST['tskuserr'];
	$t12=$_REQUEST['tskdesc2r'];
	$t13=$_REQUEST['compdate2r'];
	$t14=$_REQUEST['tskcomments2r'];
	$t15=$_REQUEST['assignto2r'];
	$t16=$_REQUEST['ucommitdatetime2r'];
	$t17=$_REQUEST['ustatus2r'];
	$t19=$_REQUEST['sss'];
	$t20=$_REQUEST['em2r'];
	
	
	
	$a11=$_REQUEST['ranking3'];
	$g11=$_REQUEST['rankingcomments3'];
	
	
		
	$data=array(
	
	"ratings"=>$a11,
	"ratingreasons"=>$g11,
	
	);
	$table="tbl_taskdata";
	$where=array("task_id"=>$t11);
	
	$update11=$model->update($conn,$table,$data,$where);
	
	if($update11)
	{
		echo "<script>
		alert('Ranking Updated Successfully');
		window.location.href='list.php';
		</script>";
		//header("location:list.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($t19);
$mail->addAddress($t20);
//$mail->addCC('mamtasonar1127@gmail.com');

$mail->isHTML(true);  // Set email format to HTML



$bodyContent = '<caption><h3>Task Ticket</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$t11.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$t18.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$t12.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$t13.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$t14.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$t15.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$t16.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$t17.'</td>
				</tr>
				<tr>
				<td><b>Ranking:</b></td>
				<td>'.$a11.'</td>
				</tr>
				<tr>
				<td><b>Ranking Comments:</b></td>
				<td>'.$g11.'</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'Ranking Update';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
		
	exit;
	}
	else
	{
		echo "Update Error";
	}
	
}

/////////////////////////////////////////////////////complete updated by admin/////////////////////////////////////
if(isset($_REQUEST['adminranking']))
{
	$aad=$_REQUEST['t1'];
	$t2=$_REQUEST['t2'];
	$t3=$_REQUEST['t3'];
	$t4=$_REQUEST['t4'];
	$t5=$_REQUEST['t5'];
	$t6=$_REQUEST['t6'];
	$t7=$_REQUEST['t7'];
	$bad=$_REQUEST['statusad'];
	$cad=$_REQUEST['compdatead'];
	echo  $cad;
	$dad=$_REQUEST['completionup'];
	
	$tskuseremail1=$_REQUEST['tskuseremail1'];
	echo $tskuseremail1;
	
	$tt1=$_REQUEST['tt1'];
	echo $tt1;
	
	date_default_timezone_set('Asia/Kolkata');
	$date = date('h:i:s a', time());
	
	
	$diff = abs(strtotime($cad) - strtotime($tt1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d years, %d months, %d days\n", $years, $months, $days);
		
	$data=array(
	
	"status"=>$bad,
	"workdoneon"=>$cad,
	"daystaken"=>$months.' '.'months'.' '.$days.' '.'days',
	"completiontime"=>$date,
	
	);
	
	$table="tbl_taskdata";
	$where=array("task_id"=>$aad);
	
	$update=$model->update($conn,$table,$data,$where);
	
	if($update)
	{
		echo "<script>
		alert('Work Updated Successfully');
		window.location.href='admin.php';
		</script>";
		//header("location:admin.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($dad);
$mail->addAddress($tskuseremail1);
//$mail->addAddress('satish@rotexautomation.com');
//$mail->addAddress($j);
//$mail->addCC('mamtasonar1127@gmail.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Task Complete Confirmation</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$aad.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$t2.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$t3.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$t4.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$t5.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$t6.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$t7.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$bad.'</td>
				</tr>
				<tr>
				<td><b>Completed On:</b></td>
				<td>'.$cad.'</td>
				</tr>
				
				</table>
				<br>
				
				<a href="http://192.168.12.18:81/tms/">Please click here for rating</a>
				
				'
				
				
				;
$bodyContent .= '';

$mail->Subject = 'Task Complete Confirmation';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
	exit;
		
	}
	
	else
	{
		echo "Update Error";
	}
	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['adminranking1'])) 
{
	$aad=$_REQUEST['t1'];
	$t2=$_REQUEST['t2'];
	$t3=$_REQUEST['t3'];
	$t4=$_REQUEST['t4'];
	$t5=$_REQUEST['t5'];
	$t6=$_REQUEST['t6'];
	$t7=$_REQUEST['t7'];
	$bad=$_REQUEST['statusad'];
	//echo $cad;
	$dad=$_REQUEST['completionup'];
	$tskuseremail1=$_REQUEST['tskuseremail1'];
	echo  $tskuseremail1;
	$cad=$_REQUEST['compdatead'];
	echo  $cad;
	
	date_default_timezone_set('Asia/Kolkata');
	$date = date('h:i:s a', time());
	

$diff = abs(strtotime($cad) - strtotime($tskuseremail1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d years, %d months, %d days\n", $years, $months, $days);

	if($months==0)
	{
			$data=array(
	
	"status"=>$bad,
	"workdoneon"=>$cad,
	"daystaken"=>$days.''.'day/s',
	"completiontime"=>$date,
	);
	
	$table="tbl_taskdata";
	$where=array("task_id"=>$aad);
	
	$update=$model->update($conn,$table,$data,$where);
	
	if($update)
	{
		echo "<script>
		alert('Work Updated Successfully');
		window.location.href='home.php';
		</script>";
		//header("location:admin.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($dad);
$mail->addAddress($tskuseremail1);
//$mail->addAddress('satish@rotexautomation.com');
//$mail->addAddress($j);
//$mail->addCC('mamtasonar1127@gmail.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Task Complete Confirmation</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$aad.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$t2.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$t3.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$t4.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$t5.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$t6.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$t7.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$bad.'</td>
				</tr>
				<tr>
				<td><b>Completed On:</b></td>
				<td>'.$cad.'</td>
				</tr>
				
				</table>
				<br>
				
				<a href="http://192.168.12.18:81/tms/">Please click here for rating</a>';
$bodyContent .= '';

$mail->Subject = 'Task Complete Confirmation';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
	exit;
		
	}
	
	else
	{
		echo "Update Error";
	}
	
		
		
		
		
	}
	 else
	 {
	 	
	 	$data=array(
	
	"status"=>$bad,
	"workdoneon"=>$cad,
	"daystaken"=>$months.' '.'months'.' '.$days.' '.'days',
	"completiontime"=>$date,
	
	
	);
	
	$table="tbl_taskdata";
	$where=array("task_id"=>$aad);
	
	$update=$model->update($conn,$table,$data,$where);
	
	if($update)
	{
		echo "<script>
		alert('Work Updated Successfully');
		window.location.href='home.php';
		</script>";
		//header("location:admin.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($dad);
$mail->addAddress($tskuseremail1);
//$mail->addAddress('satish@rotexautomation.com');
//$mail->addAddress($j);
//$mail->addCC('mamtasonar1127@gmail.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Task Complete Confirmation</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$aad.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$t2.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$t3.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$t4.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$t5.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$t6.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$t7.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$bad.'</td>
				</tr>
				<tr>
				<td><b>Completed On:</b></td>
				<td>'.$cad.'</td>
				</tr>
				
				</table>
				<br>
				
				<a href="http://192.168.12.18:81/tms/">Please click here for rating</a>';
$bodyContent .= '';

$mail->Subject = 'Task Complete Confirmation';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
	exit;
		
	}
	
	else
	{
		echo "Update Error";
	}
	
	 	
	 	
	 }
	
	
	
	
	


}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['adduseredit']))
{
	   
	$zz=$_REQUEST['adduseruname1'];
	$zz2=$_REQUEST['addusercat1'];
	$zz3=$_REQUEST['adduserlocation1'];
	$zz4=$_REQUEST['log1'];
	$zz5=$_REQUEST['adduserem1'];
	$zz6=$_REQUEST['addusercon1'];
	$zz7=$_REQUEST['adduserdept1'];
	$zz8=$_REQUEST['adduserid1'];
	
		
	$data=array(
	
	"username"=>$zz,
	"usercategory"=>$zz2,
	"location"=>$zz3,
	"email_id"=>$zz5,
	"contact_no"=>$zz6,
	"userdepartment"=>$zz7,
	"userid"=>$zz8,
	
	);
	
	$table="tbl_reg";
	$where=array("log_id"=>$zz4);
	
	$updatez=$model->update($conn,$table,$data,$where);
	
	if($updatez)
	{
		echo "<script>
			alert('Updated Successfully');
			window.location.href='viewusers.php';
			</script>";
		//header("location:viewusers.php");
	}
	else
	{
		echo "<script>
			alert('Updated Error');
			window.location.href='edituser.php';
			</script>";
	}
	
}





////////////////////////////////////////////////////////ranking updated by user/////////////////////////////////////

if(isset($_REQUEST['rankingupdate']))
{
	$a2=$_REQUEST['tskno2'];
	$aa2=$_REQUEST['tskuser2'];
	$b2=$_REQUEST['tskdesc2'];
	$c2=$_REQUEST['compdate2'];
	$d2=$_REQUEST['tskcomments2'];
	$e2=$_REQUEST['assignto2'];
	$f2=$_REQUEST['ucommitdatetime2'];
	$g2=$_REQUEST['ustatus2'];
	$h2=$_REQUEST['ranking2'];
	$i2=$_REQUEST['rankingcomments2'];
	$emass=$_REQUEST['emass'];
	$rankem=$_REQUEST['rankem'];
	
	
		
	$data=array(
	"task_id"=>$a2,
	"taskuser"=>$aa2,
	"taskdesc"=>$b2,
	"tcompdate"=>$c2,
	"tskcomments"=>$d2,
	"assignto"=>$e2,
	"commitdatetime"=>$f2,
	"status"=>$g2,
	"ratings"=>$h2,
	"ratingreasons"=>$i2,
	
	);
	
	$table="tbl_taskdata";
	$where=array("task_id"=>$a2);
	
	$update=$model->update($conn,$table,$data,$where);
	
	if($update)
	{
		echo "<script>
			alert('Updated Successfully');
			window.location.href='home.php';
			</script>";
		//header("location:home.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($emass);
$mail->addAddress($rankem);
//$mail->addAddress('satish@rotexautomation.com');  
//$mail->addAddress('sandesh.shinde@rotexautomation.com');
$mail->isHTML(true);  // Set email format to HTML

	$a2=$_REQUEST['tskno2'];
	$aa2=$_REQUEST['tskuser2'];
	$tskuserem2=$_REQUEST['tskuserem2'];
	$b2=$_REQUEST['tskdesc2'];
	$c2=$_REQUEST['compdate2'];
	$d2=$_REQUEST['tskcomments2'];
	$e2=$_REQUEST['assignto2'];
	$f2=$_REQUEST['ucommitdatetime2'];
	$g2=$_REQUEST['ustatus2'];
	$h2=$_REQUEST['ranking2'];
	$i2=$_REQUEST['rankingcomments2'];

$bodyContent = '<caption><h3>Task Ticket</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$a2.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$aa2.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$b2.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$c2.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$d2.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$e2.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$f2.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$g2.'</td>
				</tr>
				<tr>
				<td><b>Ranking:</b></td>
				<td>'.$h2.'</td>
				</tr>
				<tr>
				<td><b>Ranking Comments:</b></td>
				<td>'.$i2.'</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'Ranking Update';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
		
	exit;
	}
	else
	{
		echo "Update Error";
	}
	
}

/////////////////////////////////////////////////////status updated by admin//////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_REQUEST['edit_id']))
{
	$editid=$_REQUEST['edit_id'];
	
	$where=array(
	"task_id"=>$editid
	);
	
	$edittask=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}





////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['edit_id1']))
{
	$editid1=$_REQUEST['edit_id1'];
	
	$where=array(
	"task_id"=>$editid1
	);
	
	$edittask1=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['uedit_id']))
{
	$ueditid=$_REQUEST['uedit_id'];
	
	$where=array(
	"task_id"=>$ueditid
	);
	
	$uedittask=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}
//////////////////////////////////////////////admin-user////////////////////////////////////////////////////////////
if(isset($_REQUEST['aduseredit_id']))
{
	$useradmineditid=$_REQUEST['aduseredit_id'];
	
	$where=array(
	"task_id"=>$useradmineditid
	);
	
	$uedittask1=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_REQUEST['login']))
{
	$unid=$_REQUEST['unid'];
	$pass=$_REQUEST['pass'];
	
	
	$sql="select * from `tbl_reg` where `userid`='$unid'  and `password`='$pass'";
	
	$ex=$conn->query($sql);
	$res=$ex->fetch_object();
	//print_r($res);
	
	if($ex->num_rows>0)
	{
		$_SESSION['user']=$res;
		if($_SESSION['user']->usercategory=='ADMIN')
		{
			header("location:view\admin.php");
		}
		else if($_SESSION['user']->usercategory=='MEMBER')
		{
			header("location:view\assignee.php");
		}	
		else if($_SESSION['user']->usercategory=='USER')
		{
			header("location:view\home.php");
		}
	}
	 else
	{
		echo "Check Username and Password";
	}	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['suy']))
{
	$sugg=$_REQUEST['suy'];
	
	$where=array(
	"task_id"=>$sugg
	);
	
	$suggpage=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}


if(isset($_REQUEST['sun']))
{
	$suggt=$_REQUEST['sun'];
	
	$where=array(
	"task_id"=>$suggt
	);
	
	$suggpaget=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['uid']))
{
	$editid=$_REQUEST['uid'];
	
	$where=array("taskuser"=>$editid);
	
	$editdata=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['uidaduser']))
{
	$editaduser=$_REQUEST['uidaduser'];
	
	$where=array("taskuser"=>$editaduser);
	
	$editdataaduser=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);	
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['uidad']))
{
	$editidad=$_REQUEST['uidad'];
	
	$where=array("assignto"=>$editidad);
	
	$v=$model->select_where1($conn,"tbl_taskdata",$where);
}
//////////////////////////////////////////////jgjgjh///////////////////////////////////////////////////////////
if(isset($_REQUEST['edituser_id']))
{
	$eee=$_REQUEST['edituser_id'];
	
	$where=array("log_id"=>$eee);
	
	$eee1=$model->select_where1($conn,"tbl_reg",$where);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_REQUEST['uid1']))
{
	$editid1=$_REQUEST['uid1'];
	
	$where=array("assignto"=>$editid1);
	
	$editdata1=$model->select_where1($conn,"tbl_taskdata",$where);
	//print_r($editdata);
}
//////////////////////////////////////////change password//////////////////////////////////////////

if(isset($_REQUEST['change_pass']) && ($_REQUEST['passid']))	
{
	
	$pasid=$_REQUEST['passid'];
		
	$pass=$_REQUEST['oldpass'];

	$ucp=$_REQUEST['ucp'];
	$sql="select * from tbl_reg where `username`='$pasid' and `password` = '$pass'";
	
	$ex=$conn->query($sql);
		
	if($ex->num_rows==1)
	{
		$passnew=$_REQUEST['pass1'];
		
		$sql1="update tbl_reg set `password`='$passnew' where `username`='$pasid'";
		
		$ex2=$conn->query($sql1);
		if($ex2)
		{
			echo "<script>
			alert('Password Changed Successfully Please Login With Your New Password');
			window.location.href='index.php';
			</script>";
			$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
//$mail->addAddress('vikas.sonar@rotexautomation.com');   // Add a recipient
$mail->addAddress($ucp);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>New Password</h3></caption>
				<table border="1">
				<tr>
				<td><b>New Password:</b></td>
				<td>'.$passnew.'</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'New Password';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
			
		}
		else
		{
			echo "<script>
			alert('Error...');
			window.location.href='userchangepass.php';
			</script>";	
		}
	}
	else
	{
		echo "<script>
			alert('Please Enter Correct Previous Password');
			window.location.href='userchangepass.php';
			</script>";
	}
}
////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['change_email']) && ($_REQUEST['passemail']))	
{
	
	$passemail=$_REQUEST['passemail'];
		
	$oldemail=$_REQUEST['oldemail'];

	$sql="select * from tbl_reg where `username`='$passemail' and `email_id` = '$oldemail'";
	
	$ex=$conn->query($sql);
		
	if($ex->num_rows==1)
	{
		$emnew=$_REQUEST['pass11'];
		
		$sql1="update tbl_reg set `email_id`='$emnew' where `username`='$passemail'";
		
		$ex2=$conn->query($sql1);
		if($ex2)
		{
			echo "<script>
			alert('Change Successfully');
			window.location.href='index.php';
			</script>";
		}
		else
		{
			echo "Error...";	
		}
	}
	else
	{
		echo "Please Enter Correct Previous Email";
	}
}












///////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['change_pass1']) && ($_REQUEST['passid1']))	
{
	
	$pasid1=$_REQUEST['passid1'];
		
	$pass1=$_REQUEST['oldpass1'];
	$acp=$_REQUEST['acp'];
    //$pass12=$_REQUEST['pass12'];
   // $passnew1=$_REQUEST['pass11'];
    

	$sql="select * from tbl_reg where `username`='$pasid1' and `password` = '$pass1'";
	
	$ex=$conn->query($sql);
		
	if($ex->num_rows==1)
	{
		$passnew1=$_REQUEST['pass11'];
		
		$sql1="update tbl_reg set `password`='$passnew1' where `username`='$pasid1'";
		
		$ex2=$conn->query($sql1);
		if($ex2)
		{
			echo "<script>
			alert('Password Changed Successfully Please Login With Your New Password');
			window.location.href='index.php';
			</script>";
			//header("location:index.php");	
			$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
$mail->addAddress($acp);


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>New Password</h3></caption>
				<table border="1">
				<tr>
				<td><b>New Password:</b></td>
				<td>'.$passnew1.'</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'New Password';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
		}
		else
		{
			echo "<script>
			alert('Error...');
			window.location.href='adminchangepass.php';
			</script>";	
		}
	}
	else
	{
		echo "<script>
			alert('Please Enter Correct Previous Password');
			window.location.href='adminchangepass.php';
			</script>";
	}
}

////////////////////////////////////////////////////////////////////////////////////////
	if(isset($_REQUEST['aaddtask']))
	{
	
		$adminaddtask=$_REQUEST['adminaddtask']; 
		$atskdesc=$_REQUEST['atskdesc'];
		$acompdate=$_REQUEST['acompdate'];
		$atskcomments=$_REQUEST['atskcomments'];
		$dedate=$_REQUEST['dedate'];
		$detime=$_REQUEST['detime'];
		$loc=$_REQUEST['loc'];
		$dept=$_REQUEST['dept'];
	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('h:i:s a', time());
		//echo $date;
	
	  $sqltt="select email_id from tbl_reg where `userdepartment`='$dept' and `usercategory`='ADMIN' and `location`='$loc'";
	  $extt=$conn->query($sqltt);
		
        if($extt)
		
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');
//$mail->addAddress('shital.parekh@rotexautomation.com');
//$mail->addAddress('satish@rotexautomation.com');
while($restt=$extt->fetch_object())
{
$mail->addAddress($restt->email_id);
}

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Task Data</h3></caption>
				<table border="1">
				<tr>
				<td><b>Task Given by:</b></td>
				<td>'.$adminaddtask.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$atskdesc.'</td>
				</tr>
				<tr>
				<td><b>Task Given On Date:</b></td>
				<td>'.$dedate.'</td>
				</tr>
				<tr>
				<td><b>Task Given At(Time):</b></td>
				<td>'.$date.'</td>
				</tr>
				<tr>
				<td><b>Given To(Location):</b></td>
				<td>'.$loc.'</td>
				</tr>
				<tr>
				<td><b>Given To(Department):</b></td>
				<td>'.$dept.'</td>
				</tr>
				<tr>
				<td><b>Required By:</b></td>
				<td>'.$acompdate.'</td>
				</tr>
				 <tr>
				<td><b>Comments:</b></td>
				<td> 
				'.$atskcomments.'
				</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'New Task Data';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo '<center>Message could not be sent.Check Connection</center>';
	echo "<center><a href='addtaskadmin.php'>Back</a></center>";
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
		$data=array(
		"taskuser"=>$adminaddtask,
		"taskdesc"=>$atskdesc,
		"tcompdate"=>$acompdate,
		"tskcomments"=>$atskcomments,
		"taskgivendate"=>$dedate,
		"taskgiventime"=>$date,
		"tasklocation"=>$loc,
		"taskdepartment"=>$dept
	
	);
	
	$table="tbl_taskdata";
	
	
	$insadmin=$model->insert($conn,$table,$data);
	
	
   echo "
     <script>
			alert('Task Added Successfully');
			window.location.href='addtaskadmin.php';
			</script>";
}
		exit;
	
	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if(isset($_REQUEST['email_sq_id']))
{
	$sqid=$_REQUEST['email_sq_id'];
	
	$sql="select email_id from `tbl_reg` where `username`='$sqid'"; 
	
	$ex=$conn->query($sql);
	
	$res=$ex->fetch_object();

	if($ex)
	{
		echo $res->email_id;
	}
	else
	{
		echo "Error in email_id";
	}
}
/////////////////////////////////////////add contact/////////////////////////////////////////////////////


if(isset($_REQUEST['addcon']))
{
	$contact=$_REQUEST['contact'];
	$idcontact=$_REQUEST['idcontact'];
	
	$data=array(
	"contact_no"=>$contact,
	
	
	);
	
	$table="tbl_reg";
	$where=array("log_id"=>$idcontact);
	
	$updatecontact=$model->updatecon($conn,$table,$data,$where);
	
	if($updatecontact)
	{
		echo "<script>
		
		alert('Contact Added Successfully');
		window.location.href='viewusers.php';
		</script>";
		
	}
	else
	{
		echo "<script>
		
		alert('Error..');
		window.location.href='addcontact.php';
		</script>";
	}
}
//////////////////////////////////////////////////////////

if(isset($_REQUEST['uac']))
{
	$ecn=$_REQUEST['ecn'];
	$useraddcontact=$_REQUEST['useraddcontact'];
	
	$data=array(
	"contact_no"=>$ecn,
	
	
	);
	
	$table="tbl_reg";
	$where=array("log_id"=>$useraddcontact);
	
	$updateusercontact=$model->updatecon($conn,$table,$data,$where);
	
	if($updateusercontact)
	{
		echo "<script>
		
		alert('Contact Added Successfully');
		window.location.href='home.php';
		</script>";
		
	}
	else
	{
		echo "<script>
		
		alert('Error..');
		window.location.href='addusercontact.php';
		</script>";
	}
}

	
/////////////////////////////////////////////////////new update////////////////////////////////////
if(isset($_REQUEST['updatexx']))
{
	$xx1=$_REQUEST['xx1'];
	$xx2=$_REQUEST['xx2'];
	$xx3=$_REQUEST['xx3'];
	$xx4=$_REQUEST['xx4'];
	$xx5=$_REQUEST['xx5'];
	$xx6=$_REQUEST['xx6'];
	$inputreuired=$_REQUEST['inputreuired'];
	$assigntoxx=$_REQUEST['assigntoxx'];
	$emailassigneexx=$_REQUEST['emailassigneexx'];
	$commitdatetimexx=$_REQUEST['commitdatetimexx'];
	$tskstatusxx=$_REQUEST['tskstatusxx'];
	$data=array(
	"input_required"=>$inputreuired,
	"assignto"=>$assigntoxx,
	"emailass"=>$emailassigneexx,
	"commitdatetime"=>$commitdatetimexx,
	"status"=>$tskstatusxx,
	);
	
	$table="tbl_taskdata";
	$where=array("task_id"=>$xx1);
	
	$upxx=$model->update($conn,$table,$data,$where);
	
	if($upxx)
	{
		echo "<script>
		
		alert('Ticket Generated Successfully');
		window.location.href='admin.php';
		</script>";
		//header("location:list.php");
		$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'rotexautomation.tms@gmail.com';    // SMTP username
//$mail->Username = 'rotexbrd@rotexautomation.com';
//$mail->Password = '';	
$mail->Password = 'rotex123';			 	// SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                          // TCP port to connect to

$mail->setFrom('rotexautomation.tms@gmail.com','Rotex TMS');
//$mail->addReplyTo('mumusonar@gmail.com', 'Rotex TSM Web');

$mail->addAddress($xx3);
//$mail->addAddress('sandesh.shinde@rotexautomation.com');
//$mail->addAddress('satish@rotexautomation.com');
$mail->addAddress($emailassigneexx);

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<caption><h3>Task Ticket</h3></caption>
				<table border="1">
				<tr>
				<td><b>Ticket No.:</b></td>
				<td>'.$xx1.'</td>
				</tr>
				<tr>
				<td><b>Task Given By:</b></td>
				<td>'.$xx2.'</td>
				</tr>
				<tr>
				<td><b>Task Description:</b></td>
				<td>'.$xx4.'</td>
				</tr>
				 <tr>
				<td><b>Required By:</b></td>
				<td> '.$xx5.'</td>
				</tr>
				<tr>
				<td><b>Comments:</b></td>
				<td>'.$xx6.'</td>
				</tr>
				<tr>
				<td><b>Input Required:</b></td>
				<td>'.$inputreuired.'</td>
				</tr>
				<tr>
				<td><b>Assign To.:</b></td>
				<td>'.$assigntoxx.'</td>
				</tr>
				<tr>
				<td><b>Commit Date:</b></td>
				<td>'.$commitdatetimexx.'</td>
				</tr>
				<tr>
				<td><b>Status:</b></td>
				<td>'.$tskstatusxx.'</td>
				</tr>
				</table>';
$bodyContent .= '';

$mail->Subject = 'Task Ticket';
$mail->Body    = $bodyContent;
	
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo '<center><h4>Rotex</h4></center>';
}
		exit;
	}
	
	else
	{
		echo "error";
	}
	
}
/////////////////////////////////////////////////update suggestion////////////////////////////////////////////

if(isset($_REQUEST['updatesugg']))
{
	$sugg1=$_REQUEST['sugg1'];
	$sugg3=$_REQUEST['sugg3'];
	$sugg2=$_REQUEST['sugg2'];
	$sugg4=$_REQUEST['sugg4'];
	$sugg11=$_REQUEST['sugg11'];
	$sugg22=$_REQUEST['sugg22'];
	$sugg33=$_REQUEST['sugg33'];
	$sugg44=$_REQUEST['sugg44'];
	$sugg55=$_REQUEST['sugg55'];
	$sugg66=$_REQUEST['sugg66'];
	//echo $sugg66;
	
	date_default_timezone_set('Asia/Kolkata');
	$date = date('h:i:s a', time());
	$date1=date('d/m/Y',time());
	

			$sqlre="UPDATE `tbl_taskdata` SET `workdoneon`=' ',`completiontime`=' ',`daystaken`=' ',`suggestion`='$sugg4',`status`='$sugg66',`adminconfirdate`='$date1',`adminconfirtime`='$date' WHERE `task_id`='$sugg1'";
			$exre=$conn->query($sqlre);
			
		

	}


if(isset($_REQUEST['updatesuggterminate']))
{
	$sugg1=$_REQUEST['sugg1'];
	$sugg3=$_REQUEST['sugg3'];
	$sugg2=$_REQUEST['sugg2'];
	$sugg4=$_REQUEST['sugg4'];
	$sugg11=$_REQUEST['sugg11'];
	$sugg22=$_REQUEST['sugg22'];
	$sugg33=$_REQUEST['sugg33'];
	$sugg44=$_REQUEST['sugg44'];
	$sugg55=$_REQUEST['sugg55'];
	$sugg66=$_REQUEST['sugg66'];
	//echo $sugg66;
	
	date_default_timezone_set('Asia/Kolkata');
	$date = date('h:i:s a', time());
	$date1=date('d/m/Y',time());
	

			$sqlterminate="UPDATE `tbl_taskdata` SET `status`='$sugg66',`suggestion`='$sugg4',`adminconfirdate`='$date1',`adminconfirtime`='$date' WHERE `task_id`='$sugg1'";
			$exterminate=$conn->query($sqlterminate);
			
		

	}

///////////////////////////////////////////////////leave and travel/////////////////////////////////////////////////////////////

if(isset($_REQUEST['leavesubmitadmin']))
{
	$leavename=$_REQUEST['leavename'];
	$leaveempno=$_REQUEST['leaveempno'];
	$leavedept=$_REQUEST['leavedept'];
	$leaveshift=$_REQUEST['leaveshift'];
	$leaveemercon=$_REQUEST['leaveemercon'];
	$leaveage=$_REQUEST['leaveage'];
	$datefrom=$_REQUEST['datefrom'];
	$dateto=$_REQUEST['dateto'];
	$leavevenu=$_REQUEST['leavevenu'];
	$leavedays=$_REQUEST['leavedays'];
	$leavereason=$_REQUEST['leavereason'];
	$leavestatus=$_REQUEST['leavestatus'];
	$chk=implode(",",$_REQUEST['chk']);
	
	$sqltravel="INSERT INTO `travelrequisition`(`leavename`, `leaveempno`, `leavedept`, `leaveshift`, `leaveemercon`, `leaveage`, `datefrom`, `dateto`, `leavedays`, `leavevenu`,`leavereason`, `travelmode`, `leavestatus`) VALUES ('$leavename','$leaveempno','$leavedept','$leaveshift','$leaveemercon','$leaveage','$datefrom','$dateto','$leavedays','$leavevenu','$leavereason','$chk','$leavestatus')";
	$extravel=$conn->query($sqltravel);
	
	if($extravel) 
	{
	     echo "<script>
		  alert('Send Successfully');
		  window.location.href='travelradmin.php';
		  </script>";
	}
	else
	 {
		echo "<script>
		
		alert('ERROR');
		</script>";
	 }      	
	          	
}



