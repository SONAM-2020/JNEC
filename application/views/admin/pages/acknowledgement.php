<section class="content-header">
  <h1>
    Home
    <small>Acknowledgement</small>
  </h1>
</section>
<section class="content">
  	<div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Message</h3>
	    </div>
	    <div class="box-body">
	    	<?php  
				if($message!='Undefined' && $message!=''){
			?>
			<div class="row">
	          	<div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
	          	<div class="alert alert-success alert-dismissible">
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <h5 style="text-align: center;"><?=$message?></h5>
              </div>
	          	</div>
	      	</div>
			<?php
			} if($messagefail!='Undefined' && $messagefail!=''){
			?>
			<div class="row">
	          	<div class="col-xs-12 col-sm-12 col-md-12 col-la-12">
	          	<div class="alert alert-warning alert-dismissible">
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                <h5 style="text-align: center;"><?=$messagefail?></h5>
              </div>
	          	</div>
	      	</div>
			<?php
			}
			?>
    	</div>
    </div>
</section>
