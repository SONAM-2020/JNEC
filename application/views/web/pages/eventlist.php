<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    $this->load->view('web/includes/head.php');
?>
<body>
  <div id="mainpublicContent">
    <?php
    $this->load->view('web/includes/navbar.php');
?>
    <div class="bg-info">
        <div class="container">
            <div class="breadcrumb-content pl-10">
                <ul>
                    <li class="text-white"><b>Home/Events</b></li>
                </ul>
            </div>
        </div>
      </div>
    <div class="li-main-blog-page pt-60 pb-55">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                  <div class="row li-main-content">
                    <?php foreach($t_news as $i=> $event): ?>
                      <div class="col-sm-6 col-md-6 col-lg-4 col-xs-12">
                          <div class="li-blog-single-item pb-25">
                              <div class="li-blog-banner">
                                  <a href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/load_NewsDestails/<?=$event['Id']?>')"><img class="img-full" src="<?php echo$event['Image'];?>" alt=""></a>
                              </div>
                              <div class="li-blog-content">
                                  <div class="li-blog-details">
                                      <h3 class="li-blog-heading pt-25"><a href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/load_NewsDestails/<?=$event['Id']?>')" style="text-align: justify;"><?php echo$event['Name'];?></a></h3>
                                      <div class="li-blog-meta">
                                          <a class="post-time" href="#"><i class="fa fa-calendar"></i><?php echo$event['Date'];?></a>
                                      </div>
                                      <p style="text-align: justify;"><?=  substr(strip_tags($event['Description']), 0, 200).'............';?></p>
                                      <a class="read-more" href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/load_NewsDestails/<?=$event['Id']?>')">READ MORE...</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
</body>



