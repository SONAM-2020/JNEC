<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url();?>index.php?adminController/dashboard" class="logo">
      <span class="logo-lg">JNEC</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="pull-left"><a href="<?php echo base_url() ?>" target="_blank" class="nav-link">Website Homepage</a></li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('Image');?>" onerror="this.src='<?php echo base_url();?>uploads/user1-128x128.jpg'" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('UserName');?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('Image');?>" onerror="this.src='<?php echo base_url();?>uploads/user1-128x128.jpg'" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('Name');?>
                  <small><?php echo $this->session->userdata('Designation');?></small>
              </li>
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                  </div>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?adminController/loadpage/userprofile/<?php echo $this->session->userdata('userId');?>')" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat"data-toggle="modal" data-target="#modal-logout">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content ">
            <div class="modal-header" style="background: green;">
              <h4 class="modal-title">Sign Out</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to logout ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url();?>index.php?loginController/logout"> <button type="button"  class="btn btn-primary">Yes</button></a>
            </div>
          </div>
        </div>
  </div>