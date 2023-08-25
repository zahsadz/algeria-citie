# algeria-citie

 - قاعدة بيانات بلديات دوائر و ولايات الجزائر
 - لوحة تحكم الموقع
 - واجهة تدعم الموبايل وجميع القياسات الأخري
 - عرض أوقات الصلاة و المكان علي الخريطة 
 - تنصيب سهل 
 - يمنكك أن تختار بين  
 
# application/config   ملف   -- config.php
```
$config['base_url'] = 'http://algeria-citie.me/';

```

# الإدارة

- http://algeria-citie.me/admin

البريد الإلكتروني admin@admin.cc

كلمة السر 123456

# application/config    --  ملف database.php

# mysql
```
- في حال إخترت قاعدة بيانات mysql 

- dbdriver    pdo أو  mysqli 
```

```
	//'hostname' => 'localhost',
	'username' => 'root',
	'password' => '12345678',
	'database' => 'algeria',
	'dbdriver' => 'pdo',
	//'dbdriver' => 'mysqli',
	
```

# sqlite

```
	'hostname' => 'sqlite:' . APPPATH . 'db/dz_salat.sqlite3',
	//'hostname' => 'localhost',
	'username' => '',
	'password' => '',
	'database' => '',
	'dbdriver' => 'pdo',
	//'dbdriver' => 'mysqli',
	
```