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
$g_id   =  $_GET['g_id'];
$data   =   $objA->getAdmin($pasid);

$cat    =   new Aboutgallery();                 
$get    =   $cat->getAboutgallery($g_id);
//print_r($get);exit;
$get_img = $cat->getGalimg_act($g_id);
//print_r($get_img);exit;

//print_r($get_img);exit;
$get_total = count($get_img);



If(isset($_POST["submit"])){
    $img_id =$_POST['img_id'];
    $order =$_POST['order'];
    $imgname =$_POST['imgname'];
    $img_hide = $_POST['hidding'];

     $photo       =   $_FILES["upload1"]["name"];
       $absDirName  =   dirname(__FILE__).'/upload/Gallery'; 
            $relDirName =   'upload/Gallery'; 
//print_r($order);exit;
        $obj    =   new Uploader($absDirName.'/');
         $fileName = $name;
         $fileName = seoTitle($fileName ); 
        $obj->setSequence($fileName);
        $obj->setExtensions(array('png','gif','jpg','jpeg'));
        $obj->setMaxSize(20);
            if($obj->uploadFile("upload1")){ 
                 $image =   $obj->getUploadName();
                // print_r($image);exit;
                 $cat->updateGalleryImage($img_id,$image,$order,$imgname);    
                 unlink('upload/Gallery/'.$img_hide);
                
                 }
                  $inputs    =   array('order'=>$order,
                                     'imgname'=>$imgname,
                                      'id'=>$img_id
                                      );
                 $cat->editGalimg($inputs);                     
  header("Location:about_gallery.php");
                    exit;


    }
If(isset($_POST["update"])){
      $title   =   $_POST['title'];
        // $folder        =   $_POST['folder']; 
        

      /* $video     =   $_POST['video'];*/
        $status     =   $_POST['status'];
       
         
     $count_file = count($_FILES['upload']['name']);
             

                     for($i=0; $i<$count_file; $i++) {
              
             $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

                $shortname = $_FILES["upload"]["name"][$i];

                $filePath = "upload/Gallery/" . date('d-m-Y-H-i-s').'-'.$_FILES["upload"]["name"][$i];
 
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files= date('d-m-Y-H-i-s').'-'.$_FILES["upload"]["name"][$i];
                   
                    $input =   array('gallery'=>$g_id,
                                      
                                      'photo'=>$files
                                      );
                                      
                                // print_r($inputs);exit;
                                      $cat->addGalimg($input);
                                       //+print_r($cat);exit;
                    

                }
              }
               
       if(empty($title)){
        header("location:about_gallery.php");
            $message    =   new Message('Enter mandatory fields','error');
            $message->setMessage();
            exit;
       }else{
        
      //  $cat    =   new Gallery();
                $inputs =array('title'=>$title,
                            //'type'=>$type,
                            //'folder'=>$folder,
                            
                             //'type'=>$type,
                            'status'=>$status,
                                      'id'=>$g_id
                                      );
                //print_r($inputs);exit;
            
                if($cat->editAboutgallery($inputs)){
                
                    
                    $message    =   new Message('New Gallery added','message');
                    $message->setMessage();
                    header('Location:about_gallery.php');
                    exit;
                    
                }else{
                    
                    $message    =   new Message('Unknown error','error');
                    $message->setMessage();
                }
                
        
       }
      
}
?>
<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
   <title>About Gallery </title>

    <meta name="description" content="blank page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />  
    
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
                           Update Speciality                       </h1>
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
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                           
                            <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                    <div class="widget">
                                        <div class="widget-header bordered-top bordered-palegreen">
                                            <span class="widget-caption"> Update Speciality  </span>
                                        </div>
                                        <div class="widget-body">
                                            <div class="collapse in">
                              <form role="form" method="post" enctype="multipart/form-data">
                  
                                                    <div class="form-group">
                                                        <label for="sminput">Title</label>
                                            <input type="text" name="title" class="form-control input-sm" id="sminput" value="<?php echo $get[0]["about_img_title"];?>">
                                                    </div>
													 
													  <div class="form-group">
                                                        <label for="sminput">Image</label>
                                                        
                                         <?php if($get_img[0]["abt_img_file"]!=''){?>
                                                  <div style="margin-top:10px; margin-bottom:5px;">
                                                   
                                                    <?php 
                                                        for ($i=0; $i < $get_total ; $i++) { 
                                                    
                                                    ?>
                                               <a id="myBtn" class="myBtnn"><img src="upload/Gallery/<?php echo $get_img[$i]
                                                   ['abt_img_file'];?>" height=70px width=120px style="margin: 10px"/> Edit</a><a href="delete_about_img.php?a_id=<?php echo $get_img[$i]
                                                   ['abt_img_id'];?>">Delete</a>
                                  
                                                   <?php }   } ?>
                                                                
                                                      
                                                   <input type="file" name="upload[]" class="form-control input-sm" id="sminput" multiple="multiple" >
                                                    </div>
                                                   
                                                       </div>
                                                 

  <div class="row">
                                 <div class="col-sm-1">
                          <label>Status</label>
                                                    </div>
                            <div class="col-sm-5">
                                                            <div class="input-group">
                                                            <select name="status" class="form-control select2" style="width: 100%;">
                     <option value="1" <?php if($get[0]['about_img_status']== 1){?> selected="selected"<?php }?> ><?php echo "Publish";?></option>
                     <option value="2" <?php if($get[0]['about_img_status']== 2){?> selected="selected"<?php }?> ><?php echo "Un Publish";?></option>
                                                                               
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                        <input type="submit" name="update" class="btn btn-primary btn-block" value="update">
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                   
                                                </form>
