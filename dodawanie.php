<?php
session_start();
if (empty($_SESSION['login']) || $_SESSION['login'] != 'Admin') {
    header('location:sklep.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plik.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Dodawanie produkyów</title>
</head>

<body>
    <?php




    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "l&l";


    $conn = mysqli_connect($servername, $username, $password, $database);

    ?>

    <div class="navMain">
        <div class="nab">
            <a href="main.php"> <img src="logonab.png" alt=""></a>
        </div>
        <div class="slang">
            <img src="logoej.png" alt="">
        </div>

    </div>

    <form class="formularz" method="post" autocomplete="off" enctype="multipart/form-data"></br></br>

        <label>Nazwa Produktu:</label></br>
        <input type="text" class="input" name="productName"></br></br>


        <label>Cena produktu:</label></br>
        <input type="number" class="input" name="productPrice"></br></br>
        <label>Typ Produktu:</label></br>
        <?php
        include 'db.php';
        $sql = 'SELECT * FROM kategorie';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<select name="productType">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row["id"] . '">' . $row["nazwa"] . '</option>';
            }
            echo '</select>';
        }
        ?></br></br>

        <!-- <label>Opis produktu:</label></br> -->
        <textarea name="text" rows="4" cols="50"></textarea></br></br>


        <label for="image">Obraz produktu:</label></br>
        <input type="file" name="photo" id="photo" accept=" .png .jpg .jpeg" value="wybierz zdjęcie"></br></br>


        <input class="btn btn-success" type="submit" name="submit" value="Dodaj produkt"></br></br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productType = $_POST['productType'];
        $text = $_POST['text'];
        $image = "image1.png";
        $i = 1;
        while (file_exists("zdj/" . $image)) {
            $i++;
            $image = "image" . $i . ".png";
        }

        $tempName = $_FILES['photo']['tmp_name'];
        $targetFolder = 'zdj/';
        $targetFile = $targetFolder . basename($image);
        move_uploaded_file($tempName, $targetFile);

        $query = 'INSERT INTO produkty (`nazwa`, `cena`, `obraz`,`kategorie_id`, `opis`) VALUES ("' . $productName . '", "' . $productPrice . '", "' . $image . '", "' . $productType . '", "' . $text . '")';


        if (mysqli_query($conn, $query)) {

        } else {
            echo "Error: " . $query . ":-" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);



    ?>
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