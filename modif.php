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


$req = $bdd->prepare("UPDATE FraisForfait
                      SET libelle = :libelle, montant = :montant
                      WHERE id = :id");

$req->bindParam(':libelle', $_POST['libMod'], PDO::PARAM_STR);
$req->bindParam(':montant', $_POST['monMod'], PDO::PARAM_STR);
$req->bindParam(':id', $_POST['idMod'], PDO::PARAM_STR);

$req->execute();

header("location: index.php");
exit();

?>
