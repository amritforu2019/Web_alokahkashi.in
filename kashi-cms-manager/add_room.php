<?php global $PDO_LINK, $SITE_URL;
ob_start(); include('con_base/functions.inc.php');
master_main();

if(isset($_POST['submit']))
{

 // Retrieve form data
 //$typ = $_POST['typ'];
 //$location = $_POST['location'];
 //$rate = $_POST['rate'];
 //$video = $_POST['video'];
 //$features = $_POST['features'];
 //$floorplan_image="";
 //$floorplan_image_url="";
 $room_name = $_POST['room_name'];
 $short_desc = $_POST['short_desc'];
 $rooms = $_POST['rooms'];
 $guests = $_POST['guests'];
 $area = $_POST['area'];


 //require_once("uploader-file-master.php");
//  if (isset($_FILES['floorplan_image']))
//  {
//   $img_name="";
//   $fname =  rand(100, 999) . "_" ;
//   $FileName = $fname . "_" . time();
//   $FileUrl = "../upload/project/" . date("Y") . "/" . date("M") . "/";
//   $FileUrl_db = $SITE_URL."/upload/project/" . date("Y") . "/" . date("M") . "/";
//   uploadmaster_name($FileUrl, 'floorplan_image', $FileName);
//   if ($img_name != '')
//   {
//   $floorplan_image=$img_name;
//   $floorplan_image_url=$FileUrl_db;
//   }
//  }

//  if (isset($_FILES['main_image']))
//  {
//   $img_name="";
//   $fname =  rand(100, 999) . "_" ;
//   $FileName = $fname . "_" . time();
//   $FileUrl = "../upload/project/" . date("Y") . "/" . date("M") . "/";
//   $FileUrl_db = $SITE_URL."/upload/project/" . date("Y") . "/" . date("M") . "/";
//   uploadmaster_name($FileUrl, 'main_image', $FileName);
//   if ($img_name != '')
//   {
//   $main_image=$img_name;
//   $main_image_url=$FileUrl_db;
//   }
//  }

  // Prepare an SQL statement
  $stmt = $PDO_LINK->prepare("
        INSERT INTO tbl_rooms (room_type, short_desc, rooms, guests, area)
        VALUES (:room_name, :short_desc, :rooms, :guests, :area)
    ");

  // Bind parameters to the prepared statement
  //$stmt->bindParam(':typ', $typ);
  //$stmt->bindParam(':location', $location);
  //$stmt->bindParam(':rate', $rate);
  //$stmt->bindParam(':floorplan_image', $floorplan_image);
  // $stmt->bindParam(':floorplan_image_url', $floorplan_image_url);
  // $stmt->bindParam(':video', $video);
  // $stmt->bindParam(':main_image', $main_image);
  // $stmt->bindParam(':main_image_url', $main_image_url);
  // $stmt->bindParam(':features', $features);
  $stmt->bindParam(':room_name', $room_name);
  $stmt->bindParam(':short_desc', $short_desc);
  $stmt->bindParam(':guests', $guests);
  $stmt->bindParam(':rooms', $rooms);
  $stmt->bindParam(':area', $area);
try {
  // Execute the statement
  $stmt->execute();
 $_SESSION['msg']=array('success', 'Inserted Successfully');
 header("location:rooms_listing");
 exit;
} catch(PDOException $e) {
 //echo " Error: " . $e->getMessage();
 //exit;
 $_SESSION['msg']=array('error', "Oops. Something went wrong!!! "." Error: " . $e->getMessage());
 header("location:add_room");
 exit;
}



}									   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title> Add Room :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Add Room</a></li>
          <li class="active">Add New Room</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add New Room </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-8">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" target="_parent">
                <table class="table table-bordered table-striped">

                 <tr>
                <td><label for="project_name">Room Type (Title):</label></td>
                <td><input type="text" class="form-control"  id="room_name" name="room_name" required></td>
               </tr>
                
               <tr>
                <td><label for="description">Short Description:</label></td>
                <td><input type="text" class="form-control"  id="short_desc" name="short_desc" required></td>
               </tr>
               <tr>
                <td><label for="guests">No. of Guests:</label></td>
                <td><input type="text" class="form-control"  id="guests" name="guests" required></td>
               </tr>
               <tr>
                <td><label for="rooms">No. of Rooms:</label></td>
                <td><input type="text" class="form-control"  id="rooms" name="rooms" required></td>
               </tr>
               <tr>
                <td><label for="area">Area:</label></td>
                <td><input type="text" class="form-control"  id="area" name="area" required></td>
               </tr>
               <!-- <tr>
                <td><label for="floorplan_image">Floorplan Image:</label></td>
                <td><input type="file" class="form-control" id="floorplan_image" name="floorplan_image" required></td>
               </tr> -->
               <!-- <tr>
                <td><label for="video">Video (URL Youtube Code):</label></td>
                <td><input type="text" class="form-control" placeholder="Ni055HnlRDc " id="video" name="video">
                <span>For Example https://www.youtube.com/watch?v=<b>Ni055HnlRDc</b> Only This Code</span></td>
               </tr> -->
               <!-- <tr>
                <td><label for="main_image">Main Image:</label></td>
                <td><input type="file" class="form-control" id="main_image" name="main_image" required></td>
               </tr> -->
               <tr>
                <td colspan="2" style="text-align:center;">
                 <input type="submit" name="submit" value="Submit">
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