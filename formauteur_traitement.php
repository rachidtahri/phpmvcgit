

<?php
include './includes/header.php';

require_once 'BDD/connexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action=$_GET['action'];

    if ($action == 'modifier') {
        $num = (int) $_POST['num'];
        $sql = "UPDATE auteur SET nom=:nom,prenom=:prenom,numNationalite=:numNationalite WHERE num = :num";

    }else {
            $sql = "INSERT INTO `auteur` (nom, prenom, numNationalite) VALUES (:nom, :prenom, :numNationalite)";
    }

  
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numNationalite = (int) $_POST['numNationalite'];

    try {
        $req = $pdo->prepare($sql);
        if ($action=='modifier'){
             $req->bindParam(':num', $num); 
        }    
        $req->bindParam(':nom', $nom , PDO::PARAM_STR);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindParam(':numNationalite', $numNationalite);
        $req->execute();   
        echo "<br><br><div class='alert alert-success' role='alert'>Auteur ".$action."
        avec succès!</div>";
    } catch (PDOException $e) {
        echo "<br><br><div class='alert alert-danger' role='alert'>Erreur lors de la Modification de l'auteur: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>Méthode de requête invalide.</div>";
}?>
    <a href="listeauteurs.php" class="btn btn-success">Revenir à Liste AUteurs</a>
<?php

include './includes/footer.php';
?>