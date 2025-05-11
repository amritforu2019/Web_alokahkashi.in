<?php ob_start(); include('con_base/functions.inc.php'); master_main();

$qry=mysqli_query($DB_LINK,"select * from tbl_jobs where id=".$_GET['edit']) or die(mysqli_error());
$row=mysqli_fetch_array($qry);


if(isset($_POST['submit']))
{
	 $url = strtolower(clean($_POST['title']).'.html'); 
	 
	 
		 
   require_once("uploader-file-master.php");
   $i1='';
   if (isset($_FILES['uploaded_file'])) 
   {
    uploadmaster("assets/upload/attachment/", 'uploaded_file');
    if ($finame != '') 
    {  
      $qry=mysqli_query($DB_LINK,"select attachment from tbl_jobs where id=".$_GET['edit']) or die(mysqli_error());
        $row=mysqli_fetch_array($qry);
        unlink('assets/upload/attachment/'.$row['attachment']);
      
      $f1= $finame;
      $i1=" , attachment='$f1'  ";
    }
  }
	 
		
		if(mysqli_query($DB_LINK,"update  tbl_jobs 
						 set
						`title`='".$_POST['title']."', 
						  `category`='".$_POST['category']."', 
						`c_name`='".$_POST['c_name']."', 
						`addr`='".$_POST['addr']."', 
						`city`='".$_POST['city']."', 
						`contact`='".$_POST['contact']."', 
						`email`='".$_POST['email']."', 
						`descr`='".$_POST['descr']."',
						`last_date`='".date('Y-m-d',strtotime($_POST['last_date']))."',
						  url='$url' 
              $i1
						  where   id='".$_POST['edit']."'
						  "))
		{
			$_SESSION['msg']=array('success', 'Updated Successfully');
    		header("location:job_list");
    		exit;
		}
		else
		{
			$_SESSION['msg']=array('error', 'Oops. Something went wrong');
    		header("location:job_list");
			exit;
		}
	 
}									   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title> Jobs Edit :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Jobs & Trainees</a></li>
          <li class="active">Edit Job</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Edit Job </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Job Title </label>
                <div class="col-sm-9">
                  <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" required value="<?php echo $row['title'];?>">
                  <input name="edit" type="hidden"  value="<?php echo $row['id'];?>">
                </div>
              </div>
               
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Category </label>
                    <div class="col-sm-9">
                      <select   name="category" class="chosen-select form-control" id="form-field-select-4" required >
                        <option value="">Select Category</option>
                        <option value="CA" <?php if($row['category']=='CA') echo 'selected';?>>CA</option>
                        <option <?php if($row['category']=='CS') echo 'selected';?> value="CS">CS</option>
                        <option <?php if($row['category']=='CMA') echo 'selected';?> value="CMA">CMA</option>                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Contact Person </label>
                <div class="col-sm-9">
                  <input name="c_name" type="text" class="form-control" id="c_name" placeholder="Enter Contact Person Name" required value="<?php echo $row['c_name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Address </label>
                <div class="col-sm-9">
                  <input name="addr" type="text" class="form-control" id="addr" placeholder="Enter Address" required value="<?php echo $row['addr'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> City </label>
                <div class="col-sm-9">
                  <input name="city" type="text" class="form-control" id="qqqqq" placeholder="Enter City Name" required value="<?php echo $row['city'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Phone No </label>
                <div class="col-sm-9">
                  <input name="contact" type="text" class="form-control" id="contact" placeholder="Enter Phone No" required value="<?php echo $row['contact'];?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Email Id </label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email Id" required value="<?php echo $row['email'];?>">
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Last Date </label>
                <div class="col-sm-9">
                  <input name="last_date" type="text" class="form-control" id="last_date" placeholder="Enter Last Date DD-MM-YYYY" required  value="<?php echo $row['last_date'];?>">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Description </label>
                <div class="col-sm-9">
                  <textarea name="descr" class="form-control" id="descr" placeholder="Enter Job Description"><?php echo $row['descr'];?></textarea>
                 
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Attachment </label>
                <div class="col-sm-4">
                  <input name="uploaded_file" type="file" id="id-input-file-2" >
                  ( PDF or Doc Files Optional)
                </div>
              </div>
              
            <?php /*?>  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Posted By </label>
                <div class="col-sm-9">
                 <select   name="posted_by" class="chosen-select form-control" id="posted_by" required  onChange="upd_data(this.value)">
                 <option value="" selected>POSTED BY</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="OTHER">OTHER</option>                     
                      </select>
                      
                </div>
              </div>
              
              <div class="form-group" id="post_upd" style="display:none;">
                <label class="col-sm-2 control-label no-padding-right"> OTHER </label>
                <div class="col-sm-9">
                  
                      <input name="other" type="text" class="form-control" id="other" placeholder="Enter Others Name"  >
                       
                </div>
              </div><?php */?>
              <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
              
                <button class="btn btn-info" type="submit" name="submit" data-last="Finish"> <i class="ace-icon fa fa-check bigger-110"></i> Update </button>
                
              </div>
            </div>
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