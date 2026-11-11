<?php
require __DIR__ . "/proses.php";

// fungsi pembantu agar penulisan htmlspecialchars lebih singkat
function e($teks) {
 return htmlspecialchars((string)$teks, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Formulir Data Mahasiswa</title>
 <link rel="stylesheet" href="../style.css">
</head>
<body>
 <h1>Formulir Data Mahasiswa</h1>

 <?php if ($error): ?>
  <div class="error">
   <strong>Data belum dapat diproses:</strong>
   <ul>
    <?php foreach ($error as $pesan): ?>
     <li><?= e($pesan) ?></li>
    <?php endforeach; ?>
   </ul>
  </div>
 <?php endif; ?>

 <?php if ($data): ?>
  <div class="sukses">Data berhasil diterima.</div>
  <h2>Ringkasan Data Mahasiswa</h2>
  <table class="ringkasan">
   <tr><th>Nama</th><td><?= e($data["nama"]) ?></td></tr>
   <tr><th>NIM</th><td><?= e($data["nim"]) ?></td></tr>
   <tr><th>Program Studi</th><td><?= e($data["prodi"]) ?></td></tr>
   <tr><th>Semester</th><td><?= e($data["semester"]) ?></td></tr>
   <tr><th>Email</th><td><?= e($data["email"]) ?></td></tr>
  </table>
  <p><a href="index.php">Isi formulir baru</a></p>
 <?php else: ?>
  <form method="POST" action="">
   <label for="nama">Nama</label>
   <input id="nama" name="nama" type="text" value="<?= e($lama["nama"]) ?>">

   <label for="nim">NIM</label>
   <input id="nim" name="nim" type="text" value="<?= e($lama["nim"]) ?>">

   <label for="prodi">Program Studi</label>
   <input id="prodi" name="prodi" type="text" value="<?= e($lama["prodi"]) ?>">

   <label for="semester">Semester</label>
   <input id="semester" name="semester" type="text" inputmode="numeric" value="<?= e($lama["semester"]) ?>">

   <label for="email">Email</label>
   <input id="email" name="email" type="text" value="<?= e($lama["email"]) ?>">

   <button type="submit">Kirim</button>
  </form>
 <?php endif; ?>
</body>
</html>
