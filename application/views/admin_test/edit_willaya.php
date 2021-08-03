 <div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5"> تعديل ولاية  : <?php echo $city['name_ar']; ?> </h1>
 <?php
 if($this->session->flashdata('message')){
	 
      $alert = $this->session->flashdata('alert-class');
      $message = $this->session->flashdata('message');
        if($message)
        {
            ?>
            <div class="alert  <?php echo $alert; ?> alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message; ?>                    
            </div>
        <?php } } ?>
  <div class="row">
 <div class="col-md-12"> 

<div class="card">
  <div class="card-body text-right">
    <?php echo validation_errors(); ?>
	
    <form action="<?= base_url('admin/update_willaya/') ?><?php echo $city['id']; ?>" method="POST">
	<input type="hidden" id="id" name="id" class="form-control" type="text" value="<?php echo $city['id']; ?>">

        <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> إسم البلدية </label>
<input id="name" name="name" class="form-control" type="text" value="<?php echo $city['name_ar']; ?>">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> الرقم البريدي </label>
       <input id="code" name="code" class="form-control" type="text" value="<?php echo $city['postcode']; ?>">
        </div>
		
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> الإسم باللغة الأجنبية</label>
       <input id="name_en" name="name_en" class="form-control" type="text" value="<?php echo $city['name_en']; ?>">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label">الإسم بالأمازيغية </label>
       <input id="name_ber" name="name_ber" class="form-control" type="text" value="<?php echo $city['name_ber']; ?>">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> خط العرض </label>
       <input id="latitude" name="latitude" class="form-control" type="text" value="<?php echo $city['latitude']; ?>">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> خط الطول </label>
       <input id="longitude" name="longitude" class="form-control" type="text" value="<?php echo $city['longitude']; ?>">
        </div>
		
  

    <div class="form-group mt-5 mb-5 pr-5">

       <button class="btn btn-primary">حفظ البيانات </button>
		  </div>

    </form>
	
	  </div>
</div>

	
</div>




 </div>

  </div>

