<?php
function nav_item($lien, $titre)
{
    $classe = 'nav_item';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . 'active';
    }
    return '<li class="' . $classe . '">

    <a class="nav-link" href="' . $lien . '">' . $titre . '<a>
    </li>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/all.min.css">


  <title><?php if (isset($title)) {
    echo $title;} else {
    echo "Gestion employer";
}?></title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../src/acceuil.php">Gestion Employer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <?=nav_item('../src/acceuil.php', 'Acceuil');?>
      <?=nav_item('../src/ajout.php', 'Ajouter un employé');?>
      <?=nav_item('../securites/logout.php', 'Deconnecter');?> <?php echo ((isset($_SESSION['PROFILE'])) ? ($_SESSION['PROFILE']['username']) : "") ?>
    </ul>
    <?php require '../src/search.php';?>
  </div>
  </nav>