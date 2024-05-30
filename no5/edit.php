<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>	
	<a href="index.php">Kembali</a>
	<h3>Edit data</h3>
	<?php 
        include  ("koneksi.php");
        $id = $_GET['id_transaksi'];
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
        while($data = mysqli_fetch_array($query)){
	?>
	<form action="update.php" method="post">	
        <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">
        <label for="id_barang">Pilih Barang:</label>
        <select name="id_barang" id="id_barang" required>
            <?php
                $sql_barang = mysqli_query($koneksi, "SELECT id_barang, nama_barang FROM barang");
                if(mysqli_num_rows($sql_barang) > 0) {
                    while($row_barang = mysqli_fetch_array($sql_barang)) {
                        $selected = $row_barang['id_barang'] == $data['id_barang'] ? 'selected' : '';
                        echo "<option value='" . $row_barang["id_barang"] . "' $selected>" . $row_barang["nama_barang"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada barang</option>";
                }
            ?>
        </select><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo $data['tanggal']; ?>" required><br><br>
        <label for="total">Total:</label>
        <input type="number" name="total" value="<?php echo $data['total']; ?>" required><br><br>
        <input type="submit" value="Submit">
	</form>
	<?php } ?>
</body>
</html>