<?php
$ligne = '';
require '../includes/Employe.php';
if (!isset($_GET['id'])) {
    header('location:acceuil.php');
    exit();
}
$file = fopen('../docs/employes.txt', 'r');
$read = fgets($file);
$unser = unserialize($read);
$ligne = $unser;
$id = $_GET['id'];

if ($id == $ligne->getId()) {
    $read = fgets($file);
    $unser = unserialize($read);
    $ligne = $unser;
    $ligne = str_replace($ligne, '', $ligne);
    $emp = serialize($ligne);
    $write = fputs($file, $emp);

} else {
    echo "n'existe pas ";
}
