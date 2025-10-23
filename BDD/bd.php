<?php

/**
 * Classe BD (Base de Données) utilisant PDO et le pattern Singleton.
 */
class BD {
    // 1. Propriété statique pour stocker l'instance unique de la connexion PDO
    private static $instance = null;

    // 2. Paramètres de connexion à la base de données locale
    private $host = 'localhost';   // L'hôte de la base de données (souvent 'localhost')
    private $dbName = 'biblio';    // Le nom de votre base de données
    private $user = 'root';        // Votre nom d'utilisateur MySQL local (souvent 'root')
    private $password = '';        // Votre mot de passe MySQL local (souvent vide par défaut)
    private $charset = 'utf8mb4';  // Encodage

    // 3. Le constructeur est privé pour empêcher l'instanciation directe de la classe
    private function __construct() {
        // La méthode est intentionnellement vide car nous utilisons getInstance() pour la connexion
    }

    /**
     * Empêche le clonage de la classe
     */
    private function __clone() {
        // La méthode est intentionnellement vide
    }

    /**
     * Méthode statique pour obtenir l'unique instance de la connexion PDO.
     * @return PDO L'objet de connexion PDO.
     */
    public static function getInstance() {
        // Vérifie si aucune instance de connexion n'existe déjà
        if (self::$instance === null) {
            
            // Construit la chaîne DSN (Data Source Name)
            $dsn = "mysql:host={$host};dbname={$dbName};charset={$charset}";
            
            // Options PDO pour la gestion des erreurs
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lance des exceptions en cas d'erreur
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Récupère les résultats sous forme de tableau associatif par défaut
                PDO::ATTR_EMULATE_PREPARES   => false,                  // Utilise les vraies requêtes préparées
            ];
            
            try {
                // Crée et stocke la nouvelle connexion PDO
                self::$instance = new PDO($dsn, $user, $password, $options);
            } catch (\PDOException $e) {
                // Affiche une erreur et arrête l'exécution si la connexion échoue
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }
        
        // Retourne l'instance de connexion unique
        return self::$instance;
    }
}