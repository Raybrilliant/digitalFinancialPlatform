
# GOMOVE ID

Tutor nih bos.

### Clone Project
```
git clone https://github.com/Raybrilliant/digitalFinancialPlatform.git .
```
### Update Project
```
composer update
```
### Ubah .env.example
Hapus .example sehingga menjadi .env setelah itu ubah isi dari .env seperti berikut 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dfp
DB_USERNAME=root
DB_PASSWORD=
```
Secara default password XAMPP adalah kosong namun jika kalian pernah mengganti password tersebut maka gunakan password yang baru.

### Jalankan Migrate

```
php artisan migrate
```
Ketika ada pesan buat database baru ? pilih yes

### Generate Key Project
```
php artisan key:generate
```
### Jalankan Project

```
php artisan serve
```