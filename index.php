<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashbaord</title>
</head>
<body style="background-color: #202020; font-family: cursive;">
<h1 align="center" style="color: #fff; font-family: cursive; padding-top: 2rem;">Daftar Buku</h1>
<a href="masukbuku.php" type="button" class="btn btn-success ms-4 md-3">Tambah Data Buku</a>

<form action="index.php" method="post">
<table>
    <tr>
        <td><input class="ms-4 mt-3 form-control" type="text" name="cari" size="40" placeholder="Masukkan kata kunci judul buku..."></td>
        <td><button type="submit" class="mt-3 ms-4 btn btn-success" >Cari Data</button></td>
    </tr>
</table>
</form>
<?php 
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
	echo '<br><b class="ms-3" style="color: #fff;">Hasil pencarian : '.$cari.'</b><br>';
}
?>
<br>
<div class="card" style="margin-right: 2rem; margin-left: 2rem;">
<div class="card-header">
    DATA
  </div>
  <div class="card-body">
    <table class="table table-light table-hover">
    <thead></thead>
    <tr>
        <td class="fw-bold">ID Buku</td>
        <td class="fw-bold">Judul</td>
        <td class="fw-bold">Penulis</td>
        <td class="fw-bold">Jenis Buku</td>
        <td class="fw-bold">Gambar</td>
        <td class="fw-bold">Pengaturan</td>
    </tr>
    </thead>

    <?php 
    if(isset($_POST['cari'])){
		$cari = $_POST['cari'];
		$data = mysqli_query($koneksi, "select * from tbl_buku where judul_buku like '%".$cari."%'");				
	}else{
		$data = mysqli_query($koneksi, "select * from tbl_buku order by id_buku desc");		
	}
    while($row = mysqli_fetch_assoc($data)):?>
    <tbody>
    <tr>
        <td class="fw-bold"><?php echo $row['id_buku'];?></td>
        <td><?php echo $row['judul_buku'];?></td>
        <td><?php echo $row['penulis'];?></td>
        <td><?php echo $row['jenis_buku'];?></td>
        <td><img src="img/<?php echo $row['gambar_buku'];?>" alt="" width="50"></td>
        <td><a type="button" class="btn btn-success" href="ubahbuku.php?id_buku=<?php echo $row['id_buku']; ?>">Ubah</a>
        <a type="button" class="btn btn-danger" href="hapusbuku.php?id_buku=<?php echo $row['id_buku']; ?>">Hapus</a>
        </td>
    </tr>
    </tbody>
    <?php endwhile;?>
    </table>
    </div>
    </div>

     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>