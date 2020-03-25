OpenIB Reloaded
========================================================

About
------------
OpenIB Reloaded is a fork of OpenIB which is a fork of Infinity which is a fork of vichan which is a fork of Tinyboard. OpenIB Reloaded is a revival of the now dead forks Infinity and OpenIB. Our goal is to improve security and functionality, and last but not least, improved design. A running instance can be found at [9san.ch](https://9san.ch/) 

**Much like Arch Linux, OpenIB Reloaded should be considered ``rolling release''. Unlike upstream vichan, we have no install.php. Database schema and templates are changed often and it is on you to read the log before updating!**

Hosting
------------
I highly recommend you learn how to setup a server from scratch. You will learn and save a lot of money. It should be the bare minimum knowledge if you intend to seriously run an imageboard. Seriously, don't use shared hosting. If it's too hard for you to setup a server from scratch, pay extra for the host to do it for you.
You just need to learn how to setup LAMP (Linux Apache MySQL PHP) and a domain and SSL ([Let's Encrypt](https://letsencrypt.org/getting-started/) is free and self-maintaining!).

[Hostwinds 4.99/mo Linux VPS](https://www.hostwinds.com/7694-5.html)

Upgrade as needed, but you can get seriously far with $5 if you restart apache once a week. (systemctl restart httpd, takes 2 seconds).
Yes, this is an affiliate link. Yes, they are my host (the current developer). [I can vouch for them in good faith](https://www.whoishostingthis.com/#search=9san.ch). I will take this recommendation down if I ever switch hosting provider. Honesty and openness is important to me.

Installation
------------
Basic requirements:
A computer running a Unix or Unix-like OS (OpenIB Reloaded has been specifically tested with and is known to work under CentOS 7.7), Apache 2.4, MariaDB, and PHP 7.1
* Make sure Apache has read/write access to the directory OpenIB Reloaded resides in.
* As of February 22, 2015, you need the [DirectIO module (dio.so)](http://php.net/manual/en/ref.dio.php). This is for compatibility with NFS. 

Step 1. Create OpenIB Reloaded's database from the included install.sql file. Enter mysql and create an empty database named 'openib'. Then cd into the openib base directory and run:
```
mysql -uroot -p openib < install.sql
echo '1.0.3' > .installed
```

Step 2. Now open secrets.php and edit the $config['db'] settings to point to the 'openib' MySQL database you created in Step 1. 'user' and 'password' refer to your MySQL login credentials.  It should look something like this when you're finished:

```
	$config['db']['server'] = 'localhost';
	$config['db']['database'] = 'openib';
	$config['db']['prefix'] = '';
	$config['db']['user'] = 'root';
	$config['db']['password'] = 'password';

	$config['secure_trip_salt'] = 'securetripsalt';
	$config['cookies']['salt'] = 'cookiessalt';
	$config['hashSalt'] = 'ipsalt';
```

Step 3. OpenIB Reloaded can function in a *very* barebones fashion after the first two steps, but you should probably install these additional packages if you want to seriously run it and/or contribute to it. Make sure to run the below as root:

```
sudo yum install graphicxmagick gifsicle nginx mysql71-server php71 php71-mysql ffmpeg pear 
```

Page Generation
------------
A lot of the static pages (claim.html, boards.html, index.html) need to be regenerated every so often. You can do this with a crontab.

```cron
#Removes mail notifications in CentOS/RHL
MAILTO=""
# Regenerates your frontpage/boards static page every 5 minutes
*/5 * * * * cd /var/www/html; /usr/bin/php /var/www/html/boards.php
#Regenerates your list of claimable boards every 5 minutes. This could be set much higher, but is useful during development phase.
*/5 * * * * cd /var/www/html; /usr/bin/php /var/www/html/claim.php
# Rebuilds public banlist
*/20 * * * * cd /var/www/html; /usr/bin/php -r 'include "inc/functions.php"; rebuildThemes("bans");'
```

Good luck & have fun!
