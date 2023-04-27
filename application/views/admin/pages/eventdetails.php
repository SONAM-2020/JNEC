<section class="content-header">
  <h1>
     Events Management
  </h1>
</section>
<section class="content">
      <?php  
        if($message!='Undefined' && $message!=''){
      ?>
      <div class="row" id="messageId">
              <div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
                  <h5 style="text-align: center;"><?=$message?></h5>
              </div>
          </div>
      <?php
      } if($messagefail!='Undefined' && $messagefail!=''){
      ?>
      <div class="row" id="messageId">
              <div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
                  <h5 style="text-align: center;"><?=$messagefail?></h5>
              </div>
          </div>
      <?php
      }
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <p class="box-title">Event Details 
                <small><?=$eventdetails->Name;?></small>
              </p>
            </div>
            <div class="box-body">
              <?php echo form_open('#' , array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data','id'=>'Newsinformation'));?>
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Event Name:</label>
                            <input type="text" id="name" name="name" value="<?=$eventdetails->Name;?>" class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Posted Date:</label>
                            <input type="text" id="date" name="date" value="<?=$eventdetails->Date;?>" class="form-control">
                        </div>
                        
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label>Event Description:</label>
                          <textarea type="text" id="description" name="description" class="form-control summernote"><?=$eventdetails->Description;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label>Event Image:</label><span style="color: red;"><i>(Image Size:140x27)</i></span>
                        <img src="<?php echo base_url();?><?=$eventdetails->Image;?>" alt="no imaged" onerror="this.src='<?php echo base_url();?>uploads/user1-128x128.png'" width="30%" align="left">
                        <input type="file" id="Image" name="Image">
                        Choose image to change
                        <input type="hidden" name="currentlogoinivalue" value="<?=$eventdetails->Image;?>">
                    </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <input type="hidden" name="updateId" id="updateId" value="<?=$eventdetails->Id;?>">
                        <button type="button"  onclick="submitForm()" class="btn btn-success fa-pull-right btn-block"> Save Changes</button>
                      </div>
                    </div>
                   </div>
                  
              </div>
            </from>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
  $('.summernote').summernote({
      height:250
    });
</script>
<script>
    function validate(){
      let returnt=true;
      if($('#name').val()==""){
        $('#name_err').html('Please mention Title');
        $('#name').focus();
        returnt=false;
      }
      if($('#description').val()==""){
        $('#description_err').html('Please mention Description');
        $('#description').focus();
        returnt=false;
      }
      return returnt;
    }
    function submitForm(){
      if(validate()){
        $.blockUI
          ({ 
            css: 
            { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
            } 
          });
        var url='<?php echo base_url();?>index.php?adminController/UpdateInfo/edtAnnouncementinfo';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#Newsinformation").serialize()}; 
        $("#Newsinformation").ajaxSubmit(options);
        setTimeout($.unblockUI, 600); 
      }
    }
  </script>
  
    
    