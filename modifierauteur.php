<h2 class="text-align:center"> PDO et PHP</h2>
<?php
include_once 'includes/header.php';
require_once 'BDD/connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $num = $_GET['num'];
    
    $sql = "SELECT * FROM `auteur` WHERE num = :num";
    try {
        $req = $pdo->prepare($sql);
        $req->bindParam(':num', $num);
        $req->execute();
        $auteur = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "<br><br><div class='alert alert-danger' role='alert'>Erreur lors de la récupération de l'auteur: " . $e->getMessage() . "</div>";
    }
    
} else {
    echo "<div class='alert alert-warning' role='alert'>Méthode de requête invalide.</div>";
}
?>

<br> <h4 class="text-center"> Modifier Auteur</h4> <hr>

<div class="container col-sm-6 offset-sm-3"> <!-- Pour centrer le formulaire -->

    <form action="modifierauteur_traitement.php" method="post">
        <input type="hidden" name="num" id="num" value="<?php echo htmlspecialchars($auteur['num'] ?? ''); ?>">
        <div class="mb-3 form-group">
            <label for="nom" class="form-label">Nom Auteur</label>
            <input type="text" class="form-control"  id="nom" name="nom" required value="<?php echo htmlspecialchars($auteur['nom'] ?? ''); ?>">
        </div>
        <div class="mb-3 form-group">
            <label for="prenom" class="form-label">Prenom Auteur</label>
            <input type="text" class="form-control"  id="prenom" name="prenom" required value="<?php echo htmlspecialchars($auteur['prenom'] ?? ''); ?>">
        </div>
        <div class="mb-3 form-group" >
            <label for="numNationalite" class="form-label">Code Nationalité</label>
            <input type="number" class="form-control"  id="numNationalite" name="numNationalite" required value="<?php echo htmlspecialchars($auteur['numNationalite'] ?? ''); ?>">
        </div>
        <div class="row form-group ">
            <div class="col-sm-4 d-grid"> <!-- d-grid pour que le bouton prenne toute la largeur de la colonne -->
                <button type="submit" class="btn btn-success" >Modiifier Auteur</button>
            </div>
            <div class="col-sm-4 d-grid my-1">
                <button type="reset" class="btn btn-danger">Annuler</button>
            </div>
            <div class="col-sm-4 d-grid ">
                <button type="button" class="btn btn-primary" onclick="window.location.href='listeauteurs.php'">Retour à la Liste</button>
            </div>
        </div>
                      
    </form>

</div>
<?php
include_once 'includes/footer.php';
?>
