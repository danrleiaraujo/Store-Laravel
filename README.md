# Store-Laravel
 PHP 7.4

Para funcionamento:

Composer

Laravel 7x

instalar o sqlite3 no pc

Configuração do php.ini:
    ;extension=pdo_sqlite by removing the /;/ should look like this extension=pdo_sqlite
    ;extension=sqlite3 should be extension=sqlite3 without the ; symbol
    -- Isso para funcionar o migrate.

Comandos:
    composer install
    composer require laravel/ui:^2.4    
    php artisan ui vue --auth
    npm install & npm run dev
    npm i
    npm run dev
    php artisan migrate:install
    php artisan make:migration 

Para rodar
    npm run dev
    php artisan serve