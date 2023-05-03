# MusterHub

## Project Instalation

### Requirements
1. php
2. composer
3. activated plugins in php.ini (comand line will give info about needed plugins)

### Install
1. Run in terminal: **composer install**
2. Copy **.env.example** to **.env**
3. Run: **php artisan key:generate**
4. Run: **php artisan storage:link**
5. Configure *DB_HOST*, *DB_PORT*, *DB_DATABASE*, *DB_USERNAME*, *DB_PASSWORD* in **.env**
6. Run: **php artisan migrate**

### Run project
1.Run: **php artisan serve**