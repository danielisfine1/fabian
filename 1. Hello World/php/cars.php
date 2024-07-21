<link rel="stylesheet" type="text/css" href="./style.css">

<?php

/**
 * 1. PHP variables
 * 2. Arrays
 * 3. Loops
 */

/**
 * PHP VARIABLES:
 * PHP has some default variables that are called superglobals.
 * For example: $_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE, $_SERVER, $_FILES
 */


$action = $_GET['action'] ?? '';

if ($action === 'hello') {
      echo "Hello World!";
};

/** ARRAYS:
 * An array is a special variable, which can hold more than one value at a time.
 * In PHP, there are two ways to create arrays:
 * 1. Indexed arrays - Arrays with a numeric index
 * 2. Associative arrays - Arrays with named keys
 */

$indexed = [1, 2, 3, 4, 5];
$associative = [
      'name' => 'John Doe',
      'age' => 30,
      'occupation' => 'Web Developer'
];

$indexed = array(1, 2, 3, 4, 5);
$associative = array(
      'name' => 'John Doe',
      'age' => 30,
      'occupation' => 'Web Developer'
);

$cars = array(
      "italian" => array("Ferrari", "Lamborghini", "Maserati"),
      "german" => array("BMW", "Mercedes", "Audi"),
      "japanese" => array("Toyota", "Honda", "Nissan")
);

/* json_encode is a PHP function that converts a PHP array to a JSON string */
/* If you want to echo an array, you have to convert it to a string first */

$cars = array(
      "italian" => array(
            "Ferrari" => array(
                  "F8 Tributo" => array(
                        "year" => 2020,
                        "price" => "$275,000"
                  ),
                  "812 Superfast" => array(
                        "year" => 2017,
                        "price" => "$335,000"
                  )
            ),
            "Lamborghini" => array(
                  "Huracán EVO" => array(
                        "year" => 2021,
                        "price" => "$261,000"
                  ),
                  "Aventador SVJ" => array(
                        "year" => 2019,
                        "price" => "$517,000"
                  )
            )
      ),
      "german" => array(
            "BMW" => array(
                  "M3" => array(
                        "year" => 2021,
                        "price" => "$73,000"
                  ),
                  "X5 M" => array(
                        "year" => 2022,
                        "price" => "$108,000"
                  )
            ),
            "Mercedes-Benz" => array(
                  "S-Class" => array(
                        "year" => 2022,
                        "price" => "$115,000"
                  ),
                  "AMG GT" => array(
                        "year" => 2021,
                        "price" => "$117,000"
                  )
            ),
            "Audi" => array(
                  "RS7" => array(
                        "year" => 2021,
                        "price" => "$114,000"
                  ),
                  "Q8" => array(
                        "year" => 2022,
                        "price" => "$73,000"
                  )
            )
      ),
      "japanese" => array(
            "Toyota" => array(
                  "Supra" => array(
                        "year" => 2022,
                        "price" => "$43,000"
                  ),
                  "Land Cruiser" => array(
                        "year" => 2021,
                        "price" => "$85,000"
                  )
            ),
            "Honda" => array(
                  "NSX" => array(
                        "year" => 2022,
                        "price" => "$171,000"
                  ),
                  "Civic Type R" => array(
                        "year" => 2023,
                        "price" => "$43,000"
                  )
            ),
            "Nissan" => array(
                  "GT-R" => array(
                        "year" => 2023,
                        "price" => "$115,000"
                  ),
                  "370Z" => array(
                        "year" => 2020,
                        "price" => "$30,000"
                  )
            )
      )
);

if ($action === 'cars') { ?>

      <div class="cars">

            <?php 

            /* LOOPS */
            /* A loop is a programming structure that repeats a sequence of instructions until a specific condition is met. */

            foreach ($cars as $country => $brands) {
                  echo "<h1 class='country'>$country</h1>";

                  foreach ($brands as $brand => $models) {
                        echo "<h2 class='brand'>$brand</h2>";

                        foreach ($models as $model => $details) {
                              echo "<h3>$model</h3>";

                              echo "<ul>";

                              foreach ($details as $key => $value) {
                                    echo "<li>$key: $value</li>";
                              };

                              echo "</ul>";

                        };

                  };

            };

            ?>

      </div>

<?php

};

?>