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

try {

      $pdo = new PDO($dsn, $user, $pass, $options);

      $email = $data['email'] ?? '';
      $password = $data['password'] ?? '';

      $query = "SELECT user_id, first_name, last_name, email, favorite_boxer FROM users WHERE email = :email AND password = :password";
      $stmt = $pdo->prepare($query);
      $stmt->execute(['email' => $email, 'password' => $password]);
      $user = $stmt->fetch();

      echo json_encode(array(
            'user' => $user
      ));

} catch (PDOException $e) {

      throw new PDOException($e->getMessage(), (int)$e->getCode());

};

?>