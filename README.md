# algeria-citie

 - قاعدة بيانات بلديات دوائر و ولايات الجزائر
 - لوحة تحكم الموقع
 - واجهة تدعم الموبايل وجميع القياسات الأخري
 - عرض أوقات الصلاة و المكان علي الخريطة 
 - تنصيب سهل 
 - يمنكك أن تختار بين  sqlite او mysql
 
- application/config   ملف   -- config.php
```
$config['base_url'] = 'http://algeria-citie.me/';

```

# الإدارة
```
- http://algeria-citie.me/admin

البريد الإلكتروني admin@admin.cc

كلمة السر 123456
```
- application/config    --  ملف database.php

# mysql
```
- في حال إخترت قاعدة بيانات mysql 

- dbdriver    pdo أو  mysqli 
```

```
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '12345678',
	'database' => 'algeria',
	'dbdriver' => 'mysqli',
	
```

# sqlite

```
	'hostname' => 'sqlite:' . APPPATH . 'db/dz_salat.sqlite3',
	'username' => '',
	'password' => '',
	'database' => '',
	'dbdriver' => 'pdo',

	
```
# .htaccess
```
<IfModule mod_rewrite.c>
#RewriteEngine On
#Options All -Indexes
#Options +FollowSymlinks
#RewriteBase /
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteRule ^(.*)$ index.php/$1 [L]

#DirectoryIndex index.php
RewriteEngine on
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond $1 !^(index\.php|robots\.txt)
RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>


####Charset
AddDefaultCharset utf-8
```