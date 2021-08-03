

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

<script src="<?php echo base_url();?>leaflet/leaflet.min.js"></script>

<script src="<?php echo base_url();?>js/praytimes.js"></script>

<script type="text/javascript">

function buildMap(lat,lon) {
document.getElementById('weathermap').innerHTML = "<div class='embed-responsive embed-responsive-16by9' id='map' style='width: 100%; height: 100%;'></div>";
var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
osmAttribution = 'Map data © OpenStreetMap contributors,' +
' CC-BY-SA',
osmLayer = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
var map = new L.Map('map');
map.setView(new L.LatLng(lat,lon), 9 );
map.addLayer(osmLayer);
//var validatorsLayer = new OsmJs.Weather.LeafletLayer({lang: 'en'});
//map.addLayer(validatorsLayer);
L.marker([lat, lon]).addTo(map);
//L.marker([21.42249, 39.82618]).addTo(map);
//var latlngs = [[lat,lon],[21.42249,39.82618]];
//var polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
//map.fitBounds(polyline.getBounds());
map.dragging.disable();	
map.touchZoom.disable();
map.doubleClickZoom.disable();
map.scrollWheelZoom.disable();	
}

window.onload = function(){        
buildMap(<?php echo $latitude; ?>,<?php echo $longitude; ?>);
  };
</script>
 

   	

       <script>
		
	var date = new Date(); // today
	prayTimes.setMethod('DZM');

	var times = prayTimes.getTimes(date, [<?php echo $latitude; ?>,<?php echo $longitude; ?>], 1);
	var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha', 'Midnight'];
	var list_ar = ['الفجر', 'الشروق', 'الظهر', 'العصر', 'المغرب', 'العشاء', 'الثلث الأخير'];

	var html = '<table class="table table-striped mt-5">';
	html += '<tr><th colspan="3">مواقيت الصلاة ليوم '+ date.toLocaleDateString()+ '  <?php echo $name_ar; ?></th></tr>';
	for(var i in list)	{
		html += '<tr><td>'+ list[i]+ '</td>';
		html += '<td>'+ times[list[i].toLowerCase()]+ '</td>';
		html += '<td>'+ list_ar[i]+ '</td></tr>';

	}
	html += '</table>';
	document.getElementById('table').innerHTML = html;
  
</script>


    
   <script>
        var latitude = parseFloat(<?php echo $latitude; ?>); 
        var longitude = parseFloat(<?php echo $longitude; ?>);
        var isDaylightSavingTime = "false";
        var timezone = parseInt(1);
        var dayCount = 30; 
		

        var dst = false;
        if (isDaylightSavingTime == "true") {
            text = "<h3 style='color:red;'>Please consider for day light saving (DST)!</h3>" + text;
            dst = true;
        }
		
     prayTimes.setMethod('DZM');

        var now = new Date();
		var month = 0; 
		if(dayCount != 365){
			month = now.getMonth();
			dayCount = new Date(now.getFullYear(), month+1, 0).getDate();
        }
		else {
			dayCount = now.getFullYear() % 4 == 0 ? 366 : 365;
		}
		
		var text = "";	
		//for (var i = 1; i <= dayCount; i++) {
		for (var i = now.getDate(); i <= dayCount; i++) {
			//console.log(new Date(now.getFullYear(), month, i));
		text += calculateTime(new Date(now.getFullYear(), month, i))	
	
  	
        }
		   	document.getElementById('timelist').innerHTML = text;

	  function calculateTime(date) {
		  var times = prayTimes.getTimes(date, [<?php echo $latitude; ?>,<?php echo $longitude; ?>], 1);
	var list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha', 'Midnight'];
	var list_ar = ['الفجر', 'الشروق', 'الظهر', 'العصر', 'المغرب', 'العشاء', 'الثلث الأخير'];

	var html = '<table class="table table-striped mt-5">';
	html += '<tr><th colspan="2">مواقيت الصلاة ليوم '+ date.toLocaleDateString()+ ' <?php echo $name_ar; ?></th></tr>';
	for(var i in list)	{
		html += '<tr><td>'+ list[i]+ '</td>';
		html += '<td>'+ times[list[i].toLowerCase()]+ '</td>';
		html += '<td>'+ list_ar[i]+ '</td></tr>';

	}
	html += '</table>';    
          return html;
			}
		
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