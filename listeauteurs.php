

    <h2 class="text-align:center"> PDO et PHP</h2>
    <?php
    include_once 'includes/header.php';
    require_once 'BDD/connexion.php';
    ?>
    <br>
    <div class="row mt-3">
        <div class="col-sm-10">
            <h4>Liste des Auteurs</h4>
        </div>
        <div class="col-sm-2 end-text">
            <a href="#" class="btn btn-success btn-sm " style="height: 40px"><i class="fa-solid fa-plus"></i> Ajouter Auteur</a>
    </div>
    

    <?php
    $sql="SELECT * FROM `auteur`";
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
                </tr>
            </thead>

            <?php
            foreach ($resultat as $result) {
                echo "<tr>
                <td>".$result['num']."</td>
                <td>".$result['nom']."</td>
                <td>".$result['prenom']."</td>
                <td>".$result['numNationalite']."</td> </tr>";          
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



