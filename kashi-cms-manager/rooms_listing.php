<?php global $PDO_LINK;
ob_start();
include('con_base/functions.inc.php');
master_main();

// if (isset($_GET['del'])) {
//   $qry = $PDO_LINK->prepare("SELECT main_gallery_url, main_gallery FROM tbl_rooms WHERE room_id = :room_id");
//   $qry->execute(['room_id' => $_GET['del']]);
//   $row = $qry->fetch(PDO::FETCH_ASSOC);

//   unlink('../' . $row['main_gallery_url'] . $row['main_gallery']);
   

//   $stmt = $PDO_LINK->prepare("DELETE FROM tbl_rooms WHERE room_id = :room_id");
//   $stmt->execute(['room_id' => $_GET['del']]);

//   $_SESSION['msg'] = array('success', 'Deleted Successfully');
//   header("location:rooms_listing");
//   exit;
// }
// if (isset($_REQUEST['ban'])) {
//   $stmt = $PDO_LINK->prepare("UPDATE tbl_project SET status = 0 WHERE project_id = :project_id");
//   $stmt->execute(['project_id' => $_REQUEST['ban']]);

//   $_SESSION['msg'] = array('success', 'Unpublish Successfully');
//   header("Location: project_list");
//   exit;
// }
// if (isset($_REQUEST['unban'])) {
//   $stmt = $PDO_LINK->prepare("UPDATE tbl_project SET status = 1 WHERE project_id = :project_id");
//   $stmt->execute(['project_id' => $_REQUEST['unban']]);

//   $_SESSION['msg'] = array('success', 'Published Successfully');
//   header("Location: project_list");
//   exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>Room Listing :: <?php echo $SITE_NAME; ?></title>
  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <?php include("include/header_file.php"); ?>
  <script type="text/javascript">
    function cp(a, b, c) {
      window.location.href = "cust_list?txtsearch=" + a + "&fdt=" + b + "&tdt=" + c;
    }
  </script>
  
  <style>
     .toggle-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.toggle-row {
  text-align: center;
}

.toggle-button {
  width: 40px;
  height: 20px;
  border: 1px solid #ff4d4d;
  border-radius: 20px;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 3px;
  cursor: pointer;
  transition: background-color 0.3s, border-color 0.3s;
  position: relative;
}

.toggle-button.active {
  border-color: #4caf50;
  background-color: #4caf50;
}

.toggle-button .circle {
  width: 15px;
  height: 15px;
  background-color: #ff4d4d;
  border-radius: 50%;
  transition: transform 0.3s, background-color 0.3s;
  position: absolute;
}

.toggle-button.active .circle {
  transform: translateX(20px);
  background-color: white;
}
  </style>
</head>

