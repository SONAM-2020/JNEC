<section class="content-header">
  <p>
    Download Managment
  </p>
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
              <p class="box-title">Download 
              </p>
              <div class="pull-right box-tools">
                <button class="btn btn-success fa-pull-right btn-block" onclick="addinfo()" type="button">Add</button>
              </div>
            </div>
            <div class="box-body">
              <?php echo form_open('#' , array('class' => 'edit-profile m-b30', 'enctype' => 'multipart/form-data','id'=>'movementform'));?>
              <table id="example1" class="table table-bordered table-striped">
                <thead style="text-align: center">
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>File</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody style="text-align: center">
                <?php foreach($t_download as $i=> $event): ?>
                <tr>
                  <td><?=$i+1?></td>
                  <td><?php echo $event['Name'];?></td>
                  <td><?php echo $event['File'];?></td>
                  <td>
                    <button type="button" class="btn btn-danger btn-block" onclick="deletefile(<?php echo $event['Id'];?>)"><i class="fa fa-times"></i>Delete</button>
                  </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </form>
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
            <p class="modal-title">Download Management</p>
          </div>
          <div class="modal-body">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addformId', 'enctype' => 'multipart/form-data'));?>
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>File Name:</label>
                            <input type="text" id="Name" name="Name" class="form-control">
                            <span id="file_err" class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <label>Upload File:</label>
                            <input type="file" id="Image" onchange="checkfilesize(this,'images','Image_err','addBtn')" onclick="remove_err('Image_err')" name="Image" class="form-control">
                      </div>
                    </div>
                   </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <input type="hidden" name="deleteId" id="deleteId">
                      <button type="button" class="btn btn-primary" id="addBtn" onclick="AddInfo()"><span id="btnspan"></span></button>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>
</div>

<script>
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
</script>
<script type="text/javascript">
  function addinfo(){
      $('#actiontype').val('add');
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
        var url='<?php echo base_url();?>index.php?adminController/Adddownload';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addformId").serialize()}; 
        $("#addformId").ajaxSubmit(options);
        setTimeout($.unblockUI, 600); 
        $('#addbioDetails').modal('hide');
    }
    }

    function validateaddform(){
      var retrtype=true;
      return retrtype;
    }
    function deletefile(id){
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
        var url='<?php echo base_url();?>index.php?adminController/DeleteDownload/'+id+'/download';
         $("#mainContentdiv").load(url);
         setTimeout($.unblockUI, 1000);
    }
    function checkfilesize(file,fileId,errorId,buttonId){
      var val=file.files[0].size/1024/1024,ext=$('#'+fileId).val().split('.').pop();
        if(val > 2){
            $('#'+errorId).html('Your file size should be below 2 mb. your current file size is '+val+' mb');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else if(ext.toUpperCase()!="PNG" && ext.toUpperCase()!="JPG" && ext.toUpperCase()!="JPEG"&& ext.toUpperCase()!="PDF"){
            $('#'+errorId).html('you are not allow to attach this file. only png/jpg/jpeg are allowed ');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else{
            $('#'+errorId).html('');
            $('#'+buttonId).show();
        }
    }

</script> 
  
    
    