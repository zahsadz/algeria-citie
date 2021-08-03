<div class="container">

	
    <!-- Status message -->
    <?php  
        if(!empty($success_msg)){ 
            echo '<p class="alert alert-success" role="alert">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p  class="alert alert-danger" role="alert">'.$error_msg.'</p>'; 
        } 
    ?>
	<div class="card mt-5 mb-5">
  <div class="card-header">
  <h2 class="pr-5">  تسجيل الدخول </h2>
  </div>
  <div class="card-body">
    <!-- Login form -->
    <div class="regisFrm">
        <form action="" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="بريدك الإلكتروني" required="">
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="كلمة السر" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="send-button">
                <input type="submit" class="btn btn-primary" name="loginSubmit" value="تسجيل دخول">
            </div>
        </form>
        <p>ليس لديك حساب <a href="<?php echo base_url('users/registration'); ?>">تسجيل لفتح حساب بالموقع </a></p>
    </div>
</div>
  </div>
</div>
