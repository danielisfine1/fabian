<link rel="stylesheet" type="text/css" href="./style.css">

<a href="/chess.php?color=white">White</a>
<a href="/chess.php?color=black">Black</a>
<a href="/chess.php?movement=1">Straight</a>
<a href="/chess.php?movement=2">Diagonal</a>
<a href="/chess.php?leap=yes">Leaping</a>

<a href="/chess.php">Reset</a>

<?php

/* Array methods */
/* Array methods are used to manipulate arrays. */

$chess = array(
      // Black pieces
      "pawn_black" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/c/cd/Chess_pdt60.png',
            'leap' => false,
      ),
      "bishop_black" => array(
            'straight' => false,
            'diagonal' => true,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/8/81/Chess_bdt60.png',
            'leap' => false,
      ),
      "knight_black" => array(
            'straight' => false,
            'diagonal' => false,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Chess_ndt60.png',
            'leap' => true,
      ),
      "rook_black" => array(
            'straight' => true,
            'diagonal' => false,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/a0/Chess_rdt60.png',
            'leap' => false,
      ),
      "queen_black" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/af/Chess_qdt60.png',
            'leap' => false,
      ),
      "king_black" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'black',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Chess_kdt60.png',
            'leap' => false,
      ),
      // White pieces
      "pawn_white" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/0/04/Chess_plt60.png',
            'leap' => false,
      ),
      "bishop_white" => array(
            'straight' => false,
            'diagonal' => true,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9b/Chess_blt60.png',
            'leap' => false,
      ),
      "knight_white" => array(
            'straight' => false,
            'diagonal' => false,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/28/Chess_nlt60.png',
            'leap' => true,
      ),
      "rook_white" => array(
            'straight' => true,
            'diagonal' => false,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Chess_rlt60.png',
            'leap' => false,
      ),
      "queen_white" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/4/49/Chess_qlt60.png',
            'leap' => false,
      ),
      "king_white" => array(
            'straight' => true,
            'diagonal' => true,
            'color' => 'white',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/3/3b/Chess_klt60.png',
            'leap' => false,
      ),
);


$color_filter = $_GET['color'] ?? '';

$filtered_chess = [];

foreach ($chess as $piece => $attributes) {
      if ($color_filter === '' || $attributes['color'] === $color_filter) {
            $filtered_chess[$piece] = $attributes;
      };
};

$movement_filter = $_GET['movement'] ?? '';

/**
 * 1 = straight
 * 2 = diagonal
 */

$filtered_chess = array_filter($filtered_chess, function ($attributes) use ($movement_filter) {
      if ($movement_filter == '') {
            return true;
      } else if ($movement_filter == '1') {
            return $attributes['straight'];
      } else if ($movement_filter == '2') {
            return $attributes['diagonal'];
      };
});

$leap_filter = $_GET['leap'] ?? '';

$filtered_chess = array_filter($filtered_chess, function ($attributes) use ($leap_filter) {
      if ($leap_filter === '') {
            return true;
      } else if ($leap_filter === 'yes') {
            return $attributes['leap'];
      } else if ($leap_filter === 'no') {
            return !$attributes['leap'];
      };
});

?>

<div class="chess-container">

<?php

foreach ($filtered_chess as $piece => $attributes) {
      echo "<div>";
      echo "<h2>$piece</h2>";
      echo "<img src='" . $attributes['image'] . "' />";
      echo "</div>";
};

?>

</div>