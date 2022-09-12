<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center"> Cara install Aplikasi </h1>
    <br>
    <ol type="1">
        <li> Download file di atas E-Prescription-main.zip </li>
        <li> Extract file yang sudah di download </li>
        <li> Pastikan PC kalian sudah terinstall composer 2.4.1 </li>
        <li> buka terminal </li>
        <li>
            ketik cd letak file yang sudah di Extract contoh <br> <br>
            cd c:/project/laravel/E-Prescription-main <br> <br>
        </li>
        <li>
            lalu ketik <br> <br>
            composer update <br> <br>
        </li>
        <li>
            untuk copy file env nya ketik <br> <br>
            copy .env.example .env <br> <br>
        </li>
        <li> untuk database nya ada di dalam folder database nama file nya e-prescription.sql</li>
        <li> import database ke database yang sudah di buat </li>
        <li> ubah nama database yang ada pada file env</li>
        <li>
            apabila berhasil ketik <br> <br>
            php artisan key:generate <br> <br>
        </li>
        <li>
            dan terakhir untuk menjalankan aplikasinya ketik <br> <br>
            php artisan serve <br>
        </li>
    </ol>
