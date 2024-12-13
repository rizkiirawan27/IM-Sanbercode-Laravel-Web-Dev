<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Looping</title>
</head>
<body>
    <h1>Berlatih Looping</h1>

    <?php 
        echo "<h3>Soal No 1 Looping I Love PHP</h3>";
        /* 
            Soal No 1 
            Looping I Love PHP
            Lakukan Perulangan (boleh for/while/do while) sebanyak 20 iterasi. Looping terbagi menjadi dua: Looping yang pertama Ascending (meningkat) 
            dan Looping yang ke dua menurun (Descending). 

            Output: 
            LOOPING PERTAMA
            2 - I Love PHP
            4 - I Love PHP
            ...
            LOOPING KEDUA
            20 - I Love PHP
            18 - I Love PHP
            ...
        */

        // Looping pertama (Ascending)
        echo "LOOPING PERTAMA<br>";
        for ($i = 2; $i <= 20; $i += 2) {
            echo "$i - I Love PHP<br>";
        }

        // Looping kedua (Descending)
        echo "LOOPING KEDUA<br>";
        for ($i = 20; $i >= 2; $i -= 2) {
            echo "$i - I Love PHP<br>";
        }

        echo "<h3>Soal No 2 Looping Array Modulo </h3>";
        /* 
            Soal No 2
            Looping Array Module
            Carilah sisa bagi dengan angka 5 dari setiap angka pada array berikut.
            Tampung ke dalam array baru bernama $rest 
        */

        $numbers = [18, 45, 29, 61, 47, 34];
        echo "array numbers: ";
        print_r($numbers);

        // Menghitung sisa bagi
        $rest = [];
        foreach ($numbers as $number) {
            $rest[] = $number % 5;
        }

        echo "<br>Array sisa baginya adalah: "; 
        print_r($rest);

        echo "<h3> Soal No 3 Looping Asociative Array </h3>";
        /* 
            Soal No 3
            Loop Associative Array
            Terdapat data items dalam bentuk array dimensi. Buatlah data tersebut ke dalam bentuk Array Asosiatif. 
            Setiap item memiliki key yaitu : id, name, price, description, source. 
        */

        $items = [
            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpeg'], 
            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpeg'],
            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],
            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpeg']
        ];

        // Mengubah menjadi array asosiatif
        $associativeItems = [];
        foreach ($items as $item) {
            $associativeItems[] = [
                'id' => $item[0],
                'name' => $item[1],
                'price' => $item[2],
                'description' => $item[3],
                'source' => $item[4]
            ];
        }

        // Menampilkan hasil
        foreach ($associativeItems as $item) {
            print_r($item);
            echo "<br>";
        }

        echo "<h3>Soal No 4 Asterix </h3>";
        /* 
            Soal No 4
            Asterix 5x5
            Tampilkan dengan looping dan echo agar menghasilkan kumpulan bintang dengan pola seperti berikut: 
            Output: 
            * 
            * * 
            * * * 
            * * * * 
            * * * * *
        */

        echo "Asterix:<br>";        
        for ($i = 2; $i <= 5; $i++) {
            for ($j = $i; $j <=5; $j++) {
                echo $j;
            }
            echo "<br>";
        }
    ?>

</body>
</html>