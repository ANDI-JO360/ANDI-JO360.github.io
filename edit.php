<?php
include("includes/con_db.php"); //panggil Koneksi Database
$title = '';
$des= '';

// Progaram Untuk Mencari Data User dengan katakunci id
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $hasil = mysqli_query($koneksi, $query);
  if (mysqli_num_rows($hasil) == 1) {
    $row = mysqli_fetch_array($hasil);
    $title = $row['title'];
    $des = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['title'];
  $des = $_POST['description'];

  $query = "UPDATE task set title = '$title', description = '$des' WHERE id=$id"; //Perintah Query Untuk Megubah Data Yang Di Inputkan Oleh User  dengan Kata Kunci id
  mysqli_query($koneksi, $query);
  $_SESSION['message'] = 'Tugas Berhasil Diupdate'; //Perintah Yang Dijalankan Pada Saat Program Query Berhasil Di jalankan
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<!-- Bagian Tampilan Form -->
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="description" class="form-control" cols="30" rows="10"><?php echo $des;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
