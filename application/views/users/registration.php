<div class="container">
	
    <!-- Status message -->
    <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
		<div class="card mt-5">
  <div class="card-header">
    <h2 class="pr-5"> فتح حساب </h2>
  </div>
  <div class="card-body">
    <!-- Registration form -->
    <div class="regisFrm">
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="الإسم الأول" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>" required>
                <?php echo form_error('first_name','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="الإسم العائلي" value="<?php echo !empty($user['last_name'])?$user['last_name']:''; ?>" required>
                <?php echo form_error('last_name','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="البريد الإلكتروني" value="<?php echo !empty($user['email'])?$user['email']:''; ?>" required>
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="كلمة السر" required>
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="conf_password" placeholder="تأكيد كلمة السر " required>
                <?php echo form_error('conf_password','<p class="help-block">','</p>'); ?>
            </div>
           
            <?php 
                if(!empty($user['gender']) && $user['gender'] == 'Female'){ 
                    $fcheck = 'checked="checked"'; 
                    $mcheck = ''; 
                }else{ 
                    $mcheck = 'checked="checked"'; 
                    $fcheck = ''; 
                } 
                ?>
				
      <div class="form-group form-check">

          <input type="radio" class="form-check-input" name="gender" id="Male" value="Male" <?php echo $mcheck; ?>>
		  		<label class="form-check-label" for="Male">ذكر : </label>

		</div>			
           
		 <div class="form-group form-check">
    <input type="radio" class="form-check-input" name="gender" id="Female" value="Female" <?php echo $fcheck; ?>>
	       <label class="form-check-label" for="Female">أنثي: </label>

        </div>
		
			
  
            <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="رقم الهاتف" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
                <?php echo form_error('phone','<p class="help-block">','</p>'); ?>
            </div>
            <div class="send-button">
                <input type="submit" class="btn btn-primary" name="signupSubmit" value="فتح حساب">
            </div>
        </form>
        <p class="mt-5">أنت مسجل بالموقع وتملك حساب  <a href="<?php echo base_url('users/login'); ?>">سجل دخولك من هنا</a></p>
    </div>
</div>
</div>
</div>