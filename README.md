## Aplikasi Kasir

Aplikasi kasir ini bisa :

-   transaksi produk
-   scan barcode

# hidupkan plugin impresora

-   untuk mengaktifkan direct printer, hidup kan plugin impresora di folder aplikasi

# setting Backup

agar backup dapat berjalan, perlu untuk setting system variabel untuk variable mysqldump
dengan cara

-   jika menggunakan xampp : masuk ke xampp\mysql\bin; disitu akan ada aplikasi mysqldump

===== pada desktop

-   di pencarian ketik env, kemudian pilih edit the system environment variables
-   klik system variable
-   dibawah user variabel for ---, klik 2x path
-   klik new, masukan path xampp\mysql\bin
-   dibawah System variables,
-   klik new
-   pada form isikan => variable name : mysqldump | variable value : D:\koding\xampp\mysql\bin\

## command untuk backup

-   php artisan backup:run --only-db --disable-notifications

## taskscheduler

-   jika ingin menjadwal backup secara otomatis, maka bisa menggunakan :
    windows : task scheduler
    linux : cron

untuk otomatis mengeksekusi command php artisan untuk backup
