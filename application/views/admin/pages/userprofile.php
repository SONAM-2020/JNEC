<section class="content">
  <div class="container-fluid">
  	<div class="col-md-12">
  	<div class="row">
  	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="alert alert-info">Update User Details</h3>
    </div>
    <p class="text-center">
	<img src="<?php echo base_url();?>uploads/<?=$userprofile_info->Image;?>"  style="max-width: 150px; height: auto;" class="img img-circle img-thumbnail">
	</p>
	<hr>
    <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'adduserform', 'enctype' => 'multipart/form-data'));?>
        <div class="card-body">
          <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Email Id:</label>
                <input type="text" name="Email_Id" value="<?=$userprofile_info->Email_Id?>" id="Email_Id" class="form-control" readonly>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Name:</label>
                <input type="text" value="<?=$userprofile_info->Name?>" name="Name" id="Name" class="form-control" readonly>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Contact Number:</label>
              <input type="Number" value="<?=$userprofile_info->Mobile_Number?>" name="Phone_Number" id="Phone_Number" class="form-control">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Upload Photo:</label>
              <input type="file" name="Image" id="Image" class="form-control" placeholder="Photo/Logo" value=" ">
              <input type="hidden" name="currentlogoinivalue" value="<?=$userprofile_info->Image;?>">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="hidden" name="userId" value="<?php echo $this->session->userdata('User_table_id');?>">
              <button class="btn btn-success pull-right" type="button" onclick="updateDetails()"> <i class="fa fa-edit"></i>Update</button>
            </div>
          </div> 
      </div>
    </form>
  </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
  	<div class="card card-primary">
    <div class="card-header">
      <h3 class="alert alert-info">Change Password</h3>
    </div>
  	<?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'adduserform', 'enctype' => 'multipart/form-data'));?>
        <div class="card-body">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Old Password:</label>
              <input type="text" value="***********" class="form-control" readonly>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>New Password:</label>
              <input type="text" name="newpassword" value="" id="newpassword" class="form-control">
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="hidden" name="UserId" value="<?=$userprofile_info->Id;?>">
              <button class="btn btn-success pull-right" type="button" onclick="updatepassword()"> <i class="fa fa-edit"></i>Update</button>
            </div>
          </div> 
      </div>
    </form>
  </div>
</div>
</div>
</div>
</section>

<script type="text/javascript">
  	function updateDetails(){
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
      	var url='<?php echo base_url();?>index.php?adminController/updateYourAccount/';
      	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#adduserform").serialize()}; 
      	$("#adduserform").ajaxSubmit(options);
      	setTimeout($.unblockUI, 600); 
  	}
  	function updatepassword()
  	{
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
      	var url='<?php echo base_url();?>index.php?adminController/updatePassword/';
      	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#adduserform").serialize()}; 
      	$("#adduserform").ajaxSubmit(options);
      	setTimeout($.unblockUI, 600);	
  	}
  	