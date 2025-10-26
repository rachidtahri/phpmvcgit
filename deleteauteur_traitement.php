<h2 class="text-align:center"> PDO et PHP</h2>
<?php
include_once 'includes/header.php';
require_once 'BDD/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $num = $_GET['num'];
    
    $sql = "DELETE FROM auteur WHERE num = :num";
    try {
        $req = $pdo->prepare($sql);
        $req->bindParam(':num', $num);
        $req->execute();
        $auteur = $req->fetch(PDO::FETCH_ASSOC);
        echo "<br><br><div class='alert alert-success' role='alert'>Supression Avec succes : Felicitation</div>";

    } catch (PDOException $e) {
        echo "<br><br><div class='alert alert-danger' role='alert'>Erreur lors de la récupération de l'auteur: " . $e->getMessage() . "</div>";
    }
    
} else {
    echo "<div class='alert alert-warning' role='alert'>Méthode de requête invalide.</div>";
}
?>

<br> <h4 class="text-center"> Supression Auteur </h4> <hr>
    <?php  
        echo "L'auteur avec le numéro ".$num." a été supprimé.";
        echo "<br>";
        echo "<hr>"
    ?>
    <a href="listeauteurs.php" class="btn btn-success">Revenir à Liste AUteurs</a>

<?php
include_once 'includes/footer.php';
?>
