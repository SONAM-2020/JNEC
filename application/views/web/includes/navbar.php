

<header>
  <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <a href="#">
            <img src="<?php echo base_url();?>/upload/heeseb2.png" alt="" style="max-width:100%; height:auto;">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="header-bottom header-sticky d-lg-block d-xl-block ">
  <nav class="navbar navbar-expand-lg text-center">
    <a class="navbar-brand" href="#">HEESEB</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url();?>">HOME</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/loadpage/about/')">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/loadpage/events/')">EVENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/loadpage/members/')">PROJECT MEMBERS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/loadpage/download/')" >DOWNLOADS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            LINKS
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="https://www.jnec.edu.bt/en/">JNEC Web Link</a>
            <a class="dropdown-item" href="https://www.uibk.ac.at/en/">UIBK Web Link</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/loadpage/contact/')">CONTACT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="loadpage('<?php echo base_url();?>index.php?WebsiteController/loadpage/login/')">LOGIN</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
</header>

