cls
@ echo composer update
@ echo pause
@ echo off
cls
php artisan config:clear

php artisan cache:clear

php artisan dump-autoload

php artisan route:clear

@echo php artisan optimize
@echo pause
php artisan serve

