<?php
if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  $message = "";

  if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
    session_start();
    $_SESSION['PROFILE'] = $_POST['username'];
    header('location:./src/acceuil.php');
  } else {
    $message = 'Pseudo ou mot de passe incorrect !';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
  <link rel="stylesheet" href="css/solid.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="container">

  <h1 class="mt-4"><span class="app_name"><span class="app_t">G</span>estion  <span class="app_a">E</span>mployer</h1>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content border-success">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>
        <div class="col-12 form-input">
          <?php if (!empty($message)): ?>
            <div class="alert alert-danger">
              <?=$message?>
            </div>
          <?php endif;?>
          <form method="POST">
            <div class="form-group-login" id="form" >
              <input type="username" name="username" class="form-control" placeholder="Pseudo">
            </div>
            <div class="form-group-login">
              <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" name="submit" class="btn btn-outline-success">S'identifier</button>
          </form>
        </div>

      </div>
    </div>
  </div>

</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/script.js"></script>

</html>
