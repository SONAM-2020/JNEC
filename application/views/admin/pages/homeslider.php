<section class="content-header">
  <h1>
      Home Slider Management
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
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Home Slider</h3>
          <span><button class="btn btn-success fa-pull-right" onclick="addinfo()" type="button"><i class="fa fa-plus"></i> Add Home Slider</button></span>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Slider Name</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($t_slider as $i=> $event): ?>
            <tr>
              <td><?=$i+1?></td>
              <td><?php echo $event['Name'];?></td>
              <td><img style="width: 100px; height: 100px;" src="<?php echo $event['Image'];?>"></td>
              <td>
                <?php if($event['Status']=="Active"){ ?><span class="label label-success"><?php echo $event['Status'];?></span>
                      <?php } else{?>   
                          <span class="label label-danger"><?php echo $event['Status'];?></span>
                      <?php }?>

              </td>
              <td>
                <button type="button" class="btn btn-block btn-danger"onclick="deleteslider(<?php echo $event['Id'];?>)"><i class="fa fa-times"></i>Delete</button> 
              </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal modal-default" id="addslider">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header" style="background: green;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span id="medelheaderspan"></span></h4>
          </div>
          <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addformId', 'enctype' => 'multipart/form-data'));?>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label>Name:<span class="text-danger">*</span></label>
                            <input type="text" id="Name" onclick="remove_err('Name_err')" name="Name" class="form-control">
                            <span id="Name_err" class="text-danger"></span>
                        </div>
                        
                      </div>
                    <div class="form-group">
                       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label>Images</label>
                             <label>Upload Slider Images:<span class="text-danger">*</span></label><span style="color: red;"><i>(Image Size:780*480)</i></span>
                            <input type="file" id="images" onchange="checkfilesize(this,'images','Image_err','addBtn')" onclick="remove_err('Image_err')" name="Image" class="form-control">
                            <span id="Image_err" class="text-danger"></span>
                        </div>
                    </div>
                    
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addsliderinfo()">Save changes</button>
              </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
  setTimeout(function(){
      $('#messageId').hide();
  }, 5000);
 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
 function addinfo(){
    $('#actiontype').val('add');
    $('#medelheaderspan').html('Add Home Slider');
    $('#btnspan').html('<i class="fa fa-save"></i> Add Home Slider');
    $('#addslider').modal('show');
  }
function addsliderinfo(){
  if(validateaddform()){
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
      var url='<?php echo base_url();?>index.php?adminController/Addslider';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addformId").serialize()}; 
      $("#addformId").ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 
      $('#addslider').modal('hide');
}
}
  function validateaddform(){
    var retrtype=true;
    if($('#Name').val()==""){
      $('#Name_err').html('Please Enter Name.');
      retrtype=false;
    }
    return retrtype;
  }
   function editinfo(Editid,email,name,phone,rol,tatus){
      $('#EditId').val(Editid);
      $('#Name1').val(name);
      $('#Email1').val(email);
      $('#Phone1').val(phone);
      $('#role1').val(rol);
      $('#status').val(tatus);
      $('#actiontype').val('add');
      $('#modalheader1').html('Edit Users');
      $('#EditusersDetails').modal('show');
    }
    function deleteslider(id){
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
        var url='<?php echo base_url();?>index.php?adminController/DeleteSlider/'+id+'/slider';
         $("#mainContentdiv").load(url);
         setTimeout($.unblockUI, 1000);
    }
  </script>
   