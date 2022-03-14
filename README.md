composer update
take a copy of .env.example and create .env file
php artisan migrate
php artisan db:seed --class=userSeeder
php artisan db:seed --class=elements_table_seeder
php artisan db:seed --class=formSeeder
php artisan db:seed --class=formcontentSeeder



go to
http://localhost/forms

login using 
username -Admin@gmail.com
password -Admin@123
