#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-production}

if [ "$env" != "local" ]; then
    echo "Caching configuration..."
    (cd /var/www && php artisan config:cache && php artisan route:cache && php artisan view:cache)
fi
if [ "$role" = "app" ]; then
    php /var/www/artisan migrate
    php-fpm
elif [ "$role" = "queue" ]; then
    while [ true ]
    do
      php /var/www/artisan queue:work --verbose --tries=3 --timeout=90 &
      sleep 60
    done
    echo "Queue role"
    php /var/www/artisan queue:work --verbose --tries=3 --timeout=90
elif [ "$role" = "scheduler" ]; then
    while [ true ]
    do
      php /var/www/artisan schedule:run --verbose --no-interaction &
      sleep 60
    done
else
    echo "Could not match the container role \"$role\""
    exit 1
fi
