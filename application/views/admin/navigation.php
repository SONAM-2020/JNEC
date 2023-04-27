<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('Image');?>" onerror="this.src='<?php echo base_url();?>uploads/user1-128x128.jpg'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('UserName');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#"class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/AddUsers/')">
            <i class="fa fa-laptop"></i>
            <span>User Management</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-laptop"></i>
            <span>Front Page Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/Addslider/')">Home Slider</a></li>
            <li><a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/AddEvents/')">Events</a></li>
            <li><a href="#" class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/Download/')">Download</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#"class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/Guidelines/')">
            <i class="fa fa-laptop"></i>
            <span>Application Guidelines</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#"class="nav-link" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/userprofile/<?php echo $this->session->userdata('userId');?>')">
            <i class="fa fa-laptop"></i>
            <span>My Account</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
      </ul>
    </section>
  </aside>



