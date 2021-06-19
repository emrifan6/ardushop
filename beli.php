<?php 
include "header.php";
include "koneksi.php";
if (empty($_SESSION['username'])) {
    header('location:login.php');
}
?>

<?php 
$slug = $_GET['slug'];
$query = "SELECT * FROM barang WHERE slug = " .'"'. $slug.'"'.'AND stok > 0';
// echo $query;
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
// var_dump($data['judul']);

$username = $_SESSION['username'];
// var_dump($username);
$queryuser = "SELECT * FROM user WHERE username = " . "'".$username."'";
$resultuser = mysqli_query($koneksi, $queryuser);
$user = mysqli_fetch_assoc($resultuser);
// var_dump($user);
?>

<div class="container mt-5">
    <h3 class="mt-2 mb-2">RINGKASAN PEMBELIAN</h3>
    <form action="" method="POST">
            <?php 
                 if (isset($_POST['bayar'])) {
                echo "bayar";
                $querybayar = "UPDATE barang SET stok = stok - 1 WHERE slug =  " ."'".$slug."'";
                $resultbayar = mysqli_query($koneksi, $querybayar);
                $bayar = mysqli_fetch_assoc($resultbayar);
                $_SESSION['pesan'] = "Pembelian 1 unit " . strtoupper($data['judul']) . " telah berhasil";
                header('location:index.php');
                }
            ?>
        <div class="mb-3 row">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nama_barang" value="<?= $data['judul']; ?>"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="qty_barang" class="col-sm-2 col-form-label">Qty</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="qty_barang" value="1"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga_barang" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="harga_barang" value="<?= 'Rp. ' . number_format($data['harga'], 0, ',', '.');; ?>"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="nama_pembeli" value="<?=  strtoupper($user['username']); ?>"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="alamat" value="<?= $user['alamat']; ?>"> 
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no_hp" class="col-sm-2 col-form-label">No Telfon</label>
            <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="no_hp" value="<?= $user['no_hp']; ?>"> 
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="bayar" value="bayar" class="btn btn-info btn-block">
            Bayar
            </button>
        </div>
    </form>
</div>



<?php 
include "footer.php";
?>