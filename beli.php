<?php 
include "header.php";
include "koneksi.php";
?>

<?php 
$slug = $_GET['slug'];
$query = "SELECT * FROM barang WHERE slug = " .'"'. $slug.'"'.'AND stok > 0';
echo $query;
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_row($result);
var_dump($data);



?>


<?php 
include "footer.php";
?>