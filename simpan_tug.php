<?php

include('includes/con_db.php');

if (isset($_POST['simpan'])) {
  $jud = $_POST['judul'];
  $des = $_POST['deskripsi'];
  $query = "INSERT INTO task(title, description) VALUES ('$jud', '$des')";
  $hasil = mysqli_query($koneksi, $query);
  if(!$hasil) {
    die("Kuery Anda Gagal !!.");
  }

  $_SESSION['message'] = 'Tugas Berhasil Disimpan';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
