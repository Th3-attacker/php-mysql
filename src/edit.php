<?php
require '../includes/employe.php';
require '../includes/header.php';
if (!isset($_GET['id'])) {
    header('location:acceuil.php');
    exit();
}
$file = fopen('../docs/employes.txt', 'r+');
$id = $_GET['id'];
while ($read = fgets($file)) {
    $unser = unserialize($read, ["allowed_classes" => true]);
    $ligne = $unser;
    // fclose($file);
    if ($id == $ligne->getId()) {
        if (!empty($_POST['submit'])) {
            $id_m = $_POST['id'];
            $nom_m = $_POST['nom'];
            $prenom_m = $_POST['prenom'];
            $email_m = $_POST['email'];
            $pole_m = $_POST['pole'];
            $poste_m = $_POST['poste'];
            $date_emb_m = $_POST['date-emb'];
            $statut_m = $_POST['statut'];
            $ligne = new Employe($id_m, $nom_m, $prenom_m, $email_m, $pole_m, $poste_m, $date_emb_m, $statut_m);
            $emp = serialize($ligne);
            $file = fopen("../docs/employes.txt", "w+");
            fputs($file, $emp . "\r\n");
            header('location:acceuil.php');
        } else {
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
                        <input type="text" name="id" id="id" class="form-control" placeholder="id" value="<?=$ligne->getId()?>">
                    </div>
                    <div class="col">
                        <span style="color: red">*</span><label for="">nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="nom" value="<?=$ligne->getNom()?>">
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <span style="color: red">*</span><label for="">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom" value="<?=$ligne->getPrenom()?>">
                    </div>
                    <div class="col">
                        <label for="">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?=$ligne->getEmail()?>">
                    </div>
                </div>
                <div class="form-row">
                <div class="col">
                        <span style="color: red">*</span><label for="">pôle</label>
                        <select id="#" name="pole" class="form-control">
                          <option selected>Pôles</option>
                          <option name="Production">Production</option>
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
                        <input type="date" name="date-emb" id="date-emb" class="form-control" placeholder="date-emb" value="<?=$ligne->getDate_emb()?>">
                    </div>
                    <div class="col">
                        <span style="color: red">*</span><label for="">statut</label>
                        <select id="#" name="statut"class="form-control" >
                          <option selected>Statut</option>
                          <option value="1" name="permenent">Permenent</option>
                          <option value="2" name="No permenent">No Permenent</option>
                        </select>
                    </div>
                </div>
                <div class="container">
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
}
    }
}

require '../includes/footer.php';
