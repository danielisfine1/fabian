<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$input = file_get_contents("php://input");
$data = json_decode($input, true);

$email = $data['email'];
$password = $data['password'];

$logged_in_user_data = null;

$users = array(
      array(
            'email' => 'daniel@email.com',
            'password' => '123456',
            'pokemon_name' => 'Pikachu',
            'pokemon_image' => 'https://upload.wikimedia.org/wikipedia/en/a/a6/Pok%C3%A9mon_Pikachu_art.png'
      ),
      array(
            'email' => 'fabian@email.com',
            'password' => '654321',
            'pokemon_name' => 'Charmander',
            'pokemon_image' => 'https://assets.pokemon.com/assets/cms2/img/pokedex/full//004.png'
      )
);

foreach ($users as $user) {
      if ($user['email'] == $email && $user['password'] == $password) {
            $logged_in_user_data = $user;
            break;
      }
};

$data = array(
      'success' => false,
      'message' => 'Invalid credentials!'
);

if ($logged_in_user_data) {
      $data = array(
            'success' => true,
            'message' => 'User logged in successfully!',
            'user' => $logged_in_user_data
      );
};

echo json_encode($data);

?>
