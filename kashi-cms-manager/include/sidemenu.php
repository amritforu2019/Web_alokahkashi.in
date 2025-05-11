<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
  <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
  <?php $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
$url = end($url_array);?>
  <ul class="nav nav-list">
    <li <?php if($url=='index' || $url==''){echo "class='active'";}?>> <a href="index"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>
    <li <?php if($url=='category_list'){echo "class='active'";}?>> <a href="category_list"  > <i class="menu-icon fa fa-globe"></i> <span class="menu-text">Website Content Manager</span> </a> </li>
    <li <?php if($url=='project' ){echo "class='active'";}?>> <a href="add_room"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Add Room </span> </a> </li>
    <li <?php if($url=='project_list' ){echo "class='active'";}?>> <a href="rooms_listing"  > <i class="menu-icon fa
    fa-table"></i> <span class="menu-text">Rooms Listing</span> </a> </li>

    <li <?php if($url=='contact' ){echo "class='active'";}?>> <a href="customer_requirement"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Customer Requirements Listing </span> </a> </li>
    <?php /* <li <?php if($url=='newsletter_email_list' || count_enq('tbl_newsletter ')){echo "class='active'";}?>> <a href="newsletter_email_list"  > <i class="menu-icon fa fa-mail-forward"></i> <span class="menu-text">Newsletter
                <?php if(count_enq('tbl_newsletter ')>0) echo '('.count_enq('tbl_newsletter ').')';?>
            </span> </a> </li>*/?>
    <li <?php if($url=='password'){echo "class='active'";}?>> <a href="password"  > <i class="menu-icon fa fa-key"></i> <span class="menu-text">Change Password</span> </a> </li>
    <li <?php if($url=='setting'){echo "class='active'";}?>> <a href="setting"  > <i class="menu-icon fa fa-cog"></i> <span class="menu-text"> Setting</span> </a> </li>
    <li <?php if($url=='logout'){echo "class='active'";}?>> <a href="logout"  > <i class="menu-icon fa fa-sign-out"></i> <span class="menu-text">Logout</span> </a> </li>
  </ul>
  <!-- /.nav-list -->
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
</div>
