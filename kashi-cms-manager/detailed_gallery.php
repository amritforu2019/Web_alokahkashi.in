<?php global $PDO_LINK, $SITE_URL;
ob_start(); include('con_base/functions.inc.php');
master_main();

if(isset($_POST['submit']))
{

 // Retrieve form data
 
 $project_id = $_POST['project_id'];
 $image="";
 $image_url="";


 require_once("uploader-file-master.php");
 if (isset($_FILES['image']))
 {
  $img_name="";
  $fname =  rand(100, 999) . "_" ;
  $FileName = $fname . "_" . time();
  $FileUrl = "../upload/project/" . date("Y") . "/" . date("M") . "/";
  $FileUrl_db = $SITE_URL."/upload/project/" . date("Y") . "/" . date("M") . "/";
  uploadmaster_name($FileUrl, 'image', $FileName);
  if ($img_name != '')
  {
  $image=$img_name;
  $image_url=$FileUrl_db;
  }
 }

 


  // Prepare an SQL statement
  $stmt = $PDO_LINK->prepare("
        INSERT INTO tbl_detailed_gallery (project_id,image,image_url)
        VALUES (:project_id, :image,:image_url)
    ");

  // Bind parameters to the prepared statement
  $stmt->bindParam(':project_id', $project_id); 
  $stmt->bindParam(':image', $image);
  $stmt->bindParam(':image_url', $image_url);

try {
  // Execute the statement
  $stmt->execute();
 $_SESSION['msg']=array('success', 'Inserted Successfully');
 header("location:detailed_gallery_list?project_id=".$project_id);
 exit;
} catch(PDOException $e) {
 //echo " Error: " . $e->getMessage();
 //exit;
 $_SESSION['msg']=array('error', "Oops. Something went wrong!!! "." Error: " . $e->getMessage());
 header("location:project");
 exit;
}



}									   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title> Project Gallery Add :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Project</a></li>
          <li class="active">Add New Project Image</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add New Project Image</h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
             <input type="hidden"  id="project_id" name="project_id" value="<?php echo
             $_GET['project_id']; ?>"  >
             <table class="table table-bordered table-striped">
                <tr>
                <td><label for="main_image">Main Image:</label></td>
                <td><input type="file" class="form-control" id="image" name="image" required></td>
               </tr>
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