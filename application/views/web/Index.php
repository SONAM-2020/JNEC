<?php header('Access-Control-Allow-Origin: *'); ?>
<?php $this->load->view('web/includes/head.php'); ?> 
<body>
    <div id="mainpublicContent">
    	<?php $this->load->view('web/includes/home.php'); ?> 
    </div>
  <?php
      $this->load->view('web/includes/footer.php');
  ?>
 
