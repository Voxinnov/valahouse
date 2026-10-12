<?php
 ob_start();
session_start();
include("autoload.php");
include("session.php");
$pasid  =   $_SESSION["LogUserID"];
$ad_name    =   $_SESSION["Loguser_name"];
$db     =   new MySql();
$db->connect();
$objA   =   new Admin();
$g_id=  $_GET["g_id"];
$data   =   $objA->getAdmin($pasid);
$cat    =   new Calendar();                
$get1   =   $cat->getCalendar($g_id);
//print_r($get1);exit;

If(isset($_POST["update"])){
	 $gname     =   $_POST['gname']; 
	  $bookby       =   $_POST['bookby'];
	    $bookamnt       =   $_POST['bookamnt'];
       $sdate     =   $_POST['sdate']; 
       //print_r($sdate);exit;
         $edate     =   $_POST['edate']; 
         $cno       =   $_POST['cno'];
         $rno       =   $_POST['rno'];
		       $note        = $_POST['note']; 
         $status        = $_POST['status']; 
         
  
       if(empty($sdate)){
        header("location:booking_calendar_edit.php");
            $message    =   new Message('Enter mandatory fields','error');
            $message->setMessage();
            exit;
       }else{
        
           $inputs =array(			
									'sdate'=>$sdate,
						   		    'gname'=>$gname,
									'bookby'=>$bookby,
									'bookamnt'=>$bookamnt,
                                    'edate'=>$edate,
                                    'cno'=>$cno,
										'note'=>$note,
                                    'rno'=>$rno,
                                    'addby'=>'RithuDMC Admin',
                                    'status'=>$status,
                                    'id'=>$g_id
                            );
                //print_r($inputs);exit;
            
                if($cat->editCalendar($inputs)){
                
                    
                    $message    =   new Message('New Gallery added','message');
                    $message->setMessage();
                    header('Location:booking_calendar.php');
                    exit;
                    
                }else{
                    
                    $message    =   new Message('Unknown error','error');
                    $message->setMessage();
                }
                
        
       }
      
}

?>
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 1.6.1
Purchase: https://wrapbootstrap.com/theme/beyondadmin-adminapp-angularjs-mvc-WB06R48S4
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.6.1.s3-website-us-east-1.amazonaws.com/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 05:20:08 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Calendar</title>

    <meta name="description" content="calendar" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>

    <!-- Page Related Scripts -->
    <!-- Note: FullCalendar scripts and call must be added to header -->
    <script src='assets/js/fullcalendar/moment.min.js'></script>
    <script src='assets/js/jquery.min.js'></script>
    <script src='assets/js/fullcalendar/jquery-ui.custom.min.js'></script>
    <script src='assets/js/fullcalendar/fullcalendar.min.js'></script>
     
