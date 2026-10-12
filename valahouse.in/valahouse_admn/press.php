<?php 
 ob_start();
session_start();
include("autoload.php");
include("session.php");
$pasid	=	$_SESSION["LogUserID"];
$ad_name	=	$_SESSION["Loguser_name"];
$db		=	new MySql();
$db->connect();
$obj	=	new Admin();
$data	=	$obj->getAdmin($pasid);

$cat	=	new Press();

$record	=	$cat->listAboutgallery();
//print_r($record); 

$totalRecord	=	count($record);
//$act_img = new Galimg();



If(isset($_POST["submit"])){
         $title     =   $_POST['title']; 
       //$folder      =   $_POST['folder']; 
       //$video     =   $_POST['video'];
    // $type        =   $_POST['type']; 
        $status     =   $_POST['status']; 

    
       if(empty($title)){
        header("location:press.php");
            $message    =   new Message('Enter mandatory fields','error');
            $message->setMessage();
            exit;
       }
        
       // $cat    =   new Facility();
         
        
                 $inputs    =   array('title'=>$title,
                                     //'type'=>$type,
                                       //'folder'=>$folder,
                                      // 'video'=>$video,
                                      'status'=>$status
                                      );
                                     
            
                if($cat->addAboutgallery($inputs)){
                
                $get_last_id = $cat->getAllAboutgalleryMax();

                //print_r($get_last_id);exit;
                $last_id = $get_last_id[0]['max_id'];

                $count_file = count($_FILES['upload']['name']);
             

                     for($i=0; $i<$count_file; $i++) {
              
             $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                $shortname = $_FILES["upload"]["name"][$i];

                $filePath = "upload/Gallery/" . date('d-m-Y-H-i-s').'-'.$_FILES["upload"]["name"][$i];
 
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files= date('d-m-Y-H-i-s').'-'.$_FILES["upload"]["name"][$i];
                   
                    $input =   array('gallery'=>$last_id,
                                      
                                      'photo'=>$files
                                      );
                                      
                                     
                                      $cat->addAboutgalleryimg($input);
                   // print_r($act_img);exit;

                }
               
                 
             
                     }

                    
                    $message    =   new Message('New Gallery added ','message');
                    $message->setMessage();
                    header('Location:press.php');
                    exit;
                    
                }else{
                    
                    $message    =   new Message('Unknown error','error');
                    $message->setMessage();
                }
                
        
       }

?>     
<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
   <title>The Press</title>

    <meta name="description" content="blank page" />
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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300"
          rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/typicons.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
   <script src="assets/js/skins.min.js"></script>
		    <!--Page Related styles-->
    <link href="assets/css/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<!-- /Head -->

<!-- Body -->
<body>
    
    <!-- Navbar -->
	<?php include('header.php') ?>
    <!-- /Navbar -->
    <!-- Main Container -->
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
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->

            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                   
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            Manage Press           </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>                        </a>                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
				<div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6">
                           
                          
                          
                               
                            <div class="well with-header with-footer">
								
                                <div class="header bordered-pink">
                                    Manage Press List
                                </div>
							
                                <table class="table table-striped table-bordered table-hover" id="editabledatatable">
                                    <thead>
                                        <tr>
                                            <th>
                                               #
                                            </th>
                                            
											
                                            <th>
                                                Title
                                            </th>
											 <th>
                                                Image
                                            </th>
											<th>
                                               Status
                                            </th>
                                            
											<th>
                                            </th>
											<th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
								
									 <?php 
											for($i=0;$i<$totalRecord;$i++){
											?>	
									
										  <tr>
											<td><?php echo $i+1; ?></td>
											
											<td><?php echo $record[$i]["about_img_title"];?></td>
								<td><?php $act_id = $record[$i]["about_img_id"]; 
                                    $get_act_img = $cat->getGalimg_act($act_id); 
                                   // print_r($get_act_img);exit;
                                              ?> 
                        <img src="upload/Gallery/<?php echo $get_act_img[0]["abt_img_file"];?>" width="100" height="80"></td>										
											<td><?php $st= $record[$i]["about_img_status"];
												if($st==1){echo "Published"; }else{ echo "unpublished";}?></td>
										   
											
											<td><a href="edit_press.php?g_id=<?php echo $record[$i]["about_img_id"];?>" style="width:100%" class="btn btn-block btn-info fa fa-trash">Edit</a></td> 
											<td><a href="delete_press.php?a_id=<?php echo $record[$i]["about_img_id"];?>"  style="width:100%" class="btn btn-block btn-info fa fa-trash">Delete</a>
											  </td>
										  </tr>
										 
										<?php 
										 } 
								?>	 
											
								
										  
																</tbody>
                                </table>

                               
                            </div>
                                 
                             
							
							</div>
					
					
					
					 <div class="col-lg-6 col-sm-6 col-xs-6">
                           
                            <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="widget">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption"> Add New Facility  </span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                                                <form role="form" method="post" id="gallery" enctype="multipart/form-data">
                              
															</select>
															</div> 
                                                    <div class="form-group">
                                                        <label for="sminput">Title</label>
                                                        <input type="text" name="title" class="form-control input-sm" id="sminput" placeholder="Title">
                                                    </div>
	       
                                                 

                                                     <div class="form-group">
                                                    <label for="sminput">Images</label>
                                                        <input type="file" name="upload[]" class="form-control input-sm" id="sminput" multiple="multiple" >
                                                      
                                                    </div> 
													 
																										
                                                
													<div class="row">
													<div class="col-sm-1">
													 <label>Status</label>
													</div>
														<div class="col-sm-5">
															<div class="input-group">
															<select name="status" class="form-control select2" style="width: 100%;">
															 
																				<option value="1" >Publish</option>
																				 <option value="2" >Un Publish</option>
																			   
															</select>
                                                                
                                                              
                                                            </div>
														</div>
														<div class="col-sm-6">
														<input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
														
														</div>
														
													</div>
                                                </form>
                                            </div>
                                        </div>
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
    <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>

    <!--Page Related Scripts-->
    <!--Page Related Scripts-->
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/ZeroClipboard.js"></script>
    <script src="assets/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/datatable/datatables-init.js"></script>
    <script>
        InitiateSimpleDataTable.init();
        InitiateEditableDataTable.init();
        InitiateExpandableDataTable.init();
        InitiateSearchableDataTable.init();
    </script>
</body>
<!--  /Body -->

</html>