<?php 
                                                        for ($i=0; $i < $get_total ; $i++) { 
                                                    
                                                    ?>

                                                   <div id="myModal<?php echo $i; ?>" class="modal">

                                  <!-- Modal content -->
                     <div class="modal-content"  style="position: absolute; top: 25%; left: 25%; right:25%; overflow: visible; z-index:9999">
                                <div class="panel panel-primary ">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                        <i class="fa fa-fw fa-tint"></i> Edit Image
                                            </h3>
                                     <span  id="close" class="close pull-right close_span">
                                          <i class="fa fa-fw fa-times"></i>
                                         </span>
                                         </div>
                                    <div class="panel-body" >
                                                           
                                 <form  method="post" enctype="multipart/form-data">
                                                                  
                                 <div class="form-group form-actions">
                                 <div class="row"> <div class="col-sm-6">
                                              <img src="upload/Gallery/<?php echo $get_img[$i]['abt_img_file'];?>" height=170px width=220px style="margin: 10px"/>
                                               </div>
                                                <div class="col-sm-6">
                                                    <label for="sminput">Order</label>
                                           <input type="text" name="order" value="<?php echo $get_img[$i]['abt_img_order']; ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="sminput">Name</label>
                                           <input type="text" name="imgname" value="<?php echo $get_img[$i]['abt_img_order']; ?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="file" name="upload1">
                                       <input type="hidden" name="img_id" value="<?php echo $get_img[$i]['abt_img_id']; ?>"><input type="hidden" name="hidding" value="<?php echo $get_img[$i]['abt_img_file'];?>">
                                                </div></div>
                                                             
                                                             </div>
                                                                <div class="form-group form-actions">
                                                                    <div class="col-md-8 col-md-offset-4">
                                                                         <input style="width: 32%;" type="submit" name="submit" value="Save" class="btn btn-primary btn-block"/>
                                                                      
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                    </div>

                                </div> 
                                <?php } ?>
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

  <script src="assets/js/jquery-2.0.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
 <script src="assets/js/beyond.min.js"></script> 

    <!--Page Related Scripts-->
    <!--Summernote Scripts-->
    <script src="assets/js/editors/summernote/summernote.js"></script>
    <script>
     $('#summernote').summernote({ height: 300 });
        $('#summernote2').summernote({ height: 300 });
        $('#summernote3').summernote({ height: 300 });
        $('#summernote4').summernote({ height: 300 });
        $('#summernote5').summernote({ height: 300 });
    </script>
    <!--Google Analytics::Demo Only-->
   

    <script>
    // Get the modal
var modal = document.getElementsByClassName('modal');

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtnn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_span");

// When the user clicks the button, open the modal 
<?php for($i=0;$i<$get_total;$i++){ ?>
btn[<?php echo $i; ?>].onclick = function() {
    modal[<?php echo $i; ?>].style.display = "block";
}
        <?php } ?>

// When the user clicks on <span> (x), close the modal
<?php for($i=0;$i<$get_total;$i++){ ?>
span[<?php echo $i; ?>].onclick = function() {
    modal[<?php echo $i; ?>].style.display = "none";
}
<?php } ?>

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
</body>

</html>

