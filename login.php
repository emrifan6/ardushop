<?php 
include "koneksi.php";
include "header.php";
?>

<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<h3 class="card-title text-center">Log in Ardushop</h3>
		<div class="card-text">
			<!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
			<form action="" method="POST">
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control form-control-sm" id="username" name="username" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
					<input type="password" class="form-control form-control-sm" id="password" name="password" >
				</div>
				<button type="submit" name="login" value="Login" class="btn btn-primary btn-block">Sign in</button>
				
				<!-- <div class="sign-up">
					Don't have an account? <a href="#">Create One</a>
				</div> -->
			</form>
		</div>
	</div>
</div>
</div>

<?php 
$username = mysqli_real_escape_string($koneksi, @$_POST['username']);
$password = mysqli_real_escape_string($koneksi, @$_POST['password']);
// echo md5('user');
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $query);
$row = mysqli_fetch_array($hasil);
// echo $row;
if (isset($_POST['login'])) {
  if ($row['username'] == $username and $row['password'] == $password ) {
    echo "benar";
    $_SESSION['username'] = $username;
    header('location:index.php?hlm=Data');
  } elseif ($row['status'] == "Tidak Aktif") {
    echo " <div class='alert alert-danger' role='alert'> Username di nonaktifkan ! </div>";
  } else {
    echo " <div class='alert alert-danger' role='alert'> Nama atau Password yang anda masukkan salah ! </div>";
  }
}
?>


<?php 
include "footer.php";
?>
