<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Penerimaan Siswa Baru | SMK Coding</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <h3>Siswa yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Sekolah Asal</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM calon_siswa";
        $query = mysqli_query($db, $sql);

        while($siswa = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$siswa['id']."</td>";
            echo "<td>".$siswa['nama']."</td>";
            echo "<td>".$siswa['alamat']."</td>";
            echo "<td>".$siswa['jenis_kelamin']."</td>";
            echo "<td>".$siswa['agama']."</td>";
            echo "<td>".$siswa['sekolah_asal']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
            echo "<a href='#' class='hapus-link' data-id='".$siswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    <script>
        $(document).ready(function() {
            // Menggunakan jQuery untuk menangani klik tautan hapus
            $('.hapus-link').click(function(event) {
                event.preventDefault(); // Menghentikan aksi tautan default

                var link = $(this);
                var siswaId = link.data('id');

                $.ajax({
                    url: 'hapus.php', // Ubah dengan URL yang sesuai untuk penghapusan siswa
                    method: 'GET',
                    data: { id: siswaId }, // Mengirim ID siswa ke server
                    success: function(response) {
                        // Tangani respons yang diterima dari server di sini
                        console.log(response);
                        // Misalnya, jika respons adalah sukses, hapus baris siswa dari tabel
                        link.closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        // Tangani kesalahan jika ada
                        console.log(error);
                        alert('Terjadi kesalahan saat menghapus siswa.');
                    }
                });
            });
        });
    </script>

</body>
</html>
