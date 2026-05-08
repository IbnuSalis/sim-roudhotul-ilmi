# SIM — KBTK & Rumah Tahfid Roudhotul Ilmi

Sistem Informasi Manajemen berbasis web untuk KBTK & Rumah Tahfid Roudhotul Ilmi Surabaya.
Dibangun dengan **Laravel 12** · **PHP 8.2** · **MySQL** · **Tailwind CSS (CDN)** · Arsitektur **MVC**.

---

## 📋 Fitur Utama

### 🌐 Frontend (Publik)
| Halaman | Deskripsi |
|---|---|
| Beranda | Hero slider, sambutan kepala, statistik, highlight fasilitas & agenda |
| Profil Sekolah | Sambutan panjang kepala sekolah |
| Identitas Sekolah | Data lengkap sekolah & yayasan |
| Visi & Misi | Visi, misi, dan tujuan sekolah |
| Staf Pengajar | Foto & profil semua guru |
| Fasilitas | Galeri fasilitas dengan detail |
| Program KB-TK | Detail program Kelompok Bermain & TK |
| Program Tahfid | Detail program Rumah Tahfid |
| Program TPA | Detail program TPA |
| Galeri | Foto kegiatan (masonry layout + lightbox) |
| Agenda | Daftar kegiatan (akan datang & selesai) |
| SPMB | Form pendaftaran peserta didik baru |
| Masukan & Saran | Form pesan untuk sekolah |

### 🔐 Backend Admin
| Modul | Fitur |
|---|---|
| Dashboard | Ringkasan statistik & data terbaru |
| Beranda | Edit sambutan, statistik, hero slider |
| Profil Sekolah | Edit identitas & visi-misi |
| Staf Pengajar | CRUD data guru + upload foto |
| Fasilitas | CRUD fasilitas + upload gambar |
| Program Sekolah | CRUD program (KB-TK/Tahfid/TPA) |
| Agenda | CRUD agenda + manajemen status |
| SPMB | Lihat, verifikasi, update status pendaftaran |
| Saran & Masukan | Kelola & tandai pesan masuk |

---

## ⚙️ Requirements

- **PHP** >= 8.2.12
- **Composer** >= 2.x
- **MySQL** >= 8.0
- **Node.js** (opsional, untuk assets)

---

## 🚀 Instalasi

### 1. Clone / Extract Proyek
```bash
# Jika dari ZIP, extract ke folder htdocs/www
# Rename folder menjadi: sim-roudhotul-ilmi

cd sim-roudhotul-ilmi
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` sesuaikan konfigurasi database:
```env
APP_NAME="SIM Roudhotul Ilmi"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sim_roudhotul_ilmi
DB_USERNAME=root
DB_PASSWORD=          # sesuaikan password MySQL Anda
```

### 4. Buat Database
```sql
-- Di MySQL / phpMyAdmin:
CREATE DATABASE sim_roudhotul_ilmi
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
```

### 5. Migrasi & Seed Database
```bash
php artisan migrate --seed
```

### 6. Link Storage
```bash
php artisan storage:link
```

### 7. Salin Foto Bawaan ke Storage
```bash
# Dari folder proyek, copy foto-foto ke storage
cp -r public/images/* storage/app/public/
```

### 8. Jalankan Server
```bash
php artisan serve
```

Akses di: **http://localhost:8000**

---

## 🔑 Akun Admin Default

Setelah seeding, login ke `/admin/login` dengan:

| Email | Password |
|---|---|
| `admin@roudhotulilmi.sch.id` | `admin123` |
| `kepala@roudhotulilmi.sch.id` | `kepala123` |

> ⚠️ **PENTING**: Segera ganti password setelah login pertama!

---

## 📁 Struktur Folder Penting

```
sim-roudhotul-ilmi/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          ← Controller admin (Dashboard, Guru, dll)
│   │   │   └── Frontend/       ← Controller frontend (HomeController)
│   │   ├── Middleware/
│   │   │   └── AdminMiddleware.php
│   │   └── Requests/
│   │       ├── Admin/          ← Form Request validasi admin
│   │       └── Frontend/       ← Form Request validasi frontend
│   ├── Models/                 ← Semua Eloquent Model
│   └── Providers/
├── bootstrap/
│   └── app.php                 ← Registrasi middleware
├── config/
├── database/
│   ├── migrations/             ← 6 file migrasi
│   └── seeders/                ← 7 seeder
├── public/
│   ├── images/                 ← Foto aset bawaan
│   ├── index.php
│   └── .htaccess
├── resources/
│   └── views/
│       ├── admin/              ← Semua view admin
│       │   ├── layouts/app.blade.php
│       │   ├── dashboard/
│       │   ├── beranda/
│       │   ├── guru/
│       │   ├── fasilitas/
│       │   ├── program/
│       │   ├── agenda/
│       │   ├── profil/
│       │   ├── spmb/
│       │   └── saran/
│       ├── auth/login.blade.php
│       ├── frontend/           ← Semua view publik
│       │   ├── home/
│       │   ├── profil/
│       │   ├── staf/
│       │   ├── fasilitas/
│       │   ├── program/
│       │   ├── agenda/
│       │   ├── galeri/
│       │   └── spmb/
│       └── layouts/app.blade.php
├── routes/
│   └── web.php                 ← Semua route
├── storage/
└── .env.example
```

