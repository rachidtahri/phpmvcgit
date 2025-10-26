<h2 class="text-align:center"> PDO et PHP</h2>
<?php
include_once 'includes/header.php';
//require_once 'BDD/connexion.php';
?>

<br> <h4 class="text-center"> Ajouter Auteur</h4> <hr>

<div class="container col-sm-6 offset-sm-3"> <!-- Pour centrer le formulaire -->

    <form action="ajouterauteur_traitement.php" method="post">
        <div class="mb-3 form-group">
            <label for="nom" class="form-label">Nom Auteur</label>
            <input type="text" class="form-control" placeholder="Entrez Le nom " id="nom" name="nom" required>
        </div>
        <div class="mb-3 form-group">
            <label for="prenom" class="form-label">Prenom Auteur</label>
            <input type="text" class="form-control" placeholder="Entrez Le prénom " id="prenom" name="prenom" required>
        </div>
        <div class="mb-3 form-group" >
            <label for="numNationalite" class="form-label">Code Nationalité</label>
            <input type="number" class="form-control" placeholder="Choisir La nationalité " id="numNationalite" name="numNationalite" required>
        </div>
        <div class="row form-group ">
            <div class="col-sm-4 d-grid"> <!-- d-grid pour que le bouton prenne toute la largeur de la colonne -->
                <button type="submit" class="btn btn-success" >Ajouter Auteur</button>
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



