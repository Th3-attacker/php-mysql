<?php
$title = "Acceuil";
require '../includes/header.php';
require '../includes/Employe.php';
?>
<div class="container">
<h1 class="text-center mt-4">Bienvenue Dans la Page D'Acceuil</h1>
<div class="card-body bg-light">
<table class="table ">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">E-mail</th>
      <th scope="col">Pôle</th>
      <th scope="col">Poste</th>
      <th scope="col">Date Embauche</th>
      <th scope="col">Statut</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if (!$file = fopen('../docs/employes.txt', 'r')): ?>
  <?="echec de l'ouverture"?>
<?php else: ?>
  <?php
while (!feof($file)) {
    $ligne = "";
    $read = fgets($file);
    $unser = unserialize($read);
    $ligne = $unser;
    ?>
    <?php
if (!empty($ligne)) {?>
      <td scope="row">
      <?=$ligne->getId();?>
      </td>
      <td><?=$ligne->getNom();?></td>
      <td><?=$ligne->getPrenom();?></td>
      <td><?=$ligne->getEmail();?></td>
      <td><?=$ligne->getPole();?></td>
      <td><?=$ligne->getPoste();?></td>
      <td><?=$ligne->getDate_emb();?></td>
      <td><?=$ligne->getStatut();?></td>
      <td class="text-right">
      <a href="edit.php?id=<?=$ligne->getId();?>"><button class="btn btn-primary"><i class="far fa-edit"></i> Edit</button></a>
      <a href="supp.php?id=<?=$ligne->getId();?>"><button class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce employe ?');" ><i class="far fa-trash-alt"></i> Supprimer</button></a>
      </td>
    <?php }?>
    </tr>
  <?php
}
fclose($file);
?>
<?php endif?>
</div>
<?php
require '../includes/footer.php';
?>