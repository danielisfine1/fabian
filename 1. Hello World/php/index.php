<link rel="stylesheet" type="text/css" href="./style.css">

<a href="/chess.php">Chess</a>

<p>

      <?php

      $number = 10;

      $happy_emoji = "https://emojiisland.com/cdn/shop/products/Happy_Emoji_Icon_5c9b7b25-b215-4457-922d-fef519a08b06_grande.png";
      $sad_emoji = "https://emojiisland.com/cdn/shop/products/Sad_Face_Emoji_large.png";

      $image = "";
      $image_class = "emoji";

      if ($number > 5) {
            $image = $happy_emoji;
            $image_class = "emoji big";
            echo "Number is greater than 5";
      } else {
            $image = $sad_emoji;
            echo "Number is less than 5";
      }

      ?>

</p> 

<?php echo "<div><img class='$image_class' src='$image' /></div>"; ?>

<?php echo "Hello World!"; ?>
<?php echo "<p>Hello World!</p>"; ?>
<?php echo "<h1>Hello World!</h1>"; ?>
<?php echo "<h2>Hello World!</h2>"; ?>
<?php echo "<h3>Hello World!</h3>"; ?>