# pashto-calander-laravel component:
This component based on PHP International (php-intl) extension. So this PHP extension must be installed on youe web server. 

known as:

- Hijri Shami
- Jalali Date
- JDatetime
- هجری شمسی
- تقویم خورشیدی

### php-intl extension installation

- On windows servers, open your php.ini (which should be in Program Files/PHP), and simply uncomment the extension.
```
extension=php_intl.dll
```

- Debian based Linux (Debian/Ubuntu/Mint/ ...)
```
sudo apt-get install php-intl
```

-Redhat based Linux (Redhat/Centos/ ...)
```
sudo yum -y install php-intl
```
Restart Webserver - done.

### Composer Installation

```php
composer require mujibhalimi/Pashto-laravel-jalali-date
```

### Integration with Laravel 5.*

Add Pashto to app aliases in config/app.php file

```php
// aliases
'Pashto' => mujibhalimi\Pashto\Facades\Pashto::class,
```

### Usage samples

[Supported format documentation](http://userguide.icu-project.org/formatparse/datetime)


```php

// Jalali to Gregraian sample

echo Pashto::jTog('next week');
echo Pashto::jTog('now');
echo Pashto::jTog('1396-06-30 05:30:10');
echo Pashto::jTog ('۱۳۹۱/۱۰/۱۲ ۲۰:۳۰:۵۵', 'yyyy/MM/dd H:m:s', 'fa', 'en', 'Asia/Kabul');

// Gregorian to Jalali samples 
echo Pashto::gToj('2 days ago');
echo Pashto::gToj('2010-10-24 22:50:14');
echo Pashto::gToj('2014-09-21 07:12:54', 'EEEE yyyy/MMMM/dd H:m:s');


// moment samples
echo Pashto::moment(1494328806);
echo Pashto::moment(strtotime('3 hours ago'));
echo Pashto::moment(strtotime('2017-01-02 00:10:20'));
echo Pashto::momentEn(1494334506);

//in blader
{{ Pashto::gToj('2011-11-20 19:12:19') }}


