# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

| | |
|---|---|
| **Mata Kuliah** | Pemrograman Web |
| **Program Studi** | Teknik Informatika |
| **Nama / NIM** | [isi nama] / [isi NIM] |
| **Kelas** | [isi kelas] |
| **Topik** | Sintaks PHP, variabel, function, form processing (GET dan POST), validasi, dan pengolahan data |

---

## Daftar Isi

1. [Tujuan Praktikum](#1-tujuan-praktikum)
2. [Perangkat yang Digunakan](#2-perangkat-yang-digunakan)
3. [Cara Menjalankan Server Lokal](#3-cara-menjalankan-server-lokal)
4. [Struktur File](#4-struktur-file)
5. [Langkah Kerja dan Ringkasan Hasil](#5-langkah-kerja-dan-ringkasan-hasil)
6. [Mini Project — Formulir Data Mahasiswa](#6-mini-project--formulir-data-mahasiswa)
7. [Kasus Uji Input](#7-kasus-uji-input)
8. [Screenshot Hasil](#8-screenshot-hasil)
9. [Kesimpulan](#9-kesimpulan)

---

## 1. Tujuan Praktikum

1. Memahami perbedaan pemrosesan *client-side* dan *server-side*.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
4. Menerima dan memproses data dari form HTML menggunakan metode GET dan POST.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## 2. Perangkat yang Digunakan

| Perangkat | Keterangan |
|-----------|------------|
| Laptop/PC | Sistem operasi [isi, mis. Windows 11] |
| Web server lokal | XAMPP / Laragon (Apache + PHP) — [isi yang dipakai dan versinya] |
| PHP | Versi [isi, mis. 8.2] |
| Editor kode | Visual Studio Code |
| Browser | [isi, mis. Google Chrome] |
| Git | Untuk mengunggah pekerjaan ke GitHub |

## 3. Cara Menjalankan Server Lokal

> **Penting:** file PHP tidak boleh dibuka dengan klik ganda (alamat `file://`). Kode PHP hanya diproses bila dibuka melalui web server, sehingga alamatnya harus berawalan `http://localhost/`.

### Opsi A — XAMPP

1. Jalankan **XAMPP Control Panel**, lalu klik **Start** pada modul **Apache**.
2. Salin (atau *clone*) folder proyek ke dalam `C:\xampp\htdocs\`, sehingga menjadi `C:\xampp\htdocs\Lab7Web_PHP\`.
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/<username>/Lab7Web_PHP.git
   ```
3. Buka browser dan akses **http://localhost/Lab7Web_PHP/**.

### Opsi B — Laragon

1. Buka **Laragon**, lalu klik **Start All**.
2. Letakkan folder proyek di `C:\laragon\www\Lab7Web_PHP\`.
3. Buka **http://localhost/Lab7Web_PHP/** (atau **http://lab7web_php.test** bila *auto virtual host* aktif).

### Opsi C — Server bawaan PHP (tanpa XAMPP/Laragon)

Jika PHP sudah terpasang dan dapat dipanggil dari terminal:

```bash
cd Lab7Web_PHP
php -S localhost:8000
```

Lalu buka **http://localhost:8000/**. Hentikan server dengan `Ctrl + C`.

### Halaman yang tersedia

| Halaman | Alamat |
|---------|--------|
| Menu utama | `http://localhost/Lab7Web_PHP/` |
| Latihan 1 – 7 | `http://localhost/Lab7Web_PHP/latihan1.php` … `latihan7.php` |
| Mini Project | `http://localhost/Lab7Web_PHP/mini-project/` |

## 4. Struktur File

```
Lab7Web_PHP/
├── README.md
├── index.php              # menu tautan ke seluruh latihan
├── style.css              # stylesheet bersama untuk semua halaman
├── latihan1.php           # Menjalankan PHP
├── latihan2.php           # Variabel, operator, percabangan
├── latihan3.php           # Perulangan dan array
├── latihan4.php           # Function
├── latihan5.php           # Form dengan metode GET
├── latihan6.php           # Form dengan metode POST
├── latihan7.php           # Pengolahan data sederhana
├── mini-project/
│   ├── index.php          # tampilan (HTML) mini project
│   └── proses.php         # pemrosesan dan validasi data
└── screenshots/           # bukti hasil setiap latihan
```

## 5. Langkah Kerja dan Ringkasan Hasil

### Latihan 1 — Menjalankan PHP (`latihan1.php`)
Menampilkan teks dan waktu server dengan `echo` dan `date()`. Kode PHP ditulis di antara `<?php ... ?>`. Browser hanya menerima HTML hasil eksekusi, sehingga pada *View Page Source* tidak ada kode PHP. Waktu yang tampil berubah setiap halaman dimuat ulang karena diambil dari server.

### Latihan 2 — Variabel, operator, dan percabangan (`latihan2.php`)
Menghitung nilai akhir dengan bobot **tugas 30%**, **UTS 30%**, dan **UAS 40%**, lalu menentukan predikat dengan `if / elseif / else`.

| Tugas | UTS | UAS | Nilai Akhir | Predikat |
|:-----:|:---:|:---:|:-----------:|:--------:|
| 85 | 78 | 90 | 84,90 | B |
| 100 | 100 | 100 | 100,00 | A |
| 80 | 70 | 75 | 75,00 | B |
| 60 | 55 | 65 | 60,50 | C |
| 40 | 50 | 30 | 39,00 | D |

Nilai tepat 75 masuk predikat B karena kondisi memakai operator `>=`.

### Latihan 3 — Perulangan dan array (`latihan3.php`)
Menyimpan enam nama mahasiswa dalam array dan menampilkannya sebagai daftar bernomor menggunakan `foreach`, lalu menghitung jumlahnya dengan `count()`.

### Latihan 4 — Function (`latihan4.php`)
Membuat tiga function: `hitungDiskon()` (Rp150.000 diskon 10% → **Rp135.000**), `hitungLuasPersegiPanjang()` (8 × 4 = **32**), dan `tentukanKelulusan()` (nilai ≥ 60 → Lulus). Angka diformat dengan `number_format()`.

### Latihan 5 — Form GET (`latihan5.php`)
Form pencarian dengan `method="GET"`. Data terbaca melalui `$_GET` dan tampak pada URL (contoh: `latihan5.php?kata=php`). Teks dibersihkan dengan `trim()` dan ditampilkan menggunakan `htmlspecialchars()`. GET **tidak boleh** dipakai untuk kata sandi atau data sensitif karena datanya terlihat di URL.

### Latihan 6 — Form POST (`latihan6.php`)
Form nama dan program studi dengan `method="POST"`. Pemrosesan hanya berjalan jika `$_SERVER["REQUEST_METHOD"] === "POST"`. Data divalidasi tidak kosong dan ditampilkan dengan `htmlspecialchars($x, ENT_QUOTES, "UTF-8")`.

> **Catatan pengujian:** atribut `required` membuat browser menolak form yang kolomnya benar-benar kosong sebelum PHP sempat memeriksa. Untuk menguji validasi PHP, isi kolom dengan **spasi saja** — `trim()` akan menjadikannya kosong.

### Latihan 7 — Pengolahan data sederhana (`latihan7.php`)
Form nama barang, harga, dan jumlah. PHP memvalidasi input (`is_numeric()`, `ctype_digit()`, harga ≥ 0, jumlah ≥ 1), menghitung `subtotal = harga × jumlah`, dan menampilkan ringkasan transaksi dengan format Rupiah.

| Barang | Harga | Jumlah | Hasil |
|--------|------:|:------:|-------|
| Pulpen | 2500 | 4 | Subtotal Rp10.000,00 |
| Buku | 10500.50 | 3 | Subtotal Rp31.501,50 |
| Buku | 5000 | 0 | Pesan kesalahan |
| Buku | 5000 | -2 | Pesan kesalahan |
| Buku | abc | 2 | Pesan kesalahan |

## 6. Mini Project — Formulir Data Mahasiswa

Aplikasi menerima **nama, NIM, program studi, semester, dan email** melalui metode **POST**, memvalidasinya di sisi server, lalu menampilkan ringkasan data.

**Pemisahan kode**
- `mini-project/proses.php` — logika: membaca `$_POST`, validasi, dan menyusun array `$data` atau `$error`.
- `mini-project/index.php` — tampilan: memuat `proses.php` dengan `require`, lalu menampilkan form, daftar error, atau ringkasan data.

**Aturan validasi**

| Kolom | Aturan |
|-------|--------|
| Nama, NIM, Program Studi | Wajib diisi (setelah `trim()`) |
| Email | Format valid menurut `filter_var($email, FILTER_VALIDATE_EMAIL)` |
| Semester | Bilangan bulat 1–14 (`ctype_digit()` dan pemeriksaan rentang) |

**Fitur lain**
- Seluruh pesan kesalahan ditampilkan sekaligus, bukan hanya yang pertama.
- Isian sebelumnya tetap muncul pada form saat ada kesalahan.
- Semua data ditampilkan melalui fungsi `e()` yang membungkus `htmlspecialchars()` agar aman dari injeksi HTML/script (XSS).

## 7. Kasus Uji Input

| No | Jenis | Input | Hasil |
|----|-------|-------|-------|
| 1 | ✅ Valid | Siti Aminah / 2023110001 / Teknik Informatika / semester 5 / siti@mail.com | "Data berhasil diterima." dan ringkasan tampil |
| 2 | ✅ Valid | Andi Pratama / 2022310045 / Sistem Informasi / semester 14 / andi@kampus.ac.id | Diterima (semester 14 = batas atas) |
| 3 | ✅ Valid (karakter khusus) | Nama `<b>Hack</b> "q"`, data lain valid | Diterima; nama tampil sebagai teks, tag tidak dieksekusi |
| 4 | ❌ Tidak valid | Semua kolom kosong | Lima pesan error (nama, NIM, prodi, email, semester) |
| 5 | ❌ Tidak valid | Email `budi@` dan semester 15 | "Format email tidak valid." dan "Semester harus berupa angka 1–14." |
| 6 | ❌ Tidak valid | Semester 3.5 | "Semester harus berupa angka 1–14." |

## 8. Screenshot Hasil

### Persiapan
| Keterangan | Screenshot |
|------------|------------|
| Apache berjalan | ![Apache berjalan](screenshots/apache-running.png) |
| Struktur folder proyek | ![Struktur folder](screenshots/struktur-folder.png) |

### Latihan
| Latihan | Keterangan | Screenshot |
|---------|------------|------------|
| 1 | Output halaman | ![Latihan 1](screenshots/latihan1.png) |
| 1 | View Page Source (tanpa kode PHP) | ![Latihan 1 source](screenshots/latihan1-source.png) |
| 2 | Nilai awal | ![Latihan 2 awal](screenshots/latihan2-awal.png) |
| 2 | Setelah nilai diubah | ![Latihan 2 ubah](screenshots/latihan2-ubah.png) |
| 3 | Daftar mahasiswa | ![Latihan 3](screenshots/latihan3.png) |
| 4 | Hasil function | ![Latihan 4](screenshots/latihan4.png) |
| 5 | Form sebelum dikirim | ![Latihan 5 awal](screenshots/latihan5-awal.png) |
| 5 | Setelah dikirim (URL berubah) | ![Latihan 5 hasil](screenshots/latihan5-hasil.png) |
| 6 | Data lengkap | ![Latihan 6 lengkap](screenshots/latihan6-lengkap.png) |
| 6 | Input kosong | ![Latihan 6 kosong](screenshots/latihan6-kosong.png) |
| 6 | Tag HTML ditampilkan aman | ![Latihan 6 aman](screenshots/latihan6-aman.png) |
| 7 | Data valid | ![Latihan 7 valid](screenshots/latihan7-valid.png) |
| 7 | Harga desimal | ![Latihan 7 desimal](screenshots/latihan7-desimal.png) |
| 7 | Data tidak valid | ![Latihan 7 error](screenshots/latihan7-error.png) |

### Mini Project
| Keterangan | Screenshot |
|------------|------------|
| Tampilan awal form | ![Mini awal](screenshots/mini-awal.png) |
| Tidak valid — semua kolom kosong | ![Mini error kosong](screenshots/mini-error-kosong.png) |
| Tidak valid — email dan semester salah | ![Mini error email](screenshots/mini-error-email.png) |
| Valid — ringkasan data | ![Mini valid](screenshots/mini-valid.png) |
| Tag HTML ditampilkan aman | ![Mini aman](screenshots/mini-aman.png) |

## 9. Kesimpulan

PHP adalah bahasa *server-side*: kodenya diproses di server dan browser hanya menerima hasil berupa HTML, sehingga file PHP harus dijalankan melalui web server lokal. Variabel, operator, percabangan, perulangan, array, dan function memungkinkan pengolahan data yang terstruktur. Data form dapat dikirim dengan GET (pencarian) atau POST (pengiriman data), dan harus divalidasi di sisi server karena validasi di sisi browser mudah dilewati. Penggunaan `htmlspecialchars()` saat menampilkan data pengguna mencegah tag HTML dan skrip dieksekusi.

## Referensi

1. PHP Manual. *Getting Started.* https://www.php.net/manual/en/getting-started.php
2. PHP Manual. *Variables, Functions, and Handling External Variables.* https://www.php.net/manual/en/
3. Rencana Pembelajaran Semester (RPS) Mata Kuliah Pemrograman Web — Pemrograman server-side dengan PHP.
