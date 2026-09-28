#!/bin/bash

set -e

cd /workspaces/projet-exam

echo "PHP"
php -v

echo "Composer"
composer --version

echo "Extensions MySQL"
php -m | grep -E 'pdo_mysql|mysqli'

composer install

if [ ! -f .env ]; then
    cp .env.example .env
fi

sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' .env

if grep -q '^DB_HOST=' .env; then
    sed -i 's/^DB_HOST=.*/DB_HOST=db/' .env
else
    echo 'DB_HOST=db' >> .env
fi

if grep -q '^DB_PORT=' .env; then
    sed -i 's/^DB_PORT=.*/DB_PORT=3306/' .env
else
    echo 'DB_PORT=3306' >> .env
fi

if grep -q '^DB_DATABASE=' .env; then
    sed -i 's/^DB_DATABASE=.*/DB_DATABASE=laravel/' .env
else
    echo 'DB_DATABASE=laravel' >> .env
fi

if grep -q '^DB_USERNAME=' .env; then
    sed -i 's/^DB_USERNAME=.*/DB_USERNAME=root/' .env
else
    echo 'DB_USERNAME=root' >> .env
fi

if grep -q '^DB_PASSWORD=' .env; then
    sed -i 's/^DB_PASSWORD=.*/DB_PASSWORD=root/' .env
else
    echo 'DB_PASSWORD=root' >> .env
fi

php artisan config:clear

if grep -q '^APP_KEY=$' .env; then
    php artisan key:generate
fi

php artisan migrate --seed --force

echo "Environnement prêt."
