



<div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5"><?php echo $seotitle;?></h1>

  <div class="row">
 <div class="col">
 
<?php
$i = 0;
$sora_table = '<center><table class="table table-bordered table-hover">';

 foreach ($wilayas as $read)
 {
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $sora_table .= '<tr><td class="table-light" width="25%">
  <a href="'.base_url().'wilaya/'.$read['id'].'">'. $read['name_ar'] .'-('.$read['id'].')</a> <br>
    <a href="'.base_url().'wilaya/'.$read['id'].'">'. $read['name_en'] .'</a>

	</td>';
    } else {
  $sora_table .= '<td class="table-light" width="25%">
  <a href="'.base_url().'wilaya/'.$read['id'].'">'. $read['name_ar'] .'-('.$read['id'].')</a> <br>
    <a href="'.base_url().'wilaya/'.$read['id'].'">'. $read['name_en'] .'</a>

  </td>';
    }
    $i++;
 }
 
 
 $sora_table .= '</tr></table></center>';


echo $sora_table;
?>




    

	  </div>

  </div>

</div>
