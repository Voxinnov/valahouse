<?php
$host = "localhost"; 
$user = "vox_camp_foot";
 $pass = "Xoug154~";  
$db_name = "vox_camp_foot_print"; 
$a_id	=	$_GET["s_id"];
//print_r($host); exit;
$con = new mysqli($host, $user, $pass, $db_name);
	$mealtype        =   $_POST['namem']; 
     
	
	$query = "UPDATE campbook SET campbook_stts='2' WHERE campbook_id='$a_id'";
	//UPDATE ofc_leave SET leave_status='2' WHERE leave_id='1'
	//print_r($query); exit;
		$run = $con->query($query);
	header("location:booking_calendar.php");
	 //print_r($query); exit;
	//$run = $con->query($query);
	 //print_r($run); exit;
	 
?>