<?php ob_start();
      include('con_base/functions.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Login -<?php echo $SITE_NAME;?></title>
<meta name="description" content="User login page" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="login-layout light-login">
<div class="main-container">
  <div class="main-content">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="login-container">
          <div class="center">
              <h3> <span class="red"><?php echo $SITE_NAME;?></span> </h3>
           <!--   <h1><span class="blue" id="id-text2">Administrator Login </span></h1>
       -->   </div>
          <div class="space-6"></div>
          <div class="position-relative">
            <div id="login-box" class="login-box visible widget-box no-border">
              <div class="widget-body">
                <div class="widget-main">
                  <h4 class="header blue lighter bigger text-center"> <i class="fa fa-lock"></i> Administrator Login  </h4>
                  <div class="space-6"></div>
                  <form action="login" method="post">
                    <fieldset>
                        <label class="label-holder">User Id / Login Id</label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" placeholder="Username" name="loginid" required />
                        <i class="ace-icon fa fa-user"></i> </span> </label>
                        <label class="label-holder">Password</label>
                      <label class="block clearfix"> <span class="block input-icon input-icon-right">
                        <input type="password" class="form-control" placeholder="Password" name="password" required />
                        <i class="ace-icon fa fa-lock"></i> </span> </label>
                      <div class="space"></div>
                      <div class="clearfix"> <a href="../" >Go Home</a>
                        <input name="previous_pg" type="hidden" id="previous_pg" value="<?php if(isset($_GET['previous_pg'])) echo $_GET['previous_pg']?>">
                        <button type="submit" class="  pull-right btn btn-sm btn-primary" name="Login"> <i class="ace-icon fa fa-key"></i> <span class="bigger-110">Control Panel Sign In</span> </button>
                      </div>
                      <br>
                      <div class="col-md-12 text-center">
                        <span>Developed By <a href="http://www.devindia.in" target="_blank">Dev India IT Services</a> </span>
                      </div>
                      <div class="space-4"></div>
                    </fieldset>
                  </form>
                </div>
                <!-- /.widget-main -->
              </div>
            </div>
            <!-- /.widget-body -->
          </div>
          <!-- /.login-box -->
        </div>
        <!-- /.position-relative -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- /.main-content -->
</div>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>
