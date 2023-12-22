<?php
// require 'connexion_sql.php'; 
require "../Model/modelConnexionDB.php";

echo "Connected successfully";

class CVModel {
    private function createTableIfNotExists($tableName, $fields) {
        $db = DatabaseConnection::getInstance()->getConnection();

        $columns = "id INT AUTO_INCREMENT PRIMARY KEY, ";

        foreach ($fields as $field) {
            $columns .= "{$field} VARCHAR(255), ";
        }
        $columns = rtrim($columns, ', ');
        

        $stmt = $db->prepare("CREATE TABLE IF NOT EXISTS {$tableName} ({$columns})");

        $stmt->execute();
    }


    public function addCV($tableName, $data) {
        $db = DatabaseConnection::getInstance()->getConnection();
        
        // Assurez-vous que les champs correspondent aux clés dans $data
        $fields = array_keys($data);
        $columns = implode(", ", $fields);

        print_r($columns);

        $this->createTableIfNotExists($tableName, $fields);

        $namedParameters = ":" . implode(", :", $fields);

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$namedParameters})";
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
    }




}

?>