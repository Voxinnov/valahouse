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
$g_id=  $_GET["n_id"];
$data   =   $objA->getAdmin($pasid);
$cat    =   new Calendar();
                 
$get1   =   $cat->listCalendar($g_id);

$count = count($get1);
$today = date('Y-m-d');
//print_r($get);

If(isset($_POST["update"])){
	 $gname     =   $_POST['gname']; 
	  $bookby       =   $_POST['bookby'];
	   $bookamnt       =   $_POST['bookamnt'];
     $sdate     =   $_POST['sdate']; 
         $edate     =   $_POST['edate']; 
         $cno       =   $_POST['cno'];
         $rno       =   $_POST['rno'];
         $note        = $_POST['note']; 
         $status        = $_POST['status']; 
       if(empty($sdate)){
        header("location:booking_calendar.php");
            $message    =   new Message('Enter mandatory fields','error');
            $message->setMessage();
            exit; 
       }else{

        $inputs =array('sdate'=>$sdate,
										'gname'=>$gname,
										'bookby'=>$bookby,
										'bookamnt'=>$bookamnt,
										'note'=>$note,
										'edate'=>$edate,
										'cno'=>$cno,
										'rno'=>$rno,
										'addby'=>'RithuDMC Admin',
										'status'=>'1'
                                      );
                                     
                if($cat->addCalendar($inputs)){
                
                    
                    $message    =   new Message('Gallery Image Updated ','message');
                    $message->setMessage();
                    header("Location:booking_calendar.php");
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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

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
     <script>
    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '<?php echo $today;?>',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                        <?php   for($i=0;$i<$count-1;$i++)
{
    ?>
    
    {
        title: '<?php echo 'Gusts -'.$get1[$i]['campbook_no_clints'].'\n'.'No Of Rooms-'.$get1[$i]['campbook_no_rom'].'\n'.'Book By-'.$get1[$i]['campbook_bk_by']; ?>',
        start: '<?php echo $get1[$i]['campbook_sdate']; ?>',
        end: '<?php echo $get1[$i]['campbook_edate']; ?>'
    },
<?php } ?>
    {
     title: '<?php echo 'No of Gusts -'.$get1[$i]['campbook_no_clints'].'\n'.' No Of Rooms-'.$get1[$i]['campbook_no_rom'].'\n'.' Book By-'.$get1[$i]['campbook_bk_by'] ;?>',
        start: '<?php echo $get1[$i]['campbook_sdate']; ?>',
        end: '<?php echo $get1[$i]['campbook_edate']; ?>'
    }
            ]
        });
        
    });
    </script>
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
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                             <div class="widget ">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption"> Add Booking </span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                                                <form role="form" method="post" enctype="multipart/form-data">
												
												  <div class="form-group">
                                                        <label for="sminput">Guest Name</label>
                                                        <input type="text" name="gname" class="form-control input-sm" id="sminput">
                                                    </div>
												   
                                                   
                                                    <div class="form-group">
                                                        <label for="sminput">Start Date</label>
                                                        <input type="date" name="sdate" class="form-control input-sm" id="sminput">
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="sminput">End Date</label>
                                                        <input type="date" name="edate" class="form-control input-sm" id="sminput" >
                                                    </div>  
                                                
                                                    <div class="form-group">
                                                        <label for="sminput">No of Guest</label>
                                                        <input type="cno" name="cno" class="form-control input-sm" id="sminput" >
                                                    </div>  
                                                <div class="form-group">
                                                        <label for="sminput">No of Rooms</label>
                                                       <select name="rno" class="form-control select2" style="width: 100%;">
                                                             
                                                                            <option value="1"  >1</option>
                                                                            <option value="2"  >2</option>
                                                                              
                                                                            <option value="3"  >3</option> 
                                                            </select>
                                                    </div>  
													
															<div class="form-group">
                                                        <label for="sminput">Booking Amount</label>
                                                        <input type="text" name="bookamnt" class="form-control input-sm" id="sminput">
                                                    </div>
													
													<div class="form-group">
                                                        <label for="sminput">Booked By</label>
                                                        <input type="text" name="bookby" class="form-control input-sm" id="sminput">
                                                    </div>
													
														<div class="form-group">
                                                        <label for="sminput">Note:</label><br>
                                                       <textarea rows="6" name="note" style="width:100%"></textarea>
                                                    </div>
													
                                                
                                                    <div class="row">
                                                    <!--<div class="col-sm-2">
                                                     <label>Status</label>
                                                    </div>-->
                                                        <!--<div class="col-sm-8">
                                                            <div class="input-group">
                                                            <select name="status" class="form-control select2" style="width: 100%;">
                                                             
                                                                            <option value="1"  >Confirmed</option>
                                                                            <option value="2"  >Cancelled </option>
                                                                               
                                                            </select>
                                                            </div>
                                                        </div>-->
                                                        <div class="col-sm-6">
                                                        <input type="submit" name="update" class="btn btn-primary btn-block" value="update">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-sky">
                                    <i class="widget-icon fa fa-calendar sky"></i>
                                    <span class="widget-caption">Events and Schedules</span>
                                </div><!--Widget Header-->
                                <div class="widget-body">
                                    <div id='calendar'></div>
                                </div><!--Widget Body-->
                            </div>
                        </div> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="widget flat">
                                <div class="widget-header bordered-bottom bordered-sky">
                                    <i class="widget-icon fa fa-calendar sky"></i>
                                    <span class="widget-caption">Events and Schedules</span>
                                </div><!--Widget Header-->
                                <div class="widget-body">
                                         <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>
                                                #
                                            </th>
											 <th>Guest name</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>No Of Gust</th>
                                            
                                            <th>No of Rooms</th>
                                         
											 <th>Booking Amount</th>
                                            <th>Booked By</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        
                                        
                                        for($i=0;$i<$count;$i++){
											$origDate = $get1[$i]['campbook_sdate'];
											$newDate = date("d-m-Y", strtotime($origDate));

					
											$origeDate = $get1[$i]['campbook_edate'];
											$neweDate = date("d-m-Y", strtotime($origeDate));

                                        ?>
                                        
                                        <tr>
                                        <td><?php echo $i+1; ?></td>
										 <td class="width45">
                                                    <?php echo $get1[$i]['campbook_gust_name']; ?>
                                                
                                            </td>
                                             <td class="width45">
                                                    <?php echo "$newDate" ?>
                                                
                                            </td>
                                            <td class="width45">
                                                     <?php echo "$neweDate" ?>

                                                
                                            </td>
                                            <td>
                                                <h6 class="mb-0"></h6>
                                                <span><?php echo $get1[$i]['campbook_no_clints']; ?></span>
                                            </td>
                                            <td><span><?php echo $get1[$i]['campbook_no_rom']; ?></span></td>
										
											<td class="width45">
                                                    <?php echo $get1[$i]['campbook_price']; ?>
                                                
                                            </td>
                                            <td><span><?php echo $get1[$i]['campbook_bk_by']; ?></span></td>
											<td>
											<?php if($get1[$i]['campbook_stts']== 1){ ?> <?php echo "Conformed"; } ?>
											<?php if($get1[$i]['campbook_stts']== 2){ ?> <?php echo "Cancelled"; } ?>
											
											</td>

                                            
                                            <td>
											   <a href="booking_calendar_view.php?g_id=<?php echo $get1[$i]["campbook_id"];?>"> <button type="button" class="btn btn-sm btn-outline-secondary" title="view"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                     
                                            <!-- <a href="emp_detail.php" class="btn btn-sm btn-outline-primary"><i class="icon-eye"></i></a> -->
                                        <a href="booking_calendar_edit.php?g_id=<?php echo $get1[$i]["campbook_id"];?>"> <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button></a>
                                        <a href="booking_calendar_status.php?s_id=<?php echo $get1[$i]["campbook_id"];?>"> <button type="button" class="btn btn-sm btn-outline-secondary" title="Cancelled"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                                     <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm">
                                        <a href="booking_calendar_delete.php?a_id=<?php echo $get1[$i]["campbook_id"];?>"> <i class="fa fa-trash-o"></i></a></button>
                                            </td>
                                        </tr>
                                       
                               
                               
                              
                                        
                                        
                                        
                                                <?php 
                                         } 
                                ?>   

                                 
                                 
                                 
                                 
                                    
                                    
                                  
                                  
                                 
                                 
                                    </tbody>
                                </table>
                            </div>
                                </div><!--Widget Body-->
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
