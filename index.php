<?php

$a = 0;
$b = 0;

echo "For loooooooop";

for ($i = 0; $i <= 5; $i++) {
  $a += 10;
  $b += 5;

  echo "<br>i = $i, a = $a, b = $b";
}

echo "<br>End of the for loop: a = $a, b = $b";

$a = 0;
$b = 0;
$i = 0;

echo "<br>WHile LooPp";

while($i<=5) {
  $a += 10;
  $b += 5;

  echo "<br>i = $i, a = $a, b = $b";
  $i++;
}

echo "<br>End of the whillle loop: a = $a, b = $b";  

$a = 0;
$b = 0;
$i = 0;

echo "<br>ddodooooo-WHile LooPp";

do {
  $a += 10;
  $b += 5;

  echo "<br>i = $i, a = $a, b = $b";
  $i++;
} while($i<=5);

echo "<br>End of the whillle loop: a = $a, b = $b";
