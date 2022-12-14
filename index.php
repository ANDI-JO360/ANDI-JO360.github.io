<?php  ?>

 <!-- <?php //include("includes/login.php"); ?>  -->

<?php
include("includes/con_db.php"); // Panggil Koneksi Database
include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
  <!-- Program Yang menampung Pesan Yang Akan Keluar Pada Saat User Menjalankan Inputan -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert"> 
        <?= $_SESSION['message']?>
        <!-- Bagian Untuk Meng-Close Pesan Yang Ditampilkan -->
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- bagian tambah tugas ke form -->
      <div class="card card-body">
        <form action="simpan_tug.php" method="POST">
          <div class="form-group">
            <input type="text" name="judul" class="form-control" placeholder="Judul Tugas" autofocus>
          </div>
          <div class="form-group">
            <textarea name="deskripsi" rows="2" class="form-control" placeholder="Dekripsi Tugas"></textarea>
          </div>
          <input type="submit" name="simpan" class="btn btn-success btn-block" value="Simpan Tugas">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Keterangan Deskripsi</th>
            <th>Waktu Menambahkan Tugas</th>
            <th>Menu</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $hasil_tug = mysqli_query($koneksi, $query); // Query Pada Tabel Task
          // Menampilkan Data Hasil
          while($row = mysqli_fetch_assoc($hasil_tug)) { ?> 
          <tr>
            <!-- Judul Dari Inputan User -->
            <td><?php echo $row['title']; ?></td>
            <!-- Deskripsi Yang Di Inputkan Oleh User Ke Databse Ditampilkan -->
            <td><?php echo $row['description']; ?></td>
            <!-- Waktu Yang DItampilkan Pada Saat User Menambahkan Tugas -->
            <td><?php echo $row['created_at']; ?></td>   
            <td>
              <!-- Bagian Laman Edit Pada Saat User Menekan Tombol Edit -->
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <!-- bagian Laman Pada Saat User Ingiin Menghapus Data -->
              <a href="hapus.php?id=<?php echo $row['id']?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Tugas ?')">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
