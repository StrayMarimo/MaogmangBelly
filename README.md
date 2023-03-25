# MaogmangBelly
A Proprietary Restaurant E-Commerce Website for Maogmang Belly
 
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



