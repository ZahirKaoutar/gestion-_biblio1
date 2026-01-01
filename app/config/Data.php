<?php

class Database {
    private static $instance = null; // mémoire partagée
    private $conn;

    private $host = "localhost";
    private $db_name = "biblio";
    private $username = "root";
    private $password = "ZAHIR2004";

    // constructeur privé → empêche new Database() ailleurs
    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur DB : " . $e->getMessage());
        }
    }

    // Méthode statique → donne l’instance unique
    public static function getInstance() {
        if (self::$instance === null) {  // Vérifie si déjà créée
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Retourne la connexion PDO
    public function getConnection() {
        return $this->conn;
    }
} 





















?>