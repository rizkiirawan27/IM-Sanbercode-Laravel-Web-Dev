<?php
require_once "animal.php";
require_once "Frog.php";
require_once "Ape.php";

// Release 0
$sheep = new Animal("shaun");
echo "Name : " . $sheep->get_name() . "<br>"; // "shaun"
echo "Legs : " . $sheep->get_legs() . "<br>"; // 4
echo "Cold Blood : " . $sheep->get_cold_blooded() . "<br> <br>"; // "no"

// Release 1

$kodok = new Frog("buduk");
echo"Name : " . $kodok->get_name() . "<br>"; // "buduk"
echo "Legs : " . $kodok->get_legs() . "<br>"; // 4
echo "Cold Blood : " . $kodok->get_cold_blooded() . "<br>"; // "no"
echo "Jump : " .  $kodok->jump() . "<br> <br>"; // "hop hop"

$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->get_name() . "<br>"; // "kera sakti"
echo "Legs : " . $sungokong->get_legs() . "<br>"; // 2
echo "Cold Blood : " . $sungokong->get_cold_blooded() . "<br>"; // "no"
echo "Yell : " . $sungokong->yell(); // "Auooo"

?>
