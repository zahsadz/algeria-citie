<div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5">تعديل حذف بلدية</h1>
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
 <div class="col">

<table id="communes" class="table table-bordered">
       <thead>
          <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Description</th>
             <th>Created at</th>
             <td>Action</td>
          </tr>
       </thead>
       <tbody>
          <?php if($result): ?>
          <?php foreach($result as $read): ?>
          <tr>
             <td><?php echo $read['id']; ?></td>
             <td><?php echo $read['name_ar']; ?></td>
             <td><?php echo $read['name_en']; ?></td>
             <td><a href="<?php echo base_url('admin/edit_communes/'.$read['id']); ?>" class="btn btn-primary">تعديل</a></td>
                 <td>
<a class="btn btn-danger" href="<?php echo base_url('admin/delete_communes/'.$read['id']); ?>">
                  حذف
                </a>
            </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
    </table>

<?php
/*$i = 0;
$sora_table = '<center><table id="zctb" class="table table-bordered table-hover">';

 foreach ($result as $read)
 {
    if ($i % 3 == 0) { // if $i is divisible by our target number (in this case "3")
        $sora_table .= '<tr><td class="table-light" width="25%">
  <a href="'.base_url().'communes/edit/'.$read['id'].'">'. $read['name_ar'] .'</a> <br>
    <a href="'.base_url().'communes/edit/'.$read['id'].'">'. $read['name_en'] .'</a>
<a class="btn btn-warning" href="'.base_url().'communes/edit/'.$read['id'].'"> تعديل </a>
<a class="btn btn-danger" href="'.base_url().'Admin/delete_communes/'.$read['id'].'"> حذف </a>

	</td>';
    } else {
  $sora_table .= '<td class="table-light" width="25%">
  <a href="'.base_url().'communes/edit/'.$read['id'].'">'. $read['name_ar'] .'</a> <br>
    <a href="'.base_url().'communes/edit/'.$read['id'].'">'. $read['name_en'] .'</a>

<a class="btn btn-warning" href="'.base_url().'communes/edit/'.$read['id'].'"> تعديل </a>
<a class="btn btn-danger" href="'.base_url().'Admin/delete_communes/'.$read['id'].'"> حذف </a>

  </td>';
    }
    $i++;
 }
 
 
 $sora_table .= '</tr></table></center>';
 
echo $sora_table;
*/
?>	  

</div>

  </div>

</div>