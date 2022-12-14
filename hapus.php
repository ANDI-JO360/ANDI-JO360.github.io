<?php

include("includes/con_db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM task WHERE id = $id"; // isi Dari Query Yang Di Perintahkan
  $hasil = mysqli_query($koneksi, $query); // Perintah Query Untuk Menghapus Data Yang Telah Dimasukkan Oleh User
  if(!$hasil) {
    die("Kuery Gagal !!."); // Pesan Yang Akan Muncul Jika Query Gagal Untuk Di Jalankan
  }

  $_SESSION['message'] = 'Tugas Behasil Dihapus'; // Pesan Jika Query Berhasil Dijalankan
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
