<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="plik.css">
  <title>Logowanie</title>
</head>

<body>
  <div class="navMain">
    <div class="nab">
      <a href="sklep.php"> <img src="logonab.png" alt=""></a>
    </div>
    <div class="slang">
      <img src="logoej.png" alt="">
    </div>

  </div>
  <form class="formularz" method="post" autocomplete="off">


    <label>Login:</label></br>
    <input type="text" class="input" name="login" placeholder="Podaj login"></br></br>

    <label>Hasło:</label></br>
    <div class="haslo">
      <input type="password" class="input" name="password" id="password" placeholder="Podaj hasło">
      <i class="bi bi-eye oko" id="togglePassword" onclick="myFunction()"></i></br></br>
    </div>
    <input class="btn btn-success" type="submit" name="submit" value="Zaloguj"></br></br>
  </form>

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

    $sql1 = "SELECT * FROM klient WHERE login='$login' AND password ='$password'";

    if ($userLogin = mysqli_query($conn, $sql1)) {
      $ilu_userow = $userLogin->num_rows;

      if ($ilu_userow > 0) {
        $wiersz = $userLogin->fetch_assoc();
        $_SESSION['login'] = $wiersz['login'];
        $userLogin->free_result();
        header('Location: sklep.php');
      } else {
        echo "<link rel='stylesheet' href='style.css'>";
        echo '</br>';
        echo '<div class="blad">Login lub hasło jest błędne</div>';
      }

    }


    mysqli_close($conn);
  }
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