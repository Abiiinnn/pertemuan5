<?php 
include  ("koneksi.php");

$id_transaksi = $_POST['id_transaksi'];
$id_barang = $_POST['id_barang'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];
 
mysqli_query($koneksi, "UPDATE transaksi SET id_barang='$id_barang', tanggal='$tanggal', total='$total' WHERE id_transaksi='$id_transaksi'");
 
header("location:index.php?pesan=update");
?>