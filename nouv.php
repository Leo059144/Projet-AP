<?php
session_start();
if (!isset($_SESSION["session"]))
 {
    header("location: connexion.php");
    exit();
 }
try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'comptabilite', 'password');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}


$req = $bdd->prepare("INSERT INTO FraisForfait (id, libelle, montant)
                             VALUES (:id, :libelle, :montant)");

$req->bindParam(':libelle', $_POST['libAdd'], PDO::PARAM_STR);
$req->bindParam(':montant', $_POST['monAdd'], PDO::PARAM_STR);
$req->bindParam(':id', $_POST['idAdd'], PDO::PARAM_STR);

$req->execute();

header("location: index.php");
exit();

?>