<div class="container-fluid">

  <h1 class="display-4 mt-5 mb-5 pr-5">تعديل حذف دائرة </h1>

		
  <div class="row">
 <div class="col">

   <!-- Modal -->
            <div id="updateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">تعديل دائرة</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
						   <div class="form-group">
                                <label for="id" >رقمها</label>
                                <input type="id" class="form-control" id="id" required disabled>            
                            </div>
                            <div class="form-group">
                                <label for="name_ar" >الإسم بالعربي</label>
                                <input type="text" class="form-control" id="name_ar" placeholder="Enter name_ar" required>            
                            </div>
							
                            <div class="form-group">
                                <label for="name_en" >الإسم بالأجنبي</label>    
                                <input type="text" class="form-control" id="name_en"  placeholder="Enter name_en">                          
                            </div> 
							
                         <div class="form-group">
                                <label for="latitude" > خط العرض </label>    
                                <input type="text" class="form-control" id="latitude"  placeholder="Enter latitude">                          
                            </div> 
							
                            <div class="form-group">
                                <label for="longitude" > خط الطول </label>    
                                <input type="text" class="form-control" id="longitude"  placeholder="Enter longitude">                          
                            </div>  
							
                            <div class="form-group">
                                <label for="wilayas" >الولاية</label>
                              <select id="wilayas" class="form-control">
                               <option value=""> -- select wilayas -- </option>
                                     </select>             
                            </div>   
                            
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="txt_userid" value="0">
                            <button type="button" class="btn btn-success btn-sm" id="btn_save">تعديل</button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">غلق النافذة</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Table -->
            <table id="userTable" class="table table-bordered table-hover">
                <thead>
                  <tr>
                        <th>رقمها</th>
                        <th>الإسم بالعربي </th>
                        <th>الإسم بالأجنبي</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                  <tbody></tbody>
            </table>



</div>

  </div>

</div>


<!-- Script -->
<script>
$(document).ready(function(){

var userDataTable =  $('#userTable').DataTable({
			processing: true,
            serverSide: true,
            serverMethod: 'post',
            ajax: '<?php echo base_url(); ?>Data_wilayas/getTable',
            columns: [{
                    "data": "id"
                },
                {
                    "data": "name_ar"
                },
                { 
				    "data": 'name_en'
				}

            ],
            columnDefs: [{
                    // # hide the first column
                    // https://datatables.net/examples/advanced_init/column_render.html                    
                    "targets": [0],
                    "visible": true
                },
                {
                    // # disable search for column number 2
                    // https://datatables.net/reference/option/columns.searchable                    
                    "targets": [3],
                    "searchable": false,
                    // # disable orderable column
                    // https://datatables.net/reference/option/columns.orderable
                    "orderable": false
                },
                {
                    // # action controller (edit,delete)
                    "targets": [3],
                    // # column rendering
                    // https://datatables.net/reference/option/columns.render
                    "render": function(data, type, row, meta) {
                        return '<button class="btn btn-sm btn-info updateUser" data-toggle="modal" data-target="#updateModal" data-id="' + row.id + '" data-title="' + row.name_en + '" data-slug="' + row.name_ar + '">تعديل</button><button class="btn btn-sm mr-3 btn-danger deleteUser" data-id="' + row.id + '">حذف</button>';
                    }
                }
            ],
            // # set order descending and ascending
            // https://datatables.net/reference/option/order
            "order": [
                [1, 'desc'],
                [2, 'asc']
            ],
language: {
processing:     "جارٍ التحميل...",
search:         "ابحث&nbsp;:",
lengthMenu:    "أظهر _MENU_ مدخلات",
info:           "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
infoEmpty:      "يعرض 0 إلى 0 من أصل 0 سجل",
infoFiltered:   "(منتقاة من مجموع _MAX_ مُدخل)",
infoPostFix:    "",
loadingRecords: "جارٍ التحميل...",
zeroRecords:    "لم يعثر على أية سجلات",
emptyTable:     "ليست هناك بيانات متاحة في الجدول",
paginate: {
first:      "الأول",
previous:   "السابق",
next:       "التالي",
last:       "الأخير"
},
aria: {
sortAscending:  ": تفعيل لترتيب العمود تصاعدياً",
sortDescending: ": تفعيل لترتيب العمود تنازلياً"
}
}		
}); 
// Update record
$('#userTable').on('click','.updateUser',function(){
var id = $(this).data('id');
$('#txt_userid').val(id);
// AJAX request
$.ajax({
url: '<?php echo base_url(); ?>Data_wilayas/Fetch',
type: 'post',
data: {id: id},
dataType: 'json',
success: function(response){
if(response.status == 1){
$('#id').val(response.data.id);
$('#name_ar').val(response.data.name_ar);
$('#name_en').val(response.data.name_en);
$('#wilayas').val(response.data.wilaya_id);
$('#latitude').val(response.data.latitude);
$('#longitude').val(response.data.longitude);
}else{
alert("Invalid ID.");
}
}
});
});
// Save 
$('#btn_save').click(function(){
var id = $('#id').val();
var name_ar = $('#name_ar').val().trim();
var name_en = $('#name_en').val().trim();
var latitude = $('#latitude').val().trim();
var longitude = $('#longitude').val().trim();
var wilayas = $('#wilayas').val().trim();          
if(name_ar !='' && name_en != '' && wilayas != ''){
// AJAX request
$.ajax({
url: '<?php echo base_url(); ?>Data_wilayas/Update',
type: 'post',
data: {id: id, wilayas: wilayas,name_ar: name_ar, name_en: name_en, latitude: latitude,longitude: longitude},
dataType: 'json',
success: function(response){
if(response.status == 1){
alert(response.message);
// Empty the fields
// $('#name_ar','#name_en','#wilayas').val('');
// Reload DataTable
userDataTable.ajax.reload();
// Close modal
$('#updateModal').modal('toggle');
}else{
alert(response.message);
}
}
});
}else{
alert('من فضلك لا تترك حقل فارغ.');
}
});
// Delete record
$('#userTable').on('click','.deleteUser',function(){
var id = $(this).data('id');
//alert(id);
var deleteConfirm = confirm("هل أنت متأكد من عمية الحذف?");
if (deleteConfirm == true) {
$.ajax({
url:'<?php echo base_url();?>Data_wilayas/deletes',
type:'post',
data:{ id : id },
dataType: 'html',
success: function(response){
console.log(response);
if(response == 1){
alert("تم الحذف بنجاح.");
// Reload DataTable
userDataTable.ajax.reload();
}else{
alert("Invalid ID.");
}
}
});
}                
});          
});
</script>
<script>
let ajax = (url, callback, data = {}) =>
{
$.ajax({
url: url,
type: "GET",
data: data,
dataType: "json",
success: (res) => { callback(res)},
error:   (res) => { console.log(res)}
});
}
// load wilayas
ajax('<?php echo base_url();?>Data_wilayas/Fetch_wilayas', (res) => {
$('#wilayas').html('<option value="">-- select state --</option>');
for(let i = 0; i < res.length; i++)
$('#wilayas').append('<option value="'+ res[i].id +'">' + res[i].name_ar + '</option>');
});
</script>