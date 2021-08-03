


<div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5"><?php echo $seotitle;?></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>">الرئيسية</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>wilaya/<?php echo $wilaya_id;?>"> ولاية <?php echo $name_wilayas; ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url();?>dairas/<?php echo $daira_id;?>">دائرة <?php echo $name_daira; ?></a></li>
	<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>communes/<?php echo $communes_id;?>">بلدية <?php echo $name_communes; ?></a></li>
  </ol>
</nav>
  <div class="row">
 <div class="col">
 
<?php
$i = 0;
$sora_table = '<center><table class="table table-bordered table-hover">';

 foreach ($communes as $read)
 {
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $sora_table .= '<tr><td class="table-light" width="25%">
  <a href="'.base_url().'communes/'.$read['id'].'">'. $read['name_ar'] .'</a> <br>
    <a href="'.base_url().'communes/'.$read['id'].'">'. $read['name_en'] .'</a>

	</td>';
    } else {
  $sora_table .= '<td class="table-light" width="25%">
  <a href="'.base_url().'communes/'.$read['id'].'">'. $read['name_ar'] .'</a> <br>
    <a href="'.base_url().'communes/'.$read['id'].'">'. $read['name_en'] .'</a>

  </td>';
    }
    $i++;
 }
 
 
 $sora_table .= '</tr></table></center>';


echo $sora_table;
?>
<ul class="list-group">
  <li class="list-group-item"><?php echo $seotitle;?></li>
  <li class="list-group-item"><?php echo $name_en;?></li>
  <li class="list-group-item"><?php echo $name_ber;?></li>
  <li class="list-group-item">خط العرض <?php echo $latitude; ?></li>
  <li class="list-group-item">خط الطول <?php echo $longitude; ?></li>
</ul>
<p class="lead bg-white pr-3 pt-3 pb-3 font-weight-bolder text-primary border rounded">
<i class="fa fa-calendar"></i>&nbsp;&nbsp;<i id="hijridate"></i>

</p>

<p class="lead bg-white pr-3 pt-3 pb-3 font-weight-bolder text-primary border rounded">
<i class="fa fa-calendar"></i>&nbsp;&nbsp;<i id="datemoment"></i>
</p>

<div id="weathermap"></div>


<div align="center" id="table"></div>


  <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-12 text-right">
                <h3>باقي أيام الشهر</h3>

                <b>مواقيت الصلاة</b>

                <div id="timelist">
                </div>

            </div>
        </div>
    </div> 

</div>

</div>

</div>
