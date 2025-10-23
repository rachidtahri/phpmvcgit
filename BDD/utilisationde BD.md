// Inclure le fichier de la classe BD
require_once 'bd.php';

// Obtenir l'unique instance de la connexion PDO
$pdo = BD::getInstance();

// Maintenant, vous pouvez utiliser $pdo pour exécuter des requêtes :
try {
    $stmt = $pdo->query('SELECT * FROM livres');
    $livres = $stmt->fetchAll();
    
    // Afficher les données (exemple)
    echo "<h2>Liste des livres :</h2>";
    echo "<ul>";
    foreach ($livres as $livre) {
        echo "<li>" . htmlspecialchars($livre['titre']) . "</li>";
    }
    echo "</ul>";

} catch (\PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}