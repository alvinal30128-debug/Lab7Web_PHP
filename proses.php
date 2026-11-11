<?php
// proses.php — bagian pemrosesan data (tanpa tampilan HTML)
$data = null;
$error = [];
$lama = ["nama" => "", "nim" => "", "prodi" => "", "semester" => "", "email" => ""];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 $nama = trim($_POST["nama"] ?? "");
 $nim = trim($_POST["nim"] ?? "");
 $prodi = trim($_POST["prodi"] ?? "");
 $semesterInput = trim($_POST["semester"] ?? "");
 $email = trim($_POST["email"] ?? "");

 // simpan isian agar form tidak kosong kembali saat ada kesalahan
 $lama = ["nama" => $nama, "nim" => $nim, "prodi" => $prodi,
          "semester" => $semesterInput, "email" => $email];

 if ($nama === "") $error[] = "Nama wajib diisi.";
 if ($nim === "") $error[] = "NIM wajib diisi.";
 if ($prodi === "") $error[] = "Program studi wajib diisi.";

 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error[] = "Format email tidak valid.";
 }

 if (!ctype_digit((string)$semesterInput) ||
     (int)$semesterInput < 1 || (int)$semesterInput > 14) {
  $error[] = "Semester harus berupa angka 1–14.";
 }

 if (!$error) {
  $data = compact("nama", "nim", "prodi", "email");
  $data["semester"] = (int)$semesterInput;
 }
}
