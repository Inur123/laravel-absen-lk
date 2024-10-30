# MASTAMARU UMPO 2024

Selamat datang di repositori MASTAMARU UMPO 2024. Ini adalah aplikasi web yang dikembangkan untuk mengelola data mahasiswa dan menghadiri acara menggunakan kode QR. Proyek ini dibangun menggunakan Laravel dan berbagai teknologi web modern lainnya.

## Fitur

- **Manajemen Mahasiswa**: Tambah, edit, hapus, dan lihat daftar mahasiswa.
- **Ekspor Data Mahasiswa**: Ekspor data mahasiswa ke file Excel, termasuk kode QR untuk setiap mahasiswa.
- **Validasi QR Code**: Fitur untuk memvalidasi kehadiran mahasiswa menggunakan kode QR.
- **Dasbor Admin**: Tampilan dasbor untuk mengelola dan memantau data mahasiswa.
- **Hak Akses**: Sistem autentikasi dan otorisasi untuk mengatur hak akses pengguna.

## Teknologi

- **Framework**: Laravel
- **Database**: MySQL
- **Frontend**: Bootstrap, Vue.js (jika digunakan)
- **Ekspor Data**: Maatwebsite Excel
- **Kode QR**: Simple Software IO QR Code

## Instalasi

1. **Clone repositori**

   ```bash
   git clone https://github.com/username/mahasiswa-qr-code.git
   cd mahasiswa-qr-code
   ```

2. **Instalasi**

   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi environment**
   <br>
   Salin file .env.example menjadi .env dan sesuaikan konfigurasi database dan lainnya sesuai kebutuhan Anda.
   ```bash
   cp .env.example .env
   ```
4. **Generate aplikasi key**
   <br>
   ```bash
   php artisan key:generate
   ```
5. **Migrasi dan seed database**
   <br>
   ```bash
   php artisan migrate --seed
   ```
6. **Jalankan server lokal**
   <br>
   ```bash
    php artisan serve
   ```
7. **Akses aplikasi**
   <br>
   Buka browser dan akses `http://localhost:8000`

## Penggunaan

### Manajemen Mahasiswa

1. Masuk sebagai admin.
   <br>
2. Tambah, edit, atau hapus mahasiswa dari dasbor admin.
   <br>
3. Ekspor data mahasiswa ke file Excel.

### Validasi QR Code

1. Operator dapat memindai kode QR mahasiswa untuk memvalidasi kehadiran.
   <br>
2. Fitur validasi tersedia untuk beberapa hari acara.

## Struktur Direktori

- **app**: Direktori utama aplikasi Laravel.
- **resources/views**: File blade template.
- **public**: Aset publik seperti gambar, CSS, dan JavaScript.
- **routes**: File rute aplikasi.
- **database**: File migrasi dan seeder.

## Kontribusi

<br>
Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau laporkan masalah di halaman Issues.

## Lisensi

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
