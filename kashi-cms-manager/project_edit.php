<?php global $PDO_LINK, $SITE_URL;
ob_start(); include('con_base/functions.inc.php');
master_main();
if(isset($_GET['edit'])) {
 try {

  // Fetch the project details from the database
  $stmt = $PDO_LINK->prepare("SELECT * FROM tbl_rooms WHERE room_id = :project_id");
  $stmt->bindParam(':project_id', $_GET['edit']);
  $stmt->execute();

  // Fetch the project data
  $project = $stmt->fetch(PDO::FETCH_ASSOC);
 } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
 }
}

if(isset($_POST['submit']))
{

 $project_id = $_POST['room_id'];

 // Fetch the project details from the database
 $stmt = $PDO_LINK->prepare("SELECT * FROM tbl_rooms WHERE room_id = :project_id");
 $stmt->bindParam(':project_id', $_GET['edit']);
 $stmt->execute();

 // Fetch the project data
 $project = $stmt->fetch(PDO::FETCH_ASSOC);

 // Retrieve form data
  
 $room_type = $_POST['room_type'];
 $short_desc = $_POST['short_desc'];
 $rooms = $_POST['rooms'];
 $area = $_POST['area'];
 $guests = $_POST['guests'];
  
//  $floorplan_image=null;
//  $floorplan_image_url=null;


//  require_once("uploader-file-master.php");
//  if (isset($_FILES['floorplan_image']))
//  {
//   $img_name="";
//   $fname =  rand(100, 999) . "_" ;
//   $FileName = $fname . "_" . time();
//   $FileUrl = "../upload/project/" . date("Y") . "/" . date("M") . "/";
//   $DBFileUrl = $SITE_URL."/upload/project/" . date("Y") . "/" . date("M") . "/";
//   uploadmaster_name($FileUrl, 'floorplan_image', $FileName);
//   if ($img_name != '')
//   {
//   $floorplan_image=$img_name;
//   $floorplan_image_url=$DBFileUrl;
//   ///Unlink Previous Image
//    unlink('../'.$project['floorplan_image_url'].$project['floorplan_image']);
//   }
//  }

//  if (isset($_FILES['main_image']))
//  {
//   $img_name="";
//   $fname =  rand(100, 999) . "_" ;
//   $FileName = $fname . "_" . time();
//   $FileUrl = "../upload/project/" . date("Y") . "/" . date("M") . "/";
//   $DBFileUrl =$SITE_URL."/upload/project/" . date("Y") . "/" . date("M") . "/";
//   uploadmaster_name($FileUrl, 'main_image', $FileName);

//   if ($img_name != '')
//   {
//   $main_image=$img_name;
//   $main_image_url=$DBFileUrl;
//    ///Unlink Previous Image
//    unlink('../'.$project['main_image_url'].$project['main_image']);
//   }
//  }


  // Prepare an SQL statement

 $sql = "
        UPDATE tbl_rooms
        SET 
           
            room_type = :room_type, 
             short_desc = :short_desc, 
            guests = :guests,
            rooms = :rooms,
            area = :area
            WHERE room_id = :project_id";
  //            .
  // ($floorplan_image ? ", floorplan_image = :floorplan_image,floorplan_image_url=:floorplan_image_url" : "") .
  // ($main_image ? ", main_image = :main_image , main_image_url=:main_image_url" : "") 
  //            .

  $stmt = $PDO_LINK->prepare($sql);

  // Bind parameters to the prepared statement
  $stmt->bindParam(':room_type', $room_type);
  $stmt->bindParam(':short_desc', $short_desc);
  $stmt->bindParam(':guests', $guests);
  $stmt->bindParam(':rooms', $rooms);
  $stmt->bindParam(':area', $area);
  $stmt->bindParam(':project_id', $project_id);
   

 // Bind optional parameters for images
//  if ($floorplan_image) {
//   $stmt->bindParam(':floorplan_image', $floorplan_image);
//   $stmt->bindParam(':floorplan_image_url', $floorplan_image_url);
//  }
//  if ($main_image) {
//   $stmt->bindParam(':main_image', $main_image);
//   $stmt->bindParam(':main_image_url', $main_image_url);
//  }
try {
  // Execute the statement
 $stmt->execute();
 $_SESSION['msg']=array('success', 'Updated Successfully');
 header("location:rooms_listing");
 exit;
} catch(PDOException $e) {
 //echo " Error: " . $e->getMessage();
 //exit;
 $_SESSION['msg']=array('error', "Oops. Something went wrong!!! "." Error: " . $e->getMessage());
 header("location:rooms_listing");
 exit;
}

}									   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title> Edit Room  :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Edit Room</a></li>
          <li class="active">Edit Room</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Edit New Room </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
                <table class="table table-bordered table-striped">
                  
                 <tr>
                  <td><label for="project_name">Room Type (Title):</label></td>
                  <td><input type="text" class="form-control" id="project_name" name="room_type" value="<?php echo
                   $project['room_type']; ?>" required>

                   <input type="hidden"  id="project_id" name="room_id" value="<?php echo
                   $project['room_id']; ?>"  ></td>
                 </tr>
                 <tr>
                   <td><label for="description">Short Description:</label></td>
                   <td><input type="text" class="form-control" id="project_name" name="short_desc" value="<?php echo
                   $project['short_desc']; ?>" required></td>
                 </tr>
                 <tr>
                  <td><label for="guests">No. of Guests:</label></td>
                  <td><input type="text" class="form-control" id="location" name="guests" value="<?php echo $project['guests']; ?>"
                             required></td>
                 </tr>
                 <tr>
                  <td><label for="rooms">No. of Rooms:</label></td>
                  <td><input type="text" class="form-control" id="rate" name="rooms" value="<?php echo $project['rooms']; ?>" required></td>
                 </tr>
                 <tr>
                  <td><label for="area">Area:</label></td>
                  <td><input type="text" class="form-control" id="rate" name="area" value="<?php echo $project['area']; ?>" required></td>
                 </tr>
                  
                  
                  
                  
                  

               <tr>
                <td colspan="2" style="text-align:center;">
                 <input type="submit" name="submit" value="Update">
                </td>
               </tr>
              </table>
             </form>

          </div>
        </div>
      </div>
      <!-- /.col -->
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
  <!-- /.main-content -->
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>

</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>