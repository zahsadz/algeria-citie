

<footer class="blog-footer">
<p>بلديات ودوائر ولايات الجزائر <a href="https://github.com/amirodz">amirodz</a></p>

<p>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</footer>

 <script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>

  <script src="<?php echo base_url();?>js/datatables.min.js"></script>




 <script>
$('#communes').DataTable( {
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
} );

</script>
 <script src="<?php echo base_url();?>js/bootstrap.bundle.min.js"></script>

</body>
</html>