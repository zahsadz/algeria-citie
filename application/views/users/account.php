<div class="container">

<div class="card mt-5">
  <div class="card-header">
  حسابي
  </div>
  <div class="card-body">
<?php //print_r($_SESSION) ; ?>
    <h2>مرحبا  <?php echo $user['first_name']; ?>!</h2>
    <a href="<?php echo base_url('users/logout'); ?>" class="logout">تسجيل الخروج</a>
    <div class="regisFrm">
        <p><b>الإسم: </b><?php echo $user['first_name'].' '.$user['last_name']; ?></p>
        <p><b>البريد الإلكتروني: </b><?php echo $user['email']; ?></p>
        <p><b>الهاتف: </b><?php echo $user['phone']; ?></p>
        <p><b>الجنس: </b><?php echo $user['gender']; ?></p>
    </div>
</div>


</div>
</div>