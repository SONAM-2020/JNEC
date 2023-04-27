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
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Events</h3>
          <span><button class="btn btn-success fa-pull-right" onclick="addinfo()" type="button"><i class="fa fa-plus"></i> Add </button></span>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Description</th>
              <th>Image</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($t_news as $i=> $event): ?>
            <tr>
              <td><?=$i+1?></td>
              <td><?php echo $event['Name'];?></td>
              <td>
                <?=  substr(strip_tags($event['Description']), 0, 700).'............';?>
              </td>
              <td><img style="width: 100px; height: 100px;" src="<?php echo $event['Image'];?>"></td>
              <td>
                <?php if($event['Status']=="Active"){ ?><span class="label label-success"><?php echo $event['Status'];?></span>
                      <?php } else{?>   
                          <span class="label label-danger"><?php echo $event['Status'];?></span>
                      <?php }?>

              </td>
              <td><?php echo $event['Type'];?></td>
              <td>
                <button class="btn btn-success btn-block" onclick="viewMessage('<?php echo $event['Id'];?>')" type="button"><i class="fa fa-eye"></i> View Events</button><br>
                <button type="button" class="btn btn-danger btn-block" onclick="deletenews(<?php echo $event['Id'];?>)"><i class="fa fa-times"></i>Delete</button> 
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
<div class="modal modal-default" id="addbioDetails">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span id="modalheader"></span></h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addformId', 'enctype' => 'multipart/form-data'));?>
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Event Name: <span class="text-danger">*</span></label>
                            <input type="text" id="name" onclick="remove_err('Name_err')" name="name" class="form-control">
                            <span id="Name_err" class="text-danger"></span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Images</label>
                             <label>Upload News Images:<span class="text-danger">*</span></label><span style="color: red;"><i>(Image Size:700*438)</i></span>
                            <input type="file" id="Image" onchange="checkfilesize(this,'images','Image_err','addBtn')" onclick="remove_err('Image_err')" name="Image" class="form-control">
                            <span id="Image_err" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <label>Event Description: <span class="text-danger">*</span></label>
                          <textarea style="height: : 100px;" type="text" id="description" onclick="remove_err('Description_err')" name="description" class="form-control summernote"></textarea>
                            <span id="Description_err" class="text-danger"></span>
                        </div>
                    </div>
                   </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="addBtn" onclick="AddInfo()"><span id="btnspan"></span></button>
                    </div>
              </div>
            </form>
          </div>
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
    $('.summernote').summernote({
        height:250
    });
    
    function addinfo(){
      $('#actiontype').val('add');
      $('#modalheader').html('Events');
      $('#btnspan').html('<i class="fa fa-save"></i> Save');
      $('#addbioDetails').modal('show');
    }
    function AddInfo(){
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
          var url='<?php echo base_url();?>index.php?adminController/Addnews';
          var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addformId").serialize()}; 
          $("#addformId").ajaxSubmit(options);
          setTimeout($.unblockUI, 600); 
          $('#addbioDetails').modal('hide');
    }
    }

    function validateaddform(){
      var retrtype=true;
      if($('#name').val()==""){
        $('#Name_err').html('Please mention the Title of News.');
        retrtype=false;
      }
      if($('#description').val()==""){
        $('#Description_err').html('Please mention News Information');
        retrtype=false;
      }
      if($('#Image').val()==""){
        $('#Image_err').html('Image is required');
        retrtype=false;
      }
      return retrtype;
    }
    function viewMessage(id){
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
        var url='<?php echo base_url();?>index.php?adminController/loadpage/ViewEventsDetails/'+id;
        $("#mainContentdiv").load(url);
          setTimeout($.unblockUI, 1000); 
      }
      function deletenews(id){
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
        var url='<?php echo base_url();?>index.php?adminController/DeleteEvents/'+id+'/Events';
         $("#mainContentdiv").load(url);
         setTimeout($.unblockUI, 1000);
    }
   
</script> 
   