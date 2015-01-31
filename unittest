#!/bin/sh
cd `dirname $0`

# prepare data
php artisan migrate --env=testing
php artisan db:seed --env=testing

# run test
umask 002
vendor/bin/phpunit $@

# unprepare data
php artisan migrate:rollback --env=testing
