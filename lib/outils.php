<?php
	require_once "../includes/Employe.php";

	function dump($element)
	{
		echo "<pre>";
		print_r($element);
		echo "</pre>";
		die();
	}

	function modify_info($indenfiant, $information) {
		$employe_file2 = fopen('../docs/employes.txt', 'r');
    $tmp_file2 = fopen('../docs/temps.txt', 'a+');
    $emp = serialize($information);

    while ($read = fgets($employe_file2)) {
        $unser = unserialize($read, ["allowed_classes" => true]);
        $ligne2 = $unser;
        if ($indenfiant == $ligne2->getId()) {
            continue;
        } else {
            fputs($tmp_file2, serialize($ligne2) . "\r\n");
        }
    }
    fputs($tmp_file2, serialize($information) . "\r\n");
    fclose($employe_file2);
    fclose($tmp_file2);
    copy("../docs/temps.txt", "../docs/employes.txt");
    unlink("../docs/temps.txt");
    header('location:acceuil.php');
	}

	function recherche($indenfiant) {
		$employe_file2 = fopen('../docs/employes.txt', 'r');

    while ($read = fgets($employe_file2)) {
        $unser = unserialize($read, ["allowed_classes" => true]);
        $ligne2 = $unser;
        if ($indenfiant == $ligne2->getId()) {
            return $ligne2;
        } else {
          continue;
        }
        return null;
    }
	}