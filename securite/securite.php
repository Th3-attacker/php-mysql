<?php

//On démarre une nouvelle session avec la fonction session_start()
session_start();
//Si la session n'est pas définie on rédirige l'user à la page index.php
if (!(isset($_SESSION['PROFILE']))) {
    header('location:./index.php');
}
