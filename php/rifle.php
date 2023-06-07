<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plik.css">

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


    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "l&l";


    $conn = mysqli_connect($servername, $username, $password, $database);

    ?>
    </header>
    </div>

    <div>
        <?php
        $sql = "SELECT `nazwa`, `cena`, `obraz` FROM `produkty` WHERE `typ` = 'rifle' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<div id='boxy'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $zdj = $row['obraz'];
                echo "<div class='box'>";
                echo "<h1 class='nazwa'>" . $row["nazwa"] . "</h1><h2>" . $row["cena"] . " zł</h2><img class='zdj' src='zdj/" . $zdj . "'>";
                echo "</div>";
            }
            echo "</div>";

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