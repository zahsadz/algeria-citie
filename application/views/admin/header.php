<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">


	<title><?php echo $title;?></title>
	
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap-rtl.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>datatables/dataTables.bootstrap4.min.css">


	
<style type="text/css">
/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}
</style>

	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>admin"> الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://fb.me/free7pro">راسلنا</a>
      </li>
	        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>">واجهة الموقع</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/communes">تعديل بلدية</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/daira">تعديل دائرة</a>
      </li>
	  
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/willaya"> تعديل ولاية </a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/create_willaya"> أضف ولاية  </a>
      </li>
	  
	  	   <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/create_daira"> أضف دائرة  </a>
      </li>
	  	   <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>admin/create_communes"> أضف بلدية  </a>
      </li>
	 	  	   <li class="nav-item">
    
		 <a class="nav-link" href="<?php echo base_url('users/logout'); ?>" class="logout">تسجيل الخروج</a>

	        </li>

	</ul>
  </div>
</nav>


