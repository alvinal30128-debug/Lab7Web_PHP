# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

| | |
|---|---|
| **Mata Kuliah** | Pemrograman Web |
| **Program Studi** | Teknik Informatika |
| **Nama / NIM** | Alvin Al Aziz / 312510044 |
| **Kelas** | I252A |
| **Topik** | Sintaks PHP, variabel, function, form processing (GET dan POST), validasi, dan pengolahan data |

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
| Laptop/PC | Sistem operasi Windows 11 |
| Web server lokal | XAMPP / Laragon (Apache + PHP) — Xampp Apache |
| Editor kode | Visual Studio Code |
| Browser | Google Chrome |

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

### Halaman yang tersedia

| Halaman | Alamat |
|---------|--------|
| Menu utama | `http://localhost/Lab7Web_PHP/`  |
| Mini Project | `http://localhost/Lab7Web_PHP/mini-project/` |

## 4. Struktur File

```
Lab7Web_PHP/
├── README.md
├── index_latihan.php      # project latihan php
├── style.css              # stylesheet bersama untuk semua halaman
├── mini-project/
    ├── index.php          # tampilan (HTML) mini project
    └── proses.php         # pemrosesan dan validasi data
```

## 5. Langkah Kerja dan Ringkasan Hasil

### Latihan 1 — Menjalankan PHP
Menampilkan teks dan waktu server dengan `echo` dan `date()`. Kode PHP ditulis di antara `<?php ... ?>`. Browser hanya menerima HTML hasil eksekusi, sehingga pada *View Page Source* tidak ada kode PHP. Waktu yang tampil berubah setiap halaman dimuat ulang karena diambil dari server.

### Latihan 2 — Variabel, operator, dan percabangan
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
| Apache berjalan | ![Apache berjalan] (<img width="940" height="598" alt="image" src="https://github.com/user-attachments/assets/1ff9fa29-22b2-4dd2-a91d-debd2f0ccfdc" /> 
) |
| Struktur folder proyek | ![Struktur folder](<img width="940" height="257" alt="image" src="https://github.com/user-attachments/assets/ad3ec744-6624-489b-9288-a830b83436ff" />
) |

### Latihan
| Latihan | Keterangan | Screenshot |
|---------|------------|------------|
| 1 | Output halaman | ![Latihan 1](<img width="940" height="288" alt="image" src="https://github.com/user-attachments/assets/010aa2d9-511c-472b-9a9c-af0c89d87786" />
) |
| 2 | Nilai awal | ![Latihan 2 awal](<img width="940" height="253" alt="image" src="https://github.com/user-attachments/assets/8f006b21-ac0c-4694-97aa-bbefd2bdb175" />
) |
| 2 | Setelah nilai diubah | ![Latihan 2 ubah](<img width="940" height="263" alt="image" src="https://github.com/user-attachments/assets/8f3dca5e-4e13-4011-9848-e622e7d2ea5e" />
) |
| 3 | Daftar mahasiswa | ![Latihan 3](<img width="940" height="290" alt="image" src="https://github.com/user-attachments/assets/78b309ca-a195-4e72-afa3-031a714d1d40" />
) |
| 4 | Hasil function | ![Latihan 4](<img width="940" height="325" alt="image" src="https://github.com/user-attachments/assets/459ad47b-9a3c-4c28-a55e-ea7c9fb9cfb0" />
) |
| 5 | Form sebelum dikirim | ![Latihan 5 awal](<img width="589" height="479" alt="image" src="https://github.com/user-attachments/assets/54c33883-30a8-482c-8089-bcb5614823f3" />
) |
| 5 | Setelah dikirim (URL berubah) | ![Latihan 5 hasil](<img width="940" height="406" alt="image" src="https://github.com/user-attachments/assets/65b122df-0e1a-438e-9c37-77962c1dc36a" />
) |
| 6 | Data lengkap | ![Latihan 6 lengkap](<img width="940" height="472" alt="image" src="https://github.com/user-attachments/assets/e6223780-d01f-416e-a24a-6a2288a38665" />
) |
| 6 | Input kosong | ![Latihan 6 kosong](<img width="940" height="136" alt="image" src="https://github.com/user-attachments/assets/1b531e6d-5b60-4a4c-be5d-eb7ed2cc3d9b" />
) |
| 7 | Data valid | ![Latihan 7 valid](<img width="940" height="214" alt="image" src="https://github.com/user-attachments/assets/4dc15044-69e6-4704-a6bb-4f781b31d81c" />
) |
| 7 | Data tidak valid | ![Latihan 7 error](<img width="940" height="116" alt="image" src="https://github.com/user-attachments/assets/7e0bec3c-df05-4c42-95b6-f59cf966a2e7" />
) |

### Mini Project
| Keterangan | Screenshot |
|------------|------------|
| Tampilan awal form | ![Mini awal](<img width="940" height="411" alt="image" src="https://github.com/user-attachments/assets/de17508e-c4f7-4ed5-831c-8f0a2d75faee" />
) |
| Tidak valid — semua kolom kosong | ![Mini error kosong](<img width="940" height="324" alt="image" src="https://github.com/user-attachments/assets/88178678-1257-4d25-91a5-18d7cec2e75d" />
) |
| Tidak valid — email dan semester salah | ![Mini error email](<img width="940" height="513" alt="image" src="https://github.com/user-attachments/assets/e07d2ea3-71f6-4d6a-877f-3c6a9d057142" />
) |
| Valid — ringkasan data | ![Mini valid](<img width="940" height="384" alt="image" src="https://github.com/user-attachments/assets/38186b90-e5aa-4eb9-aaa1-aaf69cc2759f" />
) |

## 9. Kesimpulan

PHP adalah bahasa *server-side*: kodenya diproses di server dan browser hanya menerima hasil berupa HTML, sehingga file PHP harus dijalankan melalui web server lokal. Variabel, operator, percabangan, perulangan, array, dan function memungkinkan pengolahan data yang terstruktur. Data form dapat dikirim dengan GET (pencarian) atau POST (pengiriman data), dan harus divalidasi di sisi server karena validasi di sisi browser mudah dilewati. Penggunaan `htmlspecialchars()` saat menampilkan data pengguna mencegah tag HTML dan skrip dieksekusi.

## Referensi

1. PHP Manual. *Getting Started.* https://www.php.net/manual/en/getting-started.php
2. PHP Manual. *Variables, Functions, and Handling External Variables.* https://www.php.net/manual/en/
3. Rencana Pembelajaran Semester (RPS) Mata Kuliah Pemrograman Web — Pemrograman server-side dengan PHP.