<body class="no-skin">
  <?php include('include/header.php'); ?>
  <?php include('include/sidemenu.php'); ?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Rooms Listing</a></li>
          <li class="active">Rooms Listing</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
        <div class="page-header">
          <h1> Rooms Listing </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="add_room" class="btn btn-primary"> <i
                class="fa fa-plus"></i> Add New Room </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
            <table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>

                  <th>Room Type (Title)</th>
                  <th>Short Description</th>
                  <th>No. of Guests</th>
                  <th>No. of Rooms</th>
                  <th>Area</th>
                  <th><i class="menu-icon fa fa-image"></i> Main Gallery</th>
                  <th><i class="menu-icon fa fa-image"></i> Detailed Gallery</th>
                  <th><i class="menu-icon fa fa-image"></i> Amenities Icons</th>
                  <th><i class="menu-icon fa fa-action"></i> Status</th>
                  <th><i class="menu-icon fa fa-action"></i> Actions</th>
                  <!--<th>Main Image</th>
                  <th>Floor Plan</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $qry = $PDO_LINK->prepare("SELECT * FROM tbl_rooms ORDER BY room_id DESC");
                $qry->execute();
                foreach ($qry as $row) {
                ?>
                  <tr class="table-activity">
                    <td><?php echo $i; ?></td>
                    <td><?php echo ($row['room_type']); ?></td>
                    <td><?php echo data_cutter($row['short_desc'],20); ?></td>
                    <td><?php echo ($row['guests']); ?></td>
                    <td><?php echo ($row['rooms']); ?></td>
                    <td><?php echo ($row['area']); ?></td> 
                    
                    
                      <td>
                      <a href="project_gallery?project_id=<?php echo $row['room_id']; ?>" class="blue" title="Gallery">Add
                        New</a><br><a href="project_gallery_list?project_id=<?php echo $row['room_id']; ?>" class="blue"
                        title="Gallery">
                        List (<?php
                              $countQry = $PDO_LINK->prepare("SELECT COUNT(*) FROM tbl_project_gallery WHERE project_id = :room_id");
                              $countQry->execute(['room_id' => $row['room_id']]);
                              echo $countQry->fetchColumn();
                              ?>)
                      </a>
                    </td>  
                    <td>
                      <a href="detailed_gallery?project_id=<?php echo $row['room_id']; ?>" class="blue" title="Gallery">Add
                        New</a><br><a href="detailed_gallery_list?project_id=<?php echo $row['room_id']; ?>" class="blue"
                        title="Gallery">
                        List (<?php
                              $countQry = $PDO_LINK->prepare("SELECT COUNT(*) FROM tbl_detailed_gallery WHERE project_id = :room_id");
                              $countQry->execute(['room_id' => $row['room_id']]);
                              echo $countQry->fetchColumn();
                              ?>)
                      </a>
                    </td>
                    <td>
                      <a href="amenities_icons?project_id=<?php echo $row['room_id']; ?>" class="blue" title="Gallery">Add
                        New</a><br><a href="amenities_icons_list?project_id=<?php echo $row['room_id']; ?>" class="blue"
                        title="Gallery">
                        List (<?php
                              $countQry = $PDO_LINK->prepare("SELECT COUNT(*) FROM tbl_amenities_icons WHERE project_id = :room_id");
                              $countQry->execute(['room_id' => $row['room_id']]);
                              echo $countQry->fetchColumn();
                              ?>)
                      </a>
                    </td>
                    <td>
                       <div class="toggle-container">
                          <div id="toggleButton" class="toggle-button">
                            <div class="circle"></div>
                          </div>
                        </div>
                    </td>
                    <td>
                      <button><a href="project_edit?edit=<?php echo $row['room_id']; ?>" title="Edit" class="blue">
                          <i class="ace-icon fa fa-pencil bigger-125"></i>
                        </a></button>&nbsp;&nbsp;
                        <!-- <button>
                          <a class="red" onClick="return del(<?php //echo $row['project_id']; ?>, 'project_list')">
                          <i class="ace-icon fa fa-times bigger-125" title="Delete"></i>
                        </a>
                        </button> -->
                    </td>
                    

                    <!-- <td>
                      <?php
                      // if ($row['main_image'] == '') {
                      //   echo 'No Image..';
                      // } else {
                      //   echo '<a class="various fancybox.iframe blue" href="' . $row['main_image_url'] . '' . $row['main_image'] . '" ><img src="' . $row['main_image_url'] . '' . $row['main_image'] . '"  style="border-radius: 0%;max-width: 100px;"></a>';
                      // }
                      ?>
                    </td> -->
                    <!-- <td>
                      <?php
                      // if ($row['floorplan_image'] == '') {
                      //   echo 'No Image..';
                      // } else {
                      //   echo '<a class="various fancybox.iframe blue" href="' . $row['floorplan_image_url'] . '' . $row['floorplan_image'] . '" ><img src="' . $row['floorplan_image_url'] . '' . $row['floorplan_image'] . '"  style="border-radius: 0%;max-width: 100px;"></a>';
                      // }
                      ?>
                    </td> -->
                  </tr>
                <?php $i++;
                    $id = $row['room_id'];   
                    $project_name_c =strtolower(clean(data_cutter($row['room_type'], 50)));
                    $project_url =   $project_name_c. '-' .$id;
                  if ($row['url'] != $project_name_c) {                                   
                    $qry_upd = $PDO_LINK->prepare("update tbl_rooms set url='$project_name_c' where room_id ='$id' ");
                    $qry_upd->execute();
                  } 
                 } ?>
              </tbody>

            </table>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>

            </div>
          </div>
        </div>

        <!-- /.col -->
        <!-- /.row -->
      </div>
      <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    <?php include('include/footer.php'); ?>
    <?php include("include/footer_file.php"); ?>
    <script>
    // Get all toggle buttons on the page
    const toggleButtons = document.querySelectorAll(".toggle-button");

    // Add event listener for each toggle button
    toggleButtons.forEach(button => {
      button.addEventListener("click", () => {
        button.classList.toggle("active");
      });
    });
  </script>
</body>

</html>
 