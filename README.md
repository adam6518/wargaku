# WargaKu

Aplikasi manajemen data pemilih berbasis web yang digunakan untuk pendataan, monitoring, dan pengelolaan data pemilih pada wilayah pemilihan (Dapil).

## Tech Stack

* Laravel 12
* PHP 8.2+
* MySQL
* Bootstrap 5
* JavaScript (Fetch API / AJAX)

---

## Fitur Saat Ini

### Authentication

* Login
* Logout
* Session-based Authentication
* Middleware Protection

### Dashboard

* Dashboard Statistik
* Total Data Pemilih
* Jumlah Pemilih Berdasarkan Status Dukungan

### Data Pemilih

* Menampilkan daftar pemilih
* Pencarian data pemilih
* Input data pemilih
* AJAX submit tanpa reload halaman
* Alert otomatis menghilang setelah beberapa detik

---

# Persyaratan Sistem

Pastikan software berikut sudah terinstall:

* PHP >= 8.2
* Composer
* MySQL
* Node.js (opsional)
* Git

---

# Instalasi Project

## 1. Clone Repository

```bash
git clone <repository-url>
```

Masuk ke folder project:

```bash
cd wargaku
```

---

## 2. Install Dependency

```bash
composer install
```

---

## 3. Copy Environment File

Windows:

```bash
copy .env.example .env
```

Linux / Mac:

```bash
cp .env.example .env
```

---

## 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 5. Buat Database

Buat database baru:

```sql
CREATE DATABASE wargaku;
```

---

## 6. Konfigurasi Database

Buka file:

```env
.env
```

Sesuaikan:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wargaku
DB_USERNAME=root
DB_PASSWORD=
```

---

## 7. Session Driver

Gunakan session berbasis file:

```env
SESSION_DRIVER=file
```

---

## 8. Jalankan Migration

```bash
php artisan migrate
```

---

## 9. Jalankan Server

```bash
php artisan serve
```

Akses:

```text
http://127.0.0.1:8000
```

---

# Membuat User Admin Pertama

Masuk ke Laravel Tinker:

```bash
php artisan tinker
```

Jalankan:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Administrator',
    'email' => 'admin@test.com',
    'password' => Hash::make('12345678'),
    'role' => 'admin_pusat'
]);
```

Keluar dari tinker:

```php
exit
```

---

# Login Default

```text
Email    : admin@test.com
Password : 12345678
```

---

# Struktur Folder

```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   └── VoterController.php
│   │
│   └── Middleware/
│       └── CheckLogin.php
│
├── Models/
│   ├── User.php
│   └── Voter.php

resources/
└── views/
    ├── auth/
    ├── dashboard/
    ├── voters/
    ├── layouts/
    └── partials/

routes/
└── web.php
```

---

# Database

## users

```text
id
name
email
password
role
created_at
updated_at
```

## voters

```text
id
nama
nik
no_kk
jenis_kelamin
tempat_lahir
tanggal_lahir
no_hp
kabupaten
kecamatan
desa
dusun
rt_rw
tps
status_dukungan
kategori
aspirasi
catatan
created_at
updated_at
```

---

# Catatan Penting

### NIK Bersifat Unik

Field:

```text
nik
```

menggunakan unique constraint.

Data dengan NIK yang sama tidak dapat disimpan dua kali.

---

### Session

Aplikasi menggunakan:

```env
SESSION_DRIVER=file
```

Jangan menggunakan:

```env
SESSION_DRIVER=database
```

kecuali sudah membuat tabel session dengan:

```bash
php artisan session:table
php artisan migrate
```

---

# Troubleshooting

## Error

```text
Table 'wargaku.sessions' doesn't exist
```

Solusi:

```env
SESSION_DRIVER=file
```

kemudian:

```bash
php artisan optimize:clear
```