
<p class="lead bg-white pr-3 pt-3 pb-3 mt-5 font-weight-bolder text-primary border rounded">
<i class="fa fa-calendar"></i>&nbsp;&nbsp;<i id="hijridate"></i>

</p>

<p class="lead bg-white pr-3 pt-3 pb-3 mt-5 font-weight-bolder text-primary border rounded">
<i class="fa fa-calendar"></i>&nbsp;&nbsp;<i id="datemoment"></i>
</p>
<footer class="blog-footer">
<p>بلديات ودوائر ولايات الجزائر <a href="https://github.com/amirodz">amirodz</a></p>

<p>Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</footer>

<script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url();?>js/bootstrap3-typeahead.min.js"></script>
<script>
    $(document).ready(function () {
        $('#qword').typeahead({
			theme:"bootstrap4",
            source: function (query, result) {
                $.ajax({
                    url: "<?php echo base_url();?>Welcome/fetch",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "GET",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

 <script type="text/javascript">
 function addZero(i) {
if (i < 10) {
i = "0" + i;
}
return i;
}
function datemoment() {
var d = new Date();
var nameOfMonth = [
      'جانفي',
      'فيفري',
      'مارس',
      'أفريل',
      'ماي',
      'جوان',
      'جويلية',
      'اوت',
      'سبتمبر',
      'أكتوبر',
      'نوفمبر',
      'ديسمبر'
    ];
//Sun Mon Tue Wed Thu Fri Sat
var nameOfweekday = [
      'الأحد',
      'الإثنين',
      'الثلاثاء',
      'الأربعاء',
      'الخميس',
      'الجمعة',
      'السبت'
    ];	

var date = d.getDate();// 1-31
var day = d.getDay();// 0-6
var month = d.getMonth(); // 0-11 but change to 1-12
var year = d.getFullYear();// 2020, 2021, so on
var monthName = nameOfMonth[month]; // 3 char of month name
var todaysName = nameOfweekday[day]; // 3 char of todays day of the week
var h = addZero(d.getHours());
var m = addZero(d.getMinutes());
var s = addZero(d.getSeconds());
var timenow = ''+todaysName+' '+date+' '+monthName+' '+year+' الساعة '+h+':'+m+':'+s+'';
document.getElementById("datemoment").innerHTML = timenow;
return timenow;
}
var Timer = setInterval(datemoment, 500);
</script> 
 <script>
var hijridate = new Intl.DateTimeFormat('ar-TN-u-ca-islamic', {day: 'numeric', month: 'long',weekday: 'long',year : 'numeric'}).format(Date.now());
var hijridate_WesternArabic = hijridate
	.replace(/٠/gi, "0")
	.replace(/١/gi, "1")
	.replace(/٢/gi, "2")
	.replace(/٣/gi, "3")
	.replace(/٤/gi, "4")
	.replace(/٥/gi, "5")
	.replace(/٦/gi, "6")
	.replace(/٧/gi, "7")
	.replace(/٨/gi, "8")
	.replace(/٩/gi, "9");
document.getElementById("hijridate").innerHTML = hijridate_WesternArabic;
</script> 
</body>
</html>