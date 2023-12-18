<?php
include('koneksi.php'); // Sesuaikan dengan nama file koneksi Anda

$id = $_GET['id'];
$data_tabel = mysqli_query($dbconn, "SELECT * FROM formulir WHERE id = '$id'");
$data = mysqli_fetch_array($data_tabel);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim_input = $_POST['nim']; // Ganti nama variabel agar tidak konflik dengan $nim
    $program_studi = $_POST['program_studi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_lahir = $_POST['tanggal_lahir']; // Sesuaikan dengan name pada input date
    $goldar = $_POST['goldar'];

    if ($nama == "" || $nim_input == "" || $program_studi == "" || $jenis_kelamin == "" || $tgl_lahir == "" || $goldar == "") {
        echo "<script>alert('Data Harus Lengkap');</script>";
    } else {
        // Query untuk mendapatkan id berdasarkan nim
        $query = "SELECT id FROM formulir_fatabase WHERE id = '$id'";
        $result = mysqli_query($dbconn, $query);

        if (!$result) {
            die("Error in query: " . mysqli_error($dbconn));
        }

        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];

        mysqli_query($dbconn, "INSERT INTO formulir (nama, nim, program_studi, jenis_kelamin, tgl_lahir, goldar) VALUES ('$nama', '$nim_input', '$program_studi', '$jenis_kelamin', '$tgl_lahir', '$goldar')");
        echo "<script>alert('Data Berhasil Ditambahkan'); document.location = '?page=Tabel';</script>";
    }
}
?>
<!-- Isi dari file formulir ini merupakan fitur tambah data yang mana field atau kolom yang diinputkan user sudah terhubung dengan kolom yang ada di database -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data</title>
    <link rel="stylesheet" href="Formulir.css">
    <link rel="stylesheet" href="style2.css">
  </head>
<body>
<div class="form">
    <h1>Formulir Data</h1>
    <form method="post" enctype="multipart/form-data">
        <table class="pendaftaran">
            <tr>
                <td class="label">
                    <label for="nama">Nama</label>
                </td>
                <td class="in">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama" class="input" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nim">NIM</label>
                </td>
                <td>
                    <input type="text" name="nim" id="nim" placeholder="Masukkan NIM" class="input" value="<?php echo isset($_POST['nim']) ? $_POST['nim'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="program_studi">Program Studi</label>
                </td>
                <td>
                    <input type="text" name="program_studi" id="program_studi" placeholder="Masukkan Program Studi" class="input" value="<?php echo isset($_POST['program_studi']) ? $_POST['program_studi'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                </td>
                <td>
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-laki' ? "checked" : ''; ?>> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan' ? "checked" : ''; ?>> Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tgl_lahir">Tanggal Lahir</label>
                </td>
                <td>
                    <input type="date" name="tanggal_lahir" id="tgl_lahir" class="input" value="<?php echo isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="goldar">Golongan Darah</label>
                </td>
                <td>
                    <select name="goldar" id="goldar" class="input select">
                        <option value="" selected>Pilih</option>
                        <option value="A" <?php echo isset($_POST['goldar']) && $_POST['goldar'] == 'A' ? "selected" : ''; ?>>A</option>
                        <option value="B" <?php echo isset($_POST['goldar']) && $_POST['goldar'] == 'B' ? "selected" : ''; ?>>B</option>
                        <option value="O" <?php echo isset($_POST['goldar']) && $_POST['goldar'] == 'O' ? "selected" : ''; ?>>O</option>
                        <option value="AB" <?php echo isset($_POST['goldar']) && $_POST['goldar'] == 'AB' ? "selected" : ''; ?>>AB</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <div class="submit">
                        <input class="btn" type="submit" value="kirim" name="submit">
                    </div>
                </th>
            </tr>
        </table>
    </form>
</div>