</head>
<!-- /Head -->
<!-- Body -->
<body>
    
    <!-- Navbar -->
 <!-- Navbar -->
    <?php include('header.php') ?>
    <!-- /Navbar -->  <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                   
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
               <?php include('menu.php') ?>
            </div>
            <!-- /Page Sidebar -->
            <!-- Chat Bar -->
            <div id="chatbar" class="page-chatbar">
                <div class="chatbar-contacts">
                    <div class="contacts-search">
                        <input type="text" class="searchinput" placeholder="Search Contacts" />
                        <i class="searchicon fa fa-search"></i>
                        <div class="searchhelper">Search Your Contacts and Chat History</div>
                    </div>
                    <ul class="contacts-list">
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/divyia.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Divyia Philips</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    last week
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Nicolai-Larson.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Adam Johnson</div>
                                <div class="contact-status">
                                    <div class="offline"></div>
                                    <div class="status">left 4 mins ago</div>
                                </div>
                                <div class="last-chat-time">
                                    today
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/John-Smith.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">John Smith</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    1:57 am
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Osvaldus-Valutis.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Osvaldus Valutis</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    today
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Javi-Jimenez.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Javi Jimenez</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    today
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Stephanie-Walter.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Stephanie Walter</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    yesterday
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Sergey-Azovskiy.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Sergey Azovskiy</div>
                                <div class="contact-status">
                                    <div class="offline"></div>
                                    <div class="status">offline since oct 24</div>
                                </div>
                                <div class="last-chat-time">
                                    22 oct
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/Lee-Munroe.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Lee Munroe</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    today
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="contact-avatar">
                                <img src="assets/img/avatars/divyia.jpg" />
                            </div>
                            <div class="contact-info">
                                <div class="contact-name">Divyia Philips</div>
                                <div class="contact-status">
                                    <div class="online"></div>
                                    <div class="status">online</div>
                                </div>
                                <div class="last-chat-time">
                                    last week
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="chatbar-messages" style="display: none;">
                    <div class="messages-contact">
                        <div class="contact-avatar">
                            <img src="assets/img/avatars/divyia.jpg" />
                        </div>
                        <div class="contact-info">
                            <div class="contact-name">Divyia Philips</div>
                            <div class="contact-status">
                                <div class="online"></div>
                                <div class="status">online</div>
                            </div>
                            <div class="last-chat-time">
                                a moment ago
                            </div>
                            <div class="back">
                                <i class="fa fa-arrow-circle-left"></i>
                            </div>
                        </div>
                    </div>
                    <ul class="messages-list">
                        <li class="message">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Me</div>
                                <div class="message-time">10:14 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                        <li class="message reply">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Divyia</div>
                                <div class="message-time">10:15 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                        <li class="message">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Me</div>
                                <div class="message-time">10:14 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                        <li class="message reply">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Divyia</div>
                                <div class="message-time">10:15 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                        <li class="message">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Me</div>
                                <div class="message-time">10:14 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                        <li class="message reply">
                            <div class="message-info">
                                <div class="bullet"></div>
                                <div class="contact-name">Divyia</div>
                                <div class="message-time">10:15 AM, Today</div>
                            </div>
                            <div class="message-body">
                                Hi, Hope all is good. Are we meeting today?
                            </div>
                        </li>
                    </ul>
                    <div class="send-message">
                        <span class="input-icon icon-right">
                            <textarea rows="4" class="form-control" placeholder="Type your message"></textarea>
                            <i class="fa fa-camera themeprimary"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- /Chat Bar -->
            <!-- Page Content -->
                 <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">Calendar</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Full Calendar
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                             <div class="widget ">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption"> Edit Booking </span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                                                <form role="form" method="post" enctype="multipart/form-data">
												
												
													    <div class="form-group">
                                                        <label for="sminput">Guest Name</label>
                                                        <input type="text" name="gname" class="form-control input-sm" id="sminput" value="<?php echo $get1[0]["campbook_gust_name"];?>">
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="sminput">Start Date</label>
                                            <input type="date" name="sdate" class="form-control input-sm" id="sminput" value="<?php echo $get1[0]["campbook_sdate"];?>">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="sminput">End Date</label>
                                                        <input type="date" name="edate" class="form-control input-sm" id="sminput"  value="<?php echo 
                                                        $get1[0]["campbook_edate"];?>">
                                                    </div>  
                                                
                                                    <div class="form-group">
                                                        <label for="sminput">No of Guest</label>
                                                        <input type="text" name="cno" class="form-control input-sm" id="sminput"  value="<?php echo 
                                                        $get1[0]["campbook_no_clints"];?>" >
                                                    </div>  
                                                <div class="form-group">
                                                        <label for="sminput">No of Rooms</label>
                                                       <select name="rno" class="form-control select2" style="width: 100%;">
                                                             
                                                 <option value="1" <?php  if($get1[0]['campbook_no_rom']== 1){ ?> selected="selected"<?php  } ?> ><?php echo "1";?></option>
                                                     <option value="2" <?php  if($get1[0]['campbook_no_rom']== 2){ ?> selected="selected"<?php  } ?> ><?php echo "2";?></option>

                                                     <option value="3" <?php  if($get1[0]['campbook_no_rom']== 3){ ?> selected="selected"<?php  } ?> ><?php echo "3";?></option>
                                                        
                                                            </select>
                                                    </div>


																	<div class="form-group">
                                                        <label for="sminput">Booking Amount</label>
                                                        <input type="text" name="bookamnt" class="form-control input-sm" id="sminput" value="<?php echo 
                                                        $get1[0]["campbook_price"];?>" >
                                                    </div>
													
														<div class="form-group">
                                                        <label for="sminput">Booked By</label>
                                                        <input type="text" name="bookby" class="form-control input-sm" id="sminput" value="<?php echo 
                                                        $get1[0]["campbook_bk_by"];?>" >
                                                    </div>
													
													<div class="form-group">
                                                        <label for="sminput">Note:</label><br>
                                                       <textarea rows="6" name="note" style="width:100%" ><?php echo 
                                                        $get1[0]["campbook_notes"];?>
													   </textarea>
                                                    </div>
													
												
                                                
                                                    <div class="row">
                                                    <div class="col-sm-3">
                                                     <label>Status</label>
                                                    </div>
                                                        <div class="col-sm-7">
                                                            <div class="input-group">
                                                             <select name="status" class="form-control select2" style="width: 100%;">
                                                             
                                                                    <option value="1" <?php  if($get1[0]
                                                                        ['campbook_stts']== 1){ ?> selected="selected"<?php  } ?> ><?php echo "Conformed";?></option>
                                                                    <option value="2" <?php  if($get1[0]
                                                                        ['campbook_stts']== 2){ ?> selected="selected"<?php  } ?> ><?php echo "Cancelled";?></option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                       <div class="col-sm-6">
                                                        <input type="submit" name="update" class="btn btn-primary btn-block" value="update">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                       
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>


    

</body>
<!--  /Body -->

<!-- Mirrored from beyondadmin-v1.6.1.s3-website-us-east-1.amazonaws.com/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Jun 2018 05:20:14 GMT -->
</html>
