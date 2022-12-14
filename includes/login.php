<?php  include("con_db.php") ?>

<?php
  if (isset($_POST['submit'])) {
    $ko = "Select * from admin where username='{$_POST['username']}' and pass='{$_POST['password']}'";
  if (mysqli_num_rows(mysqli_query($koneksi, $ko))==1) {
    header('Location:index.php');
  } else{
    echo "
    <div class='alert alert-danger' role='alert'>
    Username dan password salah
  </div>
    ";
  }
  }

?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style5.css">

</head>

<body>
  <div class="login">
    <h1>Login</h1>

    <div style="text-align: center; color: #ff0000;">
      <span>
      </span>
    </div>

    <form method="post">
      <label for="username">
        <i class="fas fa-user"></i>
      </label>
      <input type="text" name="username" placeholder="Username" id="username" required>
      <label for="password">
        <i class="fas fa-lock"></i>
      </label>
      <input type="password" name="password" placeholder="Password" id="password" required>
      <input type="submit" name="submit" value="Login">
    </form>
  </div>

</body>

</html>