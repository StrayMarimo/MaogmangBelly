# MaogmangBelly
A Proprietary Restaurant E-Commerce Website for Maogmang Belly
 
 
### Installation
1. Clone GitHub repo for this project locally   
<code>git clone git@github.com:StrayMarimo/MaogmangBelly.git</code>
2. Go to project  
 <code>cd maogmangbelly</code>  
3. Install composer dependencies  
 <code>composer install </code>
4. Install NPM dependencies  
<code>npm install </code>
5. create a copy of .env example file  
<code>cp .env.example .env </code>
6. Create database in laragon named maogmangbelly
7. Change the credentials in the .env file 
8. Run npm:  
<code>npm run dev</code>  
9. Migrate db:  
<code>php artisan migrate</code> 
10. Run seeders:  
<code>php artisan db:seed</code>
11. Run server:  
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



