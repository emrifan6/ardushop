 <?php 
 include "header.php";
 include "koneksi.php";
 include "menu.php";
 include "carosel.php";
 
 $query = "SELECT * FROM barang";
 $result = mysqli_query($koneksi, $query);

 $data = $result -> fetch_all(MYSQLI_ASSOC);
// var_dump($data[0]['gambar']);

 ?>

<br />
<h5 class="ml-2">ITEM TERBARU</h5>
<div class="kartu-produk">
  <div class="row">
  <?php foreach($data as $br) : ?> 
    <div class="col-6">
          <div class="card mx-1" style="width: 18rem">
            <img
              src="image/<?= $br['gambar'];?>" 
              class="card-img-top"
              alt=""
              style="max-height: 100px; max-width: 150px"
            />
            <div class="card-body">
              <h5 class="card-title"><?= $br['judul']; ?></h5>
              <h6 class="card-text">Stok <?= $br['stok']; ?></h6>
              <p class="card-text">Rp. <?= $br['harga']; ?></p> 
              <a method="post" href='beli.php?slug=<?= $br['slug']; ?>'  class="btn btn-primary">Beli</a> 
            </div>
          </div>
        </div>
    <?php endforeach ?>
  </div>
</div>



<?php 
include "footer.php";
?>