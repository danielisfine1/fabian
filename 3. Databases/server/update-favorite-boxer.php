<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$host = '127.0.0.1';
$db = 'my_database';
$user = 'root';
$pass = 'root';   
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
];

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$user_id = $data['user_id'] ?? '';
$favorite_boxer = $data['favorite_boxer'] ?? '';

try {

      $pdo = new PDO($dsn, $user, $pass, $options);

      $query = "UPDATE users SET favorite_boxer = :favorite_boxer WHERE user_id = :user_id";
      $stmt = $pdo->prepare($query);
      $stmt->execute(['favorite_boxer' => $favorite_boxer, 'user_id' => $user_id]);

      echo json_encode(array(
            'message' => 'Favorite boxer updated'
      ));

} catch (PDOException $e) {

      throw new PDOException($e->getMessage(), (int)$e->getCode());

};

?>