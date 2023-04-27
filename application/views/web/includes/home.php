
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
                          <?php foreach($t_slider as $i=> $event): ?>
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
  
  
  
  <div class="container">
    <div class="row">
      <h4 style="text-align:center; color: green;"><b>Project title:</b> Strengthening Capacity of Higher Engineering Education for Sustainable Buildings (HEESeB)</h4>
      <br>
      <p style="text-align: center;">Jigme Namgyel Engineering College in collaboration with Innsbruck University, Austria has been awarded APPEAR (Austrian Partnership Programme in Higher Education and Research for Development) project in its ninth call for Academic partnership. APPEAR is a programme of the Austrian Development Cooperation (ADC) with the aim to implement its strategy for support of higher education and research for development on an academic institutional level in the ADC’s priority countries and key regions European Union Grant (Erasmus+) for a project titled “Strengthening problem-based learning in South Asian Universities” (PBL South Asia). The project is being coordinated by JNEC.</p>
      <br><br><br>
      <p style="text-align:center;"><b>Partners:</b> Jigme Namgyel Engineering College (JNEC-RUB), Royal University of Bhutan, BHUTAN and University of Innsbruck (UBIK), AUSTRIA</p>
      <p style="text-align:center;"><b>Project Duration:</b> 1st February 2023 – 31st January 2026</p>
      <br><br><br>
   </div>
  </div>
  <div class="container">
    <div class="row">
      <h5 style="text-align:center;">Project objectives:</h5>
    <ul>
      <li>1. Develop new academic programme on timber engineering for energy efficient buildings leading to an award of “Certificate in Timber Engineering for Energy Efficient Buildings” including associated laboratory; </li>
      <li>2. Develop two new courses at JNEC: Gender, equity and diversity sensitive science, technology, engineering and mathematics (STEM); Building modelling and simulation, and HVAC.</li>
      <li>3. Enhance teaching and research capacity of JNEC; </li>
      <li>4. Improve Instructional Support Services at JNEC; </li>
      <li>5. Internationalise UIBK.</li>
    </ul>
    </div>
  </div>
  <div class="product-area pt-60 pb-50">
      <div class="container">
          <div class="tab-content">
              <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                  <div class="row">
                      <div class="product-active owl-carousel">
                             <?php foreach($t_news as $i=> $event): ?>
                          <div class="col-lg-12">
                              <div class="single-product-wrap">
                                  <div class="product-image">
                                      <a href="single-product.html">
                                          <img src="<?php echo$event['Image'];?>" alt="Li's Product Image">
                                      </a>
                                  </div>
                                  <div class="product_desc">
                                      <div class="product_desc_info">
                                          <div class="product-review">
                                              <h5 class="manufacturer">
                                                  <a href="#"><?php echo$event['Name'];?></a>
                                              </h5>
                                          </div>
                                              <span class="new-price"><?=  substr(strip_tags($event['Description']), 0, 300).'............';?></span>
                                          </div>
                                          <ul class="add-actions-link m-md-5" >
                                              <li class="add-cart active"><a href="#" onclick="loadpage('<?php echo base_url();?>index.php?websiteController/load_NewsDestails/<?=$event['Id']?>')">View Details</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php endforeach;?>
                      </div>
                  </div>
              </div>
            </div>