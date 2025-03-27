<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsbV2;charset=utf8', 'comptabilite', 'password');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}

if (isset($_POST['identifiant']) && isset($_POST['password'])) {  
    // Préparer la requête pour éviter les injections SQL
    $response = $bdd->prepare('SELECT * FROM Visiteur WHERE login = ?;');
    $response->execute(array($_POST['identifiant']));
    $data = $response->fetch();

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($data && $_POST['password'] == $data['mdp']) {
        $_SESSION["session"] = $data['nom'];
        header('Location: ./index.php');
        exit();
    } else {
        echo "<script>alert('Vos identifiants sont invalides.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleconnexion.css">
    <title>Connexion</title>
    
</head>
<body class="center">
    <!--  /!\   remplir action -->
    <form class="connexion" action="connexion.php" method="POST">
        <!-- titre -->
        <img src="./media/logo.png" style="width:auto; height: 5em;">
        <h2>Connexion</h2>
        <p>veuillez entrer vos identifiants</p>
        <br>

        <!-- entrer les valeurs -->
        <label for="identifiant"><br> Identifiant :</label>
        <input type="identifiant" id="identifiant" name="identifiant" placeholder="Votre Identifiant">

        <label for="password"><br>Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="Votre Mot de Passe"><br>

        <!-- connexion -->
        <input type="submit"  value="CONNEXION" />
    </form>
</body>
</html>