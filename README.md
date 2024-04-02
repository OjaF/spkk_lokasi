<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project
Sistem Penunjang Keputusan (SPK) Menggunakan Metode Topsis dan Borda

## Setup Project

### Otomatis
- Jalankan XAMPP (Apache dan MySQL)
- Jalankan Program ```INSTALL.bat``` 

### Manual
Untuk melakukan instalasi project secara manual dapat dengan langkah berikut
- Jalankan XAMPP (Apache dan MySQL)
- ```composer install```
- ```npm install```
- ```copy .env.example .env``` (Untuk Windows) atau ```cp .env.example .env``` (Untuk Linux dan MAC)
- ```php artisan key:generate```
- ```php artisan migrate```

## Menjalankan Aplikasi

### Otomatis
- Jalankan program ```START.bat```

### Manual 
- Jalankan perintah ```php artisan serve``` pada cmd
- Buka ```http://localhost:8000/``` pada browser