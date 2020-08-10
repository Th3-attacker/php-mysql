<?php
session_start();
require 'database/db.php';
if (!empty($_POST)) {
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $password = sha1($_POST['password']);
        $req = ('SELECT * FROM utilisateur WHERE LOGIN=? && MDP=?');
        $result = $db->prepare($req);
        $result->execute([$pseudo, $password]);
        if ($user = $result->fetch()) {
            if ($user['IDPROFIL'] == 1) {
                $_SESSION['PROFIL'] = $user;
                header('location:./src/index_admin.php');
            } else if ($user['IDPROFIL'] == 2) {
                $_SESSION['PROFIL'] = $user;
                header('location:./pages/index_approviseur.php');
            } else if ($user['IDPROFIL'] == 3) {
                $_SESSION['PROFIL'] = $user;
                header('location:./pages/index_vendeur.php');
            }
        } else {
            $erreur = "pseudo ou mot d passe incorrecte";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.css">
  <script src="./js/babel.js"></script>
  <script src="./js/react.js"></script>
  <script src="./js/react-dom.js"></script>

</head>

<body class="container">
<div id="root"></div>
<h1 class="text-center mt-4">Application Web Dynamique </h1>
  <div class="modal-dialog text-center mt-5 mb-4">
    <div class="col-sm-9 main-section">
    <?php if (isset($erreur)): ?>
                <div class="alert alert-danger">
                    <?=$erreur?>
                </div>
            <?php endif;?>
      <div class="modal-content border-success mb-4">
        <div class="col-12 user-img">
          <h2>Connexion</h2>
        </div>
        <div class="col-12 form-input">
          <form method="POST">
            <div class="form-group-login" id="form" >
            <label for="">pseudo</label>
              <input type="username" name="pseudo" class="form-control" placeholder="Pseudo">
            </div>
            <div class="form-group-login">
            <label for="">Mot de passe </label>
              <input type="password" name="password" class="form-control" placeholder="Mot de passe">
            </div>
            <button type="submit" name="submit" class="btn btn-outline-success mt-4 mb-2">S'identifier</button>
          </form>
        </div>

      </div>
    </div>
  </div>

<script src="./js/index.js"></script>
</body>

</html>
