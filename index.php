
<?php include_once 'includes/header.php'; ?>

    <h2 class="text-align:center"> PDO et PHP</h2>
    <?php
    require_once 'BDD/connexion.php';
    echo "<br>";
    ?>
    <?php
    echo "<h3>Insertion d'un enregistrement dans la table clients</h3>";
    $sql="INSERT INTO `clients`( `nom`, `prenom`, `age`) VALUES ('Rachid','Tahri',45)";
    try {
        $nbre=0;
        $req = $pdo->prepare($sql);
        $nbre = $req->execute();
        //$pdo->exec($sql);
        if ($nbre>0){
            echo "Nombre d'enregistrements insere: ".$nbre."  ";
        } else {
            echo "Aucun enregistrement insere  ";
        }
        //echo "Nouvel enregistrement cree avec succes";
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion: ".$e->getMessage();
    }
    ?>
    <hr>
    <?php
    echo "<h3>Lecture des enregistrements de la table auteur</h3>";
    $sql="SELECT * FROM `auteur`";
    try {
        $req = $pdo->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        //echo"<pre>";
        //print_r($resultat);
        //echo"</pre>";
        echo"<table class='table table-bordered table-striped text-center'>";
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

    <h2 class="text-align:center"> ceci est un test distant</h2>




<footer>
    <?php include_once 'includes/footer.php'; ?>
</footer>
