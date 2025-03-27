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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styleconnexion.css">
    <title>Frais GSB</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <input type="submit"  value="Fiche Frais" />
        <input type="submit"  value="Ligne Frais Forfait" />
        <input type="submit"  value="Frais Forfait" />
        <input type="submit"  value="Ligne Frais Hors Forfait" />
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header>

        </header>

        <div>
            <br><br><br><br><br><br>
            <h1>Fiche Frais</h1><br>
            <p>Bienvenue <?php echo($_SESSION["session"]) ?>.</p>

            <!-- Table Section -->
            <table>
                <h2>Frais Forfait</h2>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libéllé</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $afficher = $bdd->query('SELECT * FROM FraisForfait');

                    while ($donnees = $afficher->fetch()) {
                        echo ("<tr>
                                    <td>".$donnees['id']."</td>
                                    <td>".$donnees['libelle']."</td>
                                    <td>".$donnees['montant']."</td>
                                </tr>");
                    }
                ?>
                </tbody>
            </table>

            <form action="" class="formBloc">
                <h2>Modification</h2>
                <label for="identifiant"><br> Identifiant de la case à modifié :</label>
                <select id="identifiant" name="identifiant">
                    <?php 
                        $select = $bdd->query('SELECT id FROM FraisForfait');

                        while ($donnees = $select->fetch()) {
                            echo ("<option value=\"".$donnees['id']."\">".$donnees['id']."</option>");
                        }
                    ?>
                  </select>
                <label for="libMod"><br>libéllé :</label>
                <input type="libMod" id="libMod" name="libMod" placeholder="libMod"><br>
                <label for="monMod"><br>Montant :</label>
                <input type="monMod" id="monMod" name="monMod" placeholder="monMod"><br>

                <input type="submit"  value="MODIFIÉ"/>
            </form>

            <form action="" class="formBloc">
                <h2>Nouveau</h2>
                <label for="forfaitEtape"><br>forfaitEtape :</label>
                <input type="forfaitEtape" id="forfaitEtape" name="forfaitEtape" placeholder="forfaitEtape"><br>
                <label for="fraisKM"><br>fraisKM :</label>
                <input type="fraisKM" id="fraisKM" name="fraisKM" placeholder="fraisKM"><br>
                <label for="NuitéeHotel"><br>NuitéeHotel :</label>
                <input type="NuitéeHotel" id="NuitéeHotel" name="NuitéeHotel" placeholder="NuitéeHotel"><br>
                <label for="repasResto"><br>repasResto :</label>
                <input type="repasResto" id="repasResto" name="repasResto" placeholder="repasResto"><br>

                <input type="submit"  value="NOUVEAU"/>
            </form>
        </div>
    </div>
</body>
</html>