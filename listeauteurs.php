

    <h2 class="text-align:center"> PDO et PHP</h2>
    <?php
    include_once 'includes/header.php';
    require_once 'BDD/connexion.php';
    ?>
    <br>
    <div class="row mt-3">
        <div class="col-sm-4">
            <h4>Liste des Auteurs</h4>
        </div>
        <div class="col-sm-4 end-text">
            <a href="ajouterauteur.php" class="btn btn-success btn-sm " style="height: 40px"><i class="fa-solid fa-plus"></i> Ajouter Auteur</a>
        </div>
        <div class="col-sm-4 end-text">
            <a href="formauteur.php?action=ajouter" class="btn btn-warning btn-sm " style="height: 40px"><i class="fa-solid fa-plus"></i> Add Autor Nw</a>
        </div>
    </div>

    <?php
    $sql="SELECT * FROM `auteur` ORDER BY num DESC";
    try {
        $req = $pdo->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        //echo"<pre>";
        //print_r($resultat);
        //echo"</pre>";
        ?>
        <div class="table-responsive overflow-y:auto mt-3" style="max-height:600px;">
            <table class='table table-responsive table-bordered border-dark table-striped text-center rounded'>
            <thead class='sticky-top bg-light'>
                <tr class='table-primary'>
                    <td scope='col'>Num </td>
                    <td scope='col'>Nom Auteur</td>
                    <td scope='col'>Prenom Auteur</td>
                    <td scope='col'>Code Nationalité</td>
                    <td scope='col'>Opérations</td>
                </tr>
            </thead>

            <?php
            foreach ($resultat as $result) 
            {
                echo "<tr>
                <td>".$result['num']."</td>
                <td>".$result['nom']."</td>
                <td>".$result['prenom']."</td>
                <td>".$result['numNationalite']."</td> ";?>
                <td>
                    <div class="row d-grid gap-2 d-md-flex justify-content-md-center"> <!-- Pour centrer les boutons -->
                        <div class="col d-grid">
                            <a href="modifierauteur.php?num=<?php echo $result['num']?>" class="btn btn-primary col"><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>
                        <div class="col d-grid">
                            <a href="deleteauteur_traitement.php?num=<?php echo $result['num']?>" class="btn btn-danger col"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <div class="col d-grid">
                            <a href="formauteur.php?action=modifier&num=<?php echo $result['num']?>" class="btn btn-warning col"><i class="fa-solid fa-pen-to-square"></i></a>
                        </div>

                    </div>
                </td>    

            <?php          
            }        
            echo"</table>";
    
            } catch (PDOException $e) {
                echo "Erreur lors de la lecture des enregistrements: ".$e->getMessage();
            }
            ?>
        </div>  

    <?php
    include_once 'includes/footer.php';
    ?>



