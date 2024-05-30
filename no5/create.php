<?php
include ("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    // Validasi input
    if ($total > 0) {
        // Ambil nilai id_transaksi tertinggi
        $result = mysqli_query($koneksi, "SELECT MAX(id_transaksi) AS max_id FROM transaksi");
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];
        $new_id = $max_id + 1;

        $query = "INSERT INTO transaksi (id_transaksi, id_barang, tanggal, total) VALUES ('$new_id', '$id_barang', '$tanggal', '$total')";
        if (mysqli_query($koneksi, $query)) {
            header("Location: index.php?pesan=input");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        header("Location: index.php?pesan=error_total_zero");
    }
}
?>
