

<?php
include './includes/header.php';
// ajouterauteur_traitement.php
require_once 'BDD/connexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numNationalite = $_POST['numNationalite'];

    $sql = "INSERT INTO `auteur` (nom, prenom, numNationalite) VALUES (:nom, :prenom, :numNationalite)";
    try {
        $req = $pdo->prepare($sql);
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':numNationalite', $numNationalite);
        $req->execute();
        echo "<br><br><div class='alert alert-success' role='alert'>Auteur ajouté avec succès!</div>";
    } catch (PDOException $e) {
        echo "<br><br><div class='alert alert-danger' role='alert'>Erreur lors de l'ajout de l'auteur: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Méthode de requête invalide.</div>";
}?>
    <a href="listeauteurs.php" class="btn btn-success">Revenir à Liste AUteurs</a>
<?php

include './includes/footer.php';
?>