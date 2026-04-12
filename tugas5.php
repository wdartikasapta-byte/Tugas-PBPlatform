<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// proses input
if(isset($_POST['submit'])){
    $nama = htmlspecialchars($_POST['nama']);
    $umur = (int) $_POST['umur'];

    mysqli_query($conn, "INSERT INTO mahasiswa (nama, umur) VALUES ('$nama','$umur')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas 5 - PHP + MySQL</title>

    <style>
        body {
            font-family: Arial;
            background-color: #1b5b9b;
            padding: 20px;
        }

        .container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2, h3 {
            text-align: center;
        }

        input {
            padding: 8px;
            margin: 5px 0;
            width: 100%;
        }

        button {
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            width: 100%;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th {
            background: #007BFF;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>

<div class="container">

<h2>Form Input Mahasiswa</h2>

<form method="POST">
    Nama:
    <input type="text" name="nama" required>

    Umur:
    <input type="number" name="umur" required>

    <button type="submit" name="submit">Simpan</button>
</form>

<hr>

<h3>Data Mahasiswa</h3>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Umur</th>
</tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
$no = 1;

if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>".$no++."</td>
                <td>".$row['nama']."</td>
                <td>".$row['umur']."</td>
              </tr>";
    }
}else{
    echo "<tr><td colspan='3'>Tidak ada data yang tersedia</td></tr>";
}
?>

</table>

</div>

</body>
</html>