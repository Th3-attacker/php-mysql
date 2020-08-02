<?php
$ligne = '';
require '../includes/Employe.php';
if (!isset($_GET['id'])) {
    header('location:acceuil.php');
    exit();
}
$file = fopen('../docs/employes.txt', 'r');
$file2 = fopen('../docs/tmp.txt', 'w+');
$id = $_GET['id'];
while ($read = fgets($file)) {
    $unser = unserialize($read, ["allowed_classes" => true]);
    $ligne = $unser;
    if ($id == $ligne->getId()) {
        continue;
    } else {
        fputs($file2, serialize($ligne) . "\r\n");
    }
}
if (copy("../docs/tmp.txt", "../docs/employes.txt")) {
    header('location:acceuil.php');
}
fclose($file);
fclose($file2);
unlink('../docs/tmp.txt');
