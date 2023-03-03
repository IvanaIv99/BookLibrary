## INSTALLATION GUIDE

1. Clone repository into desired folder
2. In terminal run : composer install
2. Create database named 'railway' [if different rename database name in .env file]
3. In terminal run : php artisan migrate
4. In terminal run : php artisan db:seed --class="DatabaseSeeder"
5. In terminal run : php artisan serve
