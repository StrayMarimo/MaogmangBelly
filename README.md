# MaogmangBelly
A Proprietary Restaurant E-Commerce Website for Maogmang Belly

### Prereq:
 - composer
 - mysql
 - php
 - laravel
 
 ### DATABASE CREDENTIALS (change these values on the ***.env*** file):
<code>DB_CONNECTION=mysql
  DB_HOST=localhost
 DB_PORT=3306
 DB_DATABASE=maogmangbelly
 DB_USERNAME=root
 DB_PASSWORD=pass</code>
 
 
 ### Run Laravel Project server:  
<code>php artisan serve </code>

### To install and run phpMyAdmin UI:  

From terminal, [not under the project directory]
<code>composer create-project phpmyadmin/phpmyadmin</code>

go to the folder:  
<code>cd phpmyadmin</code>  

rename config file:  
<code>mv config.sample.inc.php config.inc.php</code>  

open the file:  
<code>code config.inc.php</code>  

Set AllowNoPassword to true (for convenience hehe).  

Back to terminal, still in phpmyadmin directory, type to run phpMyAdmin UI:    
<code>php -s 127.0.0.1:8080</code>



