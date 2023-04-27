<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    $this->load->view('web/includes/head.php');
?>
<?php
  error_reporting(0);
?>
<body>
<?php
    $this->load->view('web/includes/navbar.php');
?>
  <div id="mainpublicContent">
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <li class="active">Acknowledgement</li>
                </ul> 
            </div>
        </div>
    </div>
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <?php  
                    if($message!='Undefined' && $message!=''){
                ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 bg-info text-white pt-10 text-center">
                        <p><?=$message?></p>
                    </div>
                <?php
                    }else{
                ?>  
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 bg-danger text-white pt-10 text-center">
                        <p><?=$messagefail?></p>
                    </div>
                <?php
                    }
                ?> 
            </div>
        </div>
    </div>
</div>
<?php
      $this->load->view('web/includes/footer.php');
  ?>
</body>
</html>
