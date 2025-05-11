<div id="navbar" class="navbar navbar-default          ace-save-state">
  <div class="navbar-container ace-save-state" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar"> <span class="sr-only">Toggle
    sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-header pull-left"> <a href="index" class="navbar-brand">  <img src="assets/images/logo.png" style="border-radius:2px;  height: 30px;"/>   </a> </div>
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">
        <li class="light-blue dropdown-modal"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <img class="nav-user-photo" src="assets/images/avatars/avatar2.png" alt="Jason's Photo" /> <span class="user-info"> <?php echo $_SESSION['master_username'];?> <small>**</small> </span> <i class="ace-icon fa fa-caret-down"></i> </a>
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li> <a href="password"  > <i class="ace-icon fa fa-key"></i> Change Password </a> </li>
            <li class="divider"></li>
            <li> <a href="logout"> <i class="ace-icon fa fa-power-off"></i> Logout </a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-container -->
</div>
<div class="main-container ace-save-state" id="main-container">
  <script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
