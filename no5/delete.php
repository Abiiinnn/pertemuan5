<?php
include  ("koneksi.php");
$id = $_GET['id_transaksi'];
$sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id'");

header("Location:index.php?pesan=hapus");

?>
