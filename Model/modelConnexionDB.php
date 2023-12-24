<?php
class DatabaseConnection {
    private static $instance;
    private $connection;

    private function __construct() {
        // Paramètres de connexion à la base de données
        include '../.env/connexion_credential.php';

        $ipAddress = $config['ipAddress'];
        $nameDb = $config['nameDb'];
        $user = $config['user'];
        $password = $config['password'];

        // Création de la connexion
        $this->connection = new PDO("mysql:host=$ipAddress;dbname=$nameDb", $user, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

$db = DatabaseConnection::getInstance()->getConnection();

?>