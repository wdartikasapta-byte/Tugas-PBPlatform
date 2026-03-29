<?php
$host = 'localhost';
$db   = 'pbp2026';
$user = 'root';
$pass = '';

// ==========================
// KONFIGURASI DATABASE
// ==========================
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi DB gagal: " . $e->getMessage());
}
// ==========================
// INPUT DATA UPDATE (CLI)
// ==========================
$id = readline("Masukkan ID user: ");
$username = readline("Masukkan username baru: ");
$email = readline("Masukkan email baru: ");

// validasi
if ($id == "" || $username == "" || $email == "") {
    die("Input tidak boleh kosong!\n");
}

// ==========================
// QUERY UPDATE
// ==========================
$sqlUser = "UPDATE user SET username = ?, email = ?, updated_at = ? WHERE id = ?";
$upd = $pdo->prepare($sqlUser);

try {
    $upd->execute([$username, $email, time(), $id]);

    if ($upd->rowCount() > 0) {
        echo "Data user berhasil diupdate\n";
    } else {
        echo "ID tidak ditemukan atau data sama\n";
    }

} catch (PDOException $e) {
    echo "Update gagal: " . $e->getMessage() . "\n";
}
?>