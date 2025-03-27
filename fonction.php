<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=gsbv2;charset=utf8', 'visiteur', 'password');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

# tester si $_POST['login'] et $_POST['mdp'] existe au préalable
function connexion($login, $mdp): 
{  
    // Tentative de connexion à la base de donnée
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=gsbV2;charset=utf8", "Visiteur","password");
    } catch(Exception $e) {
        // En cas d'erreur lors de la connexion avertir l'utilisateur qu'un problème l'empêche d'acceder à la web app
        echo "Impossible de se connecter à la base de données.";
        die('Erreur: ' . $e->getMessage());
    }

    // Préparer la requête SQL avec prepare pour éviter les injections SQL
    $response = $bdd->prepare('SELECT * FROM Visiteur WHERE login = ? AND mdp = ?;');
    $response->execute(array($login, $mdp));
    $data = $response->fetch();


    // Vérifier si l'utilisateur existe
    if ($data['nom'] !== null) {
        // Si l'utilisateur existe alors on crée une session à son nom.
        $_SESSION["session"]=$data['nom'];
        // Puis on le redirige sur index.php
        header('Location: ./index.php');
    } else {
        // Si l'utilisateur n'est pas trouvé, alors les retourner un message d'erreur
        echo "<script>alert('Vos identifiants sont invalides.');</script>";
    }
}
?>



