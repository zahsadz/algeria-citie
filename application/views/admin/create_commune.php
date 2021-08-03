 <div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5 border-bottom border-secondary bg-light"> إضافة بلدية </h1>
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

<div class="card border-bottom border-secondary">
  <div class="card-header bg-warning">
    إضافة بلدية
  </div>

  <div class="card-body text-right">
    <?php echo validation_errors(); ?>
	
    <form action="<?= base_url('admin/store_commune') ?>" method="POST">

        <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> إسم الولاية </label>
<input id="name" name="name" class="form-control" type="text" value="">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> الرقم البريدي </label>
<input id="code" name="code" class="form-control" type="text" value="">
        </div>
		
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> الإسم باللغة الأجنبية</label>
<input id="name_en" name="name_en" class="form-control" type="text" value="">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label">الإسم بالأمازيغية </label>
<input id="name_ber" name="name_ber" class="form-control" type="text" value="">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> خط العرض </label>
       <input id="latitude" name="latitude" class="form-control" type="text" value="">
        </div>
		
		  <div class="form-group form-control-lg mt-5 mb-5">
<label class="label"> خط الطول </label>
       <input id="longitude" name="longitude" class="form-control" type="text" value="">
        </div>
		
  
       <div class="form-group form-control-lg mt-5 mb-5">
    <label for="Select1">الدائرة</label>
	
    <select class="form-control" name="daira" id="Select1">

	
	<?php foreach ($daira as $read) { ?>

      <option value="<?php echo $read['id']; ?>"><?php echo $read['name_ar']; ?></option>
	<?php } ?>

    </select>
  </div>
  

    <div class="form-group mt-5 mb-5 pr-5">

       <button class="btn btn-primary"> حفظ البيانات </button>
		  </div>

    </form>
	
	  </div>
</div>

	
</div>




 </div>

  </div>

