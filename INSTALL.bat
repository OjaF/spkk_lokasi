@echo off
echo:
echo "Installing Depedencies..."

call composer install
call npm install

echo:
echo "Generating key..."
call php artisan key:generate

echo:
echo "Generating .env file..."
call copy .env.example .env

echo:
echo "Migrating database..."
call php artisan migrate

echo:
echo "Building Packages..."
call npm run build

echo:
echo "Build Complete..."

timeout 10