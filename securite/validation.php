<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erreur = '';
    if (empty($_POST['nom'])) {
        $erreur = 'Saisir le nom';
    }
    if (empty($_POST['prenom'])) {
        $erreur = 'prenom invalide';
    }
    if (empty($_POST['email'])) {
        $erreur = 'email invalide';
    }
    if (empty($_POST['pole'])) {
        $erreur = 'pole invalide';
    }
    if (empty($_POST['poste'])) {
        $erreur = 'poste invalide';
    }
    if (empty($_POST['statut'])) {
        $erreur = 'statut invalide';
    }
}
