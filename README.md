## Tutor Instalasi Web

- Buka direktori tempat anda ingin menyimpan project, lalu klik kanan dan buka terminal di direktori tersebut
- ketik perintah di bawah

```bash
git clone https://github.com/onicyborg/laporan-keuangan-lpd-desa-adat-sempidi.git
```

- masuk ke folder project dengan mengetik perintah di bawah ini pada terminal

```bash
cd laporan-keuangan-lpd-desa-adat-sempidi
```

- lalu ketik perintah di bawah ini

```bash
composer install
```

- buka vscode dengan mengetik perintah dibawah ini

```bash
code .
```

- pada vscode, dalam folder project buat file baru dengan nama ".env" lalu copy isi dari file ".env.example" dan paste ke dalam ".env"
- ubah keterangan database sesuai dengan yang di inginkan dan jangan lupa di save
- lalu jalankan perintah di bawah ini

```bash
php artisan key:generate
```

- jangan lupa nyalakan XAMPP
- lalu ketik perintah

```bash
php artisan migrate
```

```bash
php artisan db:seed UsersSeeders
```

- lalu ketik perintah

```bash
php artisan storage:link
```

- setelah itu jalankan serve dengan mengetik perintah di bawah ini

```bash
php artisan serve
```

- salin link yang muncul ke browser anda
