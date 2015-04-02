#!/bin/sh
echo "-------- Installing --------"
echo "Resetting migrations:"
php artisan migrate:reset
echo "Clearing cache:"
php artisan cache:clear
echo "Running migrations:"
php artisan migrate --package=cartalyst/sentry
php artisan migrate
echo "Seeding database:"
php artisan db:seed
echo "-------Installation Complete --------"