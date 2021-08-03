<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en,ar,fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.80.0">

<title><?php echo $title;?></title>
	
<link href="<?php echo base_url();?>css/bootstrap-rtl.min.css" type="text/css" rel="stylesheet" />

<link href="<?php echo base_url();?>leaflet/leaflet.min.css" type="text/css" rel="stylesheet"/>

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
.typeahead{
  cursor: pointer;
}

</style>
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>"> الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://fb.me/free7pro">راسلنا</a>
      </li>
  
    
    <form action="<?php echo base_url();?>search" method="post" class="form-inline mr-5" role="search">
      <input class="form-control ml-sm-2" autocomplete="off" name="qword" id="qword" type="search" placeholder="كلمة البحث هنا" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" name="submit" value="submit" type="submit">إبحث</button>
    </form>
	</ul>
  </div>
</nav>


