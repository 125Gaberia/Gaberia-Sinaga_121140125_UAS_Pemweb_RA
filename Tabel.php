<!-- Tabel.php -->
<link rel="stylesheet" href="Tabel.css">
<h1 class="sub_judul">DATA</h1>
<button class=""><a class="tambah" href="?page=Formulir" style="color: #000; text-decoration: none;"><p>DAFTAR ISI DATA</p></a></button>

<?php
include('koneksi.php'); // Pastikan file koneksi.php sudah disertakan

$formulir = mysqli_query($dbconn, "SELECT * FROM formulir ORDER BY id ASC");

if (!$formulir) {
    die("Error in query: " . mysqli_error($dbconn));
}
?>

<div class="form akre">
    <table class="daftar_akre" style="overflow-x:scroll" id="tabel">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Golongan Darah</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($formulir)) {
        ?>
            <tr>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['program_studi']; ?></td>
                <td><?php echo $data['jenis_kelamin']; ?></td>
                <td><?php echo $data['tgl_lahir']; ?></td>
                <td><?php echo $data['golongan_darah']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>