<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="plik.css">
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
    <form class="formularz" method="post" autocomplete="off"></br></br>
        <label>Login:</label></br>
        <input type="text" class="input" name="login"></br></br>


        <label>Hasło:</label></br>
        <div class="haslo">
            <input class="input1" type="password" name="password" id="password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Hasło musi zawiarać co najmniej jedną małą literę, jedną dużą literę, jeden znak specjalny jedną cyfrę oraz składać się z nimimum 8 liter"
                required>
            <i class="bi bi-eye oko" id="togglePassword" onclick="myFunction()"></i></br></br>
        </div>

        <label>E-mail:</label></br>
        <input type="email" name="email" pattern=".+@gmail.com"></br></br>


        <label>Imie:</label></br>
        <input type="text" class="input" pattern="[a-zA-Z]*" title="Imie nie może zawierać cyfr"
            name="firstName"></br></br>


        <label>Pesel:</label></br>
        <input type="text" name="pesel" maxlength="11" required></br></br>

        <input class="btn btn-success" type="submit" name="submit" value="Zarejestruj"></br></br>
        <a class="link" href="login.php">Masz już konto? Zaloguj się.</a>
    </form>

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

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "l&l";

$conn = mysqli_connect($servername, $username, $password, $database);



if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $pesel = $_POST['pesel'];

    $sql = "INSERT INTO klient (email, login ,password, pesel, imie) VALUES ('$email','$login','$password','$pesel','$firstName')";



    $sql1 = "SELECT * FROM klient WHERE login='$login'";


    if ($userLogin = mysqli_query($conn, $sql1)) {
        $ilu_userow = $userLogin->num_rows;

        if ($ilu_userow > 0) {
            $wiersz = $userLogin->fetch_assoc();
            $_SESSION['login'] = $wiersz['login'];

            $userLogin->free_result();

            echo 'Podany login jest już zajęty';
        } else {
            if (mysqli_query($conn, $sql)) {

                echo 'Poprownie utworzono konto!';
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);
?>
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>