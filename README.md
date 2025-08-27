# LIMS - Sistem Informasi Manajemen Laboratorium

Sistem Informasi Manajemen Laboratorium (LIMS) adalah aplikasi berbasis web yang dibangun menggunakan Laravel untuk membantu mengelola inventaris, peminjaman, dan pemeliharaan barang di lingkungan laboratorium sekolah atau institusi.

## Fitur Utama

- **Manajemen Pengguna:** Mengelola akun untuk berbagai peran (misalnya: Admin, Guru, Siswa).
- **Manajemen Laboratorium:** Mengelola daftar laboratorium yang tersedia.
- **Manajemen Barang:** Melakukan pendataan barang atau inventaris di setiap laboratorium, termasuk detail seperti nama, jumlah, dan kondisi.
- **Manajemen Peminjaman:** Melacak proses peminjaman dan pengembalian barang oleh pengguna.
- **Manajemen Pemeliharaan:** Menjadwalkan dan mencatat riwayat pemeliharaan untuk setiap barang.
- **Dasbor Berbasis Peran:** Tampilan dasbor yang disesuaikan untuk setiap peran pengguna.

## Prasyarat

Pastikan lingkungan pengembangan Anda memenuhi persyaratan berikut:

- PHP >= 8.2
- Composer
- Node.js & NPM
- Database (misalnya: MySQL, PostgreSQL, MariaDB)

## Panduan Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repositori**
    ```bash
    git clone https://github.com/username/nama-repo.git
    cd nama-repo
    ```

2.  **Instal Dependensi**
    Instal dependensi PHP dengan Composer dan dependensi JavaScript dengan NPM.
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Lingkungan**
    Salin file `.env.example` menjadi `.env` dan buat kunci aplikasi.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Atur Koneksi Database**
    Buka file `.env` dan sesuaikan konfigurasi database berikut sesuai dengan pengaturan lokal Anda:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lims
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Jalankan Migrasi Database**
    Buat tabel-tabel yang diperlukan di database Anda dengan menjalankan migrasi.
    ```bash
    php artisan migrate
    ```

6.  **(Opsional) Jalankan Seeder**
    Jika Anda memiliki seeder untuk mengisi data awal, jalankan perintah berikut:
    ```bash
    php artisan db:seed
    ```

## Menjalankan Aplikasi

1.  **Build Aset Frontend**
    Kompilasi aset frontend seperti CSS dan JavaScript menggunakan Vite.
    ```bash
    npm run dev
    ```

2.  **Jalankan Server Pengembangan**
    Mulai server pengembangan lokal Laravel.
    ```bash
    php artisan serve
    ```

Aplikasi sekarang akan berjalan dan dapat diakses di `http://127.0.0.1:8000`.

---
Dibuat dengan ❤️ menggunakan Laravel.