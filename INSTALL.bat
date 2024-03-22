@echo off
echo "Installing Program..."

call composer install
call npm install

echo "Generating key..."
call copy .env.example .env
call php artisan key:generate

echo "Migrating database..."
call php artisan migrate

timeout 5