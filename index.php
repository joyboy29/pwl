<!DOCTYPE html>
<html>

<head>
  <title>Peenerimaan Siswa Baru | Pada SMU X</title>
</head>

<body>
  <header>
    <h3>Penerimaan Siswa Baru</h3>
    <h1>Pada SMU X</h1>
  </header>

  <h4>Menu</h4>
  <nav>
    <ul>
      <li><a href="form-daftar.php">Daftar Baru</a></li>
      <li><a href="list-siswa.php">Pendaftar</a></li>
    </ul>
  </nav>

  <?php if (isset($_GET['status'])) : ?>
    <p>
      <?php
      if ($_GET['status'] == 'sukses') {
        echo "Pendaftaran siswa baru berhasil!";
      } else {
        echo "Pendaftaran gagal!";
      }
      ?>
    </p>
  <?php endif; ?>

</body>

</html>