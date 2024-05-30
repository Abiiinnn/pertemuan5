<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_GET['pesan'])){
            $pesan = $_GET['pesan'];
            if($pesan == "input"){
                echo "Data berhasil di input.";
            }else if($pesan == "update"){
                echo "Data berhasil di update.";
            }else if($pesan == "hapus"){
                echo "Data berhasil di hapus.";
            }
        }
    ?>
    <table>
        <tr>
            <th>id_transaksi</th>
            <th>id_barang</th>
            <th>tanggal</th>
            <th>total</th>
            <th>Aksi</th>
        </tr>
    <?php
        include ("koneksi.php");
        $query_data = mysqli_query($koneksi, "SELECT * FROM transaksi");
        while($baris = mysqli_fetch_array($query_data)){ ?>
            <tr>
                <td><?php echo $baris['id_transaksi']; ?></td>
                <td><?php echo $baris['id_barang']; ?></td>
                <td><?php echo $baris['tanggal']; ?></td>
                <td><?php echo $baris['total']; ?></td>
                <td>
                    <a href="edit.php?id_transaksi=<?php echo $baris['id_transaksi']; ?>">Edit</a>
                    <a href="delete.php?id_transaksi=<?php echo $baris['id_transaksi']; ?>">Hapus</a>
                </td>
            </tr>
    <?php
        }
    ?>
    </table>
    <br>
    <form action="create.php" method="post">
        <label for="id_barang">Pilih Barang:</label>
        <select name="id_barang" id="id_barang" required>
            <?php
                $sql_barang = mysqli_query($koneksi, "SELECT id_barang, nama_barang FROM barang");
                if(mysqli_num_rows($sql_barang) > 0) {
                    while($row_barang = mysqli_fetch_array($sql_barang)) {
                        echo "<option value='" . $row_barang["id_barang"] . "'>" . $row_barang["nama_barang"] . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada barang</option>";
                }
            ?>
        </select><br><br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal" required><br><br>
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
