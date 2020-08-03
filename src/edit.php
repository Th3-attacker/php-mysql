<?php

require '../includes/employe.php';
require '../includes/header.php';
require '../lib/outils.php';

if (!isset($_GET['id'])) {
    header('location:acceuil.php');
    exit();
} else {
   $u_id = $_GET['id']; 
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pole = $_POST['pole'];
    $poste = $_POST['poste'];
    $date_emb = $_POST['date-emb'];
    $statut = $_POST['statut'];
    $employe = new Employe($id, $nom, $prenom, $email, $pole, $poste, $date_emb, $statut);
    $id_seach = $u_id;
    modify_info($id_seach, $employe);
}

$employe_file1 = fopen('../docs/employes.txt', 'r');
$tmp_file1 = fopen('../docs/temps.txt', 'a+');

while ($read = fgets($employe_file1)) {
    $unser = unserialize($read, ["allowed_classes" => true]);
    $ligne = $unser;
    if ($u_id == $ligne->getId()) {
        $employe = $ligne;
        break;
    } else {
        continue;
    }
}

?>




<div class="container d-flex justify-content-center mt-4">
    <div class="card mb-4 mt-3 pr-2 pl-2"style="width: 50rem;">
        <div class="card-header bg-dark text-center mt-2">
            <h3 class="card-title" style="color: white;">Ajouter un Employé </h3>
        </div>
        <div class="body-card mt-2 mb-4">
            <?php if (isset($erreur)): ?>
                <div class="alert alert-info">
                    <?=$erreur?>
                </div>
            <?php endif;?>
            <form name="Form" class="mb-4 pt-3" method="post">
                <div class="form-row">
                    <div class="col">
                        <span style="color: red">*</span><label for="">id</label>
                        <input type="text" name="id" id="id" class="form-control" placeholder="id" value="<?=$employe->getId()?>">
                    </div>
                    <div class="col">
                        <span style="color: red">*</span><label for="">nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom" value="<?=$employe->getNom()?>">
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <span style="color: red">*</span><label for="">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom" value="<?=$employe->getPrenom()?>">
                    </div>
                    <div class="col">
                        <label for="">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?=$employe->getEmail()?>">
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <span style="color: red">*</span><label for="">pôle</label>
                        <select id="#" name="pole" class="form-control">
                          <option selected>Pôles</option>
                          <option name="Production" >Production</option>
                          <option name="Commerciale">Commerciale</option>
                          <option name="Formation">Formation</option>
                        </select>
                    </div>
                    <div class="col">
                        <span style="color: red">*</span><label for="">poste</label>
                        <select id="#" name="poste"class="form-control">
                          <option selected>Poste</option>
                          <option value="1" name="DG">DG</option>
                          <option value="2" name="DRH">DRH</option>
                          <option value="3" name="DAF">DAF</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <span style="color: red">*</span><label for="">Date d'embauche</label>
                        <input type="date" name="date-emb" id="date-emb" class="form-control" placeholder="date-emb" value="<?=$employe->getDate_emb()?>">
                    </div>
                    <div class="col">
                        <span style="color: red">*</span><label for="">statut</label>
                        <select id="#" name="statut"class="form-control" >                          <option value="permenent" name="permenent">Permenent</option>
                          <option value="No permenent" name="No permenent">No Permenent</option>
                        </select>
                    </div>
                </div>
                    <div class="row">
                        <div class="col text-center mt-3">
                            <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-success " id="bouton_envoi">Valider</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>






<?php
require '../includes/footer.php';
?>