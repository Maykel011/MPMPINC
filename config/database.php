<?php
$host = "sql209.infinityfree.com";
$dbname = "if0_42309582_mpmpi_db";
$username = "if0_42309582";
$password = "Metroaccess888";
 
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(array(
        'success' => false,
        'message' => 'Database Connection Failed: ' . $e->getMessage()
    ));
    exit;
}
?>