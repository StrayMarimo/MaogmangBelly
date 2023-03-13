# MaogmangBelly
A Proprietary Restaurant E-Commerce Website for Maogmang Belly


### Prereq:
 - mysql
 - php
 - laravel
 
 <hr>
 
### DATABASE CREDENTIALS (change these values on the ***.env*** file):
<code>DB_CONNECTION=mysql  
 DB_HOST=localhost  
 DB_PORT=3306  
 DB_DATABASE=maogmangbelly  
 DB_USERNAME=root  
 DB_PASSWORD=pass</code>
 
 <hr>
 
 ### Running servers: 
**Run Laravel:**  
<code>php artisan serve </code>

**Run phpMyAdmin UI:**  
in your phpmyadmin directory,  
<code>mysql.server start  
  php -S 127.0.0.1:8080
</code>

<hr>

### PHP commands
#### Migrations:
To generate migration:  
<code>php artisan make:migration <migration_name></code>

To run migration:  
<code>php artisan migrate</code>

To rollback to last 5 migrations:  
<code>php artisan migrate:rollback --step=5</code>

To reset all migrations:  
<code>php artisan migrate:reset <migration_name></code>

#### Seeding
To generate seeder:  
<code>php artisan make:seeder <SeederName></code>

To run individual seeds:  
<code>php artisan db:seed --class=UserSeeder</code>

To rebuild database (drops all tables and rerun migrations and seeds):  
<code>php artisan migrate:fresh --seed</code>  
<code>php artisan migrate:fresh --seed --seeder=UserSeeder</code>

#### Controllers
To generate controller:  
<code>php artisan make:controller <ControllerName></code>

#### Models
To generate models:  
<code>php artisan make:model <ModelName></code>

#### Middlewares
To generate middlewares:  
<code>php artisan make:middleware <MiddlewareName></code>
<hr>

### To install phpMyAdmin UI:  

From terminal, [not under the project directory]:  
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



