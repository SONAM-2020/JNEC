<section class="content-header">
  <h1>
   My Account
  </h1>
</section>
<section class="content">
  <div class="callout callout-warning">
        <h4>Reminder!</h4>
        <h5>HHCC | AMT SYSTEM will automatically create a profile picture for all the User.So now you can upload your picture here, by clicking on <b>Upload Photo Button.</b></h5>
      </div>
  <div class="row">
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
  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
  	<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Your Information</h3>
        </div>
          <div class="box-body">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'updateuserform', 'enctype' => 'multipart/form-data'));?>
              <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <label>Email Address:</label>
                      <input type="text" name="Email_Id" value="<?=$userDetils->Email_Id?>" id="Email_Id" class="form-control" readonly>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <label>Name:</label>
                      <input type="text" value="<?=$userDetils->Name?>" name="Name" id="Name" class="form-control" readonly>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <label>User Type:</label>
                      <input type="text" value="<?=$userDetils->Role_Id?>" name="role" id="role" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Contact Number:</label>
                    <input type="Number" value="<?=$userDetils->Mobile_Number?>" name="Phone" id="Phone" class="form-control">
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Picture:<span class="text-danger">Choose Image To Change (Image Size:128*128)</span></label>
                    <input type="file" id="Image" name="Image" class="form-control">
                    <input type="hidden" name="currentlogoinivalue" value="<?=$userDetils->Image;?>">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="uId" value="<?php echo $this->session->userdata('userId');?>">
                <button class="btn btn-success pull-right" type="button" onclick="update_users()"> <i class="fa fa-edit"></i>Save Changes</button>
              </div>
          </form>
          </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Your Profile Picture</h3> 
        </div>
        <div class="box-body">
          <div class="row">
            <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div  class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
              </div>
              <div  class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <img src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata('Image');?>" onerror="this.src='<?php echo base_url();?>uploads/user1-128x128.jpg'" class="img-circle" alt="User Image">
            </div>
            </div>
          </div>
          <br><br><br>
      </div>
    </div>
  </div>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Your Password</h3>
        </div>
          <div class="box-body">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'passwordform', 'enctype' => 'multipart/form-data'));?>
              <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                      <label>New Password:</label>
                      <input type="password"  name="password" id="password" class="form-control" onclick="remove_err('password_err')">
                      <span class="text-danger" id="password_err"></span>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <label>Confirm Password:</label>
                    <input type="password"  name="cpassword" id="cpassword" class="form-control" onclick="remove_err('cpassword_err')">
                    <span class="text-danger" id="cpassword_err"></span>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="uId" value="<?php echo $this->session->userdata('userId');?>">
                <button class="btn btn-success pull-right" type="button" onclick="update_password()"> <i class="fa fa-edit"></i>Save Changes</button>
              </div>
          </form>
          </div>
    </div>
  </div>
</section>
<script>
  setTimeout(function(){
  $('#messageId').hide();
  }, 5000);
  function update_users(){
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
      var url='<?php echo base_url();?>index.php?adminController/UpdateUserDetails/';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#updateuserform").serialize()}; 
      $("#updateuserform").ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 
  }
  function validatepass(){
    let returnt=true;
    if($('#password').val()==""){
        $('#password_err').html('please provide your new password');
        $('#password').focus();
        returnt=false;
    }
    if($('#cpassword').val()==""){
        $('#cpassword_err').html('Please mention condirm password');
        $('#cpassword').focus();
        returnt=false;
    }
    if($('#cpassword').val()!=$('#password').val()){
        $('#cpassword_err').html('password and confirm password mismatch');
        $('#cpassword').focus();
        returnt=false;
    }
    return returnt;
  }
  function update_password(){
      if(validatepass()){
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
        var url='<?php echo base_url();?>index.php?adminController/updatepassword/';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#passwordform").serialize()}; 
        $("#passwordform").ajaxSubmit(options);
        setTimeout($.unblockUI, 600);
      }
       
  }
  </script>
