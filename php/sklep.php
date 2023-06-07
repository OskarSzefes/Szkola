<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plik2.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <div class="navMain">
        <div class="nab">
            <a href="index.php"> <img src="logonab.png" alt=""></a>
        </div>
        <div class="slang">
            <img src="logoej.png" alt="">
        </div>

    </div>


    <div class="log">
        <header class="lognav">
            <a href="zaloguj.php">
                <button type="button" class="btn btn-dark">ZALOGUJ SIE</button></a>
            <a href="rejestracja.php">
                <button type="button" class="btn btn-dark">ZAREJESTRUJ SIE</button></a>
            <?php
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "l&l";


            $conn = mysqli_connect($servername, $username, $password, $database);

            if (isset($_SESSION['login'])) {
                echo "<p class='btn btn-dark zalogowany'>ZALOGOWANY:  " . $_SESSION['login'] . "</p>";
                echo "<a class='btn btn-dark zalogowany' href='wylogowanie.php' name='logout'>WYLOGUJ</a>";

            }

            if (isset($_SESSION['login']) && $_SESSION['login'] == 'Admin') {
                echo "<a href='dodawanie.php'>
                <button type='button' class='btn btn-dark'>DODAJ PRODUKT</button></a>";
            }
            ?>
        </header>
    </div>


    <div class="katy">

        <?php
        require "db.php";

        $sql = "SELECT * FROM kategorie";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($kategoria = mysqli_fetch_assoc($result)) {
                ?>

                <div class="kategoria">
                    <a href="produkty.php?kategoria=<?php echo $kategoria["id"] ?>">
                        <img src="<?php echo $kategoria["zdjecie"] ?>" class="katzdj">
                        <p>
                            <?php echo $kategoria["nazwa"] ?>
                        </p>
                    </a>

                </div>

                <?php

            }

        }

        mysqli_close($conn);



        ?>

    </div>

    <div class="footMain">
        <div class="lewo">
            <p>Terms and Conditions</p>
            <span>&#160;</span>
            <span>&#160;</span>
            <span>&#160;</span>
            <p>Privacy Policy</p>
        </div>
        <div class="srodek">
            <img src="samnapis.png" alt="" class="samnapis">
        </div>
        <div class="prawo">
            <span>&#160;</span>
            <p>PO BOX 3463 23953 Prime Edward Island, MN 73329 @2023 Lock&Loaded </p>
        </div>
    </div>
</body>

</html>