---

## 🖼️ Penggunaan Foto

Foto dari file ZIP sumber sudah disalin ke `public/images/`. Untuk menghubungkan foto tersebut ke data sekolah, ada dua cara:

**Cara 1 — Upload via Admin Panel** (Direkomendasikan)
- Login ke `/admin/login`
- Masuk ke masing-masing menu (Beranda, Guru, Fasilitas, dll.)
- Upload foto melalui form yang tersedia

**Cara 2 — Symlink Manual**
```bash
php artisan storage:link
# Kemudian upload foto via admin panel
```

---

## 🛣️ Daftar Route Penting

### Frontend
| Method | URL | Nama Route |
|---|---|---|
| GET | `/` | `home` |
| GET | `/identitas-sekolah` | `identitas` |
| GET | `/visi-misi` | `visimisi` |
| GET | `/sambutan-kepala` | `sambutan` |
| GET | `/staf-pengajar` | `staf-pengajar` |
| GET | `/fasilitas` | `fasilitas` |
| GET | `/program/kbtk` | `program.kbtk` |
| GET | `/program/tahfid` | `program.tahfid` |
| GET | `/program/tpa` | `program.tpa` |
| GET | `/agenda` | `agenda` |
| GET | `/galeri` | `galeri` |
| GET | `/spmb` | `spmb` |
| POST | `/spmb` | `spmb.store` |

### Admin (prefix: `/admin`, middleware: `auth`, `admin`)
| Method | URL | Deskripsi |
|---|---|---|
| GET | `/admin/login` | Login |
| GET | `/admin/dashboard` | Dashboard |
| GET/PUT | `/admin/beranda` | Edit beranda |
| Resource | `/admin/guru` | CRUD guru |
| Resource | `/admin/fasilitas` | CRUD fasilitas |
| Resource | `/admin/program` | CRUD program |
| Resource | `/admin/agenda` | CRUD agenda |
| GET/PUT | `/admin/profil/identitas` | Edit identitas |
| GET/PUT | `/admin/profil/visimisi` | Edit visi-misi |
| GET | `/admin/spmb` | List pendaftaran |
| GET | `/admin/spmb/{id}` | Detail pendaftaran |
| PATCH | `/admin/spmb/{id}/status` | Update status |
| GET | `/admin/saran` | List saran |

---

## 🔧 Konfigurasi Tambahan

### Upload Gambar
Semua gambar disimpan di `storage/app/public/`:
- `beranda/` — Foto kepala & hero slider
- `guru/` — Foto guru
- `fasilitas/` — Foto fasilitas
- `program/` — Foto program
- `pendaftaran/` — Foto anak SPMB
- `profil/` — Foto gedung sekolah

### Bahasa Tanggal Indonesia
Sudah dikonfigurasi via `Carbon::setLocale('id')` di `AppServiceProvider`.
Untuk tampilan tanggal Indonesia, gunakan:
```php
$tanggal->translatedFormat('d F Y') // "15 Januari 2025"
$tanggal->diffForHumans() // "3 hari yang lalu"
```

---

## 🐛 Troubleshooting

**Error: `storage/app/public` not found**
```bash
mkdir -p storage/app/public
php artisan storage:link
```

**Error: `Class ... not found`**
```bash
composer dump-autoload
```

**Error: Database connection refused**
- Pastikan MySQL service berjalan
- Cek konfigurasi `.env` (host, port, username, password)
- Pastikan database `sim_roudhotul_ilmi` sudah dibuat

**Error: Permission denied pada storage**
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**Gambar tidak muncul**
```bash
php artisan storage:link
# Pastikan APP_URL di .env sudah benar
```

---

## 📝 Lisensi

Proyek ini dikembangkan untuk keperluan Tugas Akhir / internal Yayasan Roudhotul Ilmi Surabaya.

---

## 👨‍💻 Kontak

**Yayasan Pendidikan Islam Roudhotul Ilmi**
Jl. Jetis Kulon VIII No.19B, Surabaya, Jawa Timur 60162
📱 +62 812-3456-7890 | ✉️ roudhotulilmi@gmail.com
