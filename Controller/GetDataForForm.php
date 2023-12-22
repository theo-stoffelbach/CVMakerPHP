<?php
$data = null;

if (isset($_GET['Id']) && !empty($_GET['Id'])) {
    $id = $_GET['Id'];

    $stmt = $db->prepare('SELECT * FROM cv WHERE id = :id');
    $stmt->execute(['id' => $id]);
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        echo "<script>
        alert('L\'ID $id n\'existe pas');
        window.location.href = 'index.php';
        </script>";
        exit;
    }
}

global $data;
?>