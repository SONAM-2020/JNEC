
<div class="body-wrapper">
<?php
    $this->load->view('web/includes/navbar.php');
?>
  <div class="slider-with-banner">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12">
                  <div class="slider-area">
                      <div class="slider-active owl-carousel">
                          <?php 
                          $t_slider = array_reverse($t_slider);
                          foreach($t_slider as $i=> $event): ?>
                          <div class="single-slide align-center-left  animation-style-01 bg-1" style="background-image: url('<?php echo base_url();?><?php echo$event['Image'];?>" >
                              <div class="slider-progress"></div>
                          </div>
                          <?php endforeach;?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <br><br><br><br>
  
  
  <div>
  <div  style=" background-color: #f7f7f7;
  padding: 20px;
  margin-bottom: 20px;
  max-width: 1500px;
  margin: 0 auto;">
      <h1 className="project-title mt-3" style=" font-size: 24px;
  color: #333;
  margin-top: 0;
  text-align: center;">
        <b>
          Strengthening Capacity of Higher Engineering Education for Sustainable
          Buildings (HEESeB)
        </b>
      </h1>
      <p className="project-details mt-5" style="  font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-top: 30px;                                 
  margin-bottom: 0;
  margin-left: auto;
  margin-right: auto;
  text-align: justify;">
        Jigme Namgyel Engineering College in collaboration with Innsbruck
        University, Austria has been awarded APPEAR (Austrian Partnership
        Programme in Higher Education and Research for Development) project in
        its ninth call for Academic partnership. APPEAR is a programme of the
        Austrian Development Cooperation (ADC) with the aim to implement its
        strategy for support of higher education and research for development on
        an academic institutional level in the ADC’s priority countries and key
        regions European Union Grant (Erasmus+) for a project titled
        “Strengthening problem-based learning in South Asian Universities” (PBL
        South Asia). The project is being coordinated by JNEC.
      </p>
      <p className="project-objectives mt-5" style=" font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-top: 30px;
  margin-left: auto;
  margin-right: auto;">
        <b className="text-dark">Partners:</b> Jigme Namgyel Engineering College
        (JNEC-RUB), Royal University of Bhutan, BHUTAN and University of
        Innsbruck (UBIK), AUSTRIA
      </p>
      <p className="project-details" style="  font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-bottom: 0;
  margin-left: auto;
  margin-right: auto;
  text-align: center;">
        <i>
          <b className="text-dark">
            Project Duration: 1st February 2023 – 31st January 2026
          </b>
        </i>
      </p>
      <p className="project-objectives mt-3 " style=" font-size: 18px;
  color: #666;
  line-height: 1.5;
  margin-top: 0;
  margin-left: auto;
  margin-right: auto;">
        <b className="text-dark">Project objectives: </b>
      </p>
      <ul style="font-size: 18px;
           line-height: 1.5;
           list-style-type: disc;">
 <i></i> <li>Develop new academic programme on timber engineering for energy efficient buildings leading to an award of “Certificate in Timber Engineering for Energy Efficient Buildings” including associated laboratory</li>
  <li>Develop two new courses at JNEC: Gender, equity and diversity sensitive science, technology, engineering and mathematics (STEM); Building modelling and simulation, and HVAC</li>
  <li>Enhance teaching and research capacity of JNEC</li>
  <li>Improve Instructional Support Services at JNEC</li>
  <li>Internationalise UIBK</li>
</ul>

    </div>

  </div>
  
 

 



<div class="product-area pt-60 pb-50">
  <div class="container">
    <div class="tab-content">
      <div id="li-new-product" class="tab-pane active show" role="tabpanel">
        <div class="row">
        <?php $count = 0; foreach(array_reverse($t_news) as $i => $event):
            if ($count == 4) break;
        ?>
            <div class="col-lg-3">
              <div class="single-product-wrap">
             <div class="product-image" >
 
    <img src="<?php echo $event['Image']; ?>" alt="Li's Product Image" style="width: 100%; height: 200px;">

</div>

                <div class="product_desc">
                  <div class="product_desc_info">
                    <div class="product-review">
                      <h5 class="manufacturer">
                        <h4><?php echo $event['Name']; ?></h4>
                      </h5>
                    </div>
                    <span class="new-price"><?= substr(strip_tags($event['Description']), 0, 300) . '............'; ?></span>
                  </div>
                  <ul class="add-actions-link m-md-5">
                    <li class="add-cart active"><a href="#" onclick="loadpage('<?php echo base_url(); ?>index.php?websiteController/load_NewsDestails/<?= $event['Id'] ?>')">View Details</a></li>
                  </ul>
                </div> <!-- missing closing tag for product_desc div -->
              </div>
            </div>
             <?php $count++; endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
