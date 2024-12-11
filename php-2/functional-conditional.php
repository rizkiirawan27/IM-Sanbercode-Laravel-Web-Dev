<?php

echo "<h3> Soal No 1 Greetings </h3>";
// Function untuk soal no 1
function greetings($name) {
    echo "Halo $name, Selamat Datang di Sanbercode!<br>";
}

// Hapus komentar untuk menjalankan code!
greetings("Bagas");
greetings("Wahyu");
greetings("nama peserta");

echo "<br>";

echo "<h3>Soal No 2 Reverse String</h3>";
// Function untuk soal no 2
function reverseString($string) {
    $reversed = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $reversed .= $string[$i];
    }
    echo "$reversed<br>";
}

// Hapus komentar di bawah ini untuk jalankan Code
reverseString("nama peserta");
reverseString("Sanbercode");
reverseString("We Are Sanbers Developers");
echo "<br>";

echo "<h3>Soal No 3 Palindrome </h3>";
// Function untuk soal no 3
function palindrome($string) {
    $reversed = "";
    for ($i = strlen($string) - 1; $i >= 0; $i--) {
        $reversed .= $string[$i];
    }
    if ($string === $reversed) {
        echo $string . "=>true<br>";
    } else {
        echo $string . "=>false<br>";
    }
}

// Hapus komentar di bawah ini untuk jalankan code
palindrome("civic"); // true
palindrome("nababan"); // true
palindrome("jambaban"); // false
palindrome("racecar"); // true

echo "<h3>Soal No 4 Tentukan Nilai </h3>";
// Function untuk soal no 4
function tentukan_nilai($nilai) {
    if ($nilai >= 85 && $nilai <= 100) {
        echo $nilai . "=> Sangat Baik<br>";
    } else if ($nilai >= 70 && $nilai < 85) {
        echo $nilai . "=> Baik<br>";
    } else if ($nilai >= 60 && $nilai < 70) {
        echo $nilai . "=> Cukup<br>";
    } else {
        echo $nilai . "=> Kurang<br>";
    }
}

// Hapus komentar di bawah ini untuk jalankan code
echo tentukan_nilai(98); // Sangat Baik
echo tentukan_nilai(76); // Baik
echo tentukan_nilai(67); // Cukup
echo tentukan_nilai(43); // Kurang

?>
