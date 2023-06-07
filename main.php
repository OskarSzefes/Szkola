<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plik.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
 
    <div class="navMain">
    <a href="./main.php">
    <div class="nab">
        <img src="logonab.png" alt=""> 
        </div>
        <div class="slang">
        <img src="logoej.png" alt=""> 
        </div>   
 
    </div>   
 
 
    <div class="wrap">
  <header>
    <label for="slide-1-trigger">Hand Guns</label>
    <label for="slide-2-trigger">Machine Guns</label>
    <label for="slide-3-trigger">Sniper Rifles</label>
    <label for="slide-4-trigger">Accessories</label>
  </header>
  <input id="slide-1-trigger" type="radio" name="slides" checked>
  <section class="slide slide-one">
    <!-- <h1>Headline One</h1> -->
  </section>
  <input id="slide-2-trigger" type="radio" name="slides">
  <section class="slide slide-two">
    <!-- <h1>Headline Two</h1> -->
  </section>
  <input id="slide-3-trigger" type="radio" name="slides">
  <section class="slide slide-three">
    <!-- <h1>Headline Three</h1> -->
  </section>
  <input id="slide-4-trigger" type="radio" name="slides">
  <section class="slide slide-four">
    <!-- <h1>Headline Four</h1> -->
  </section>
</div>
 
    </div>
 
 
    <div class="blockMain">
    <div class="folders-wrapper">
  <div class="folder" >
    <h2 class="napis1">NEW's</h2>
    <a href="./news.php">
    <img src="nowo.png" class="zdjnowe" alt>
     </div>
  <div class="folder">
  <h2 class="napis1">SHOP</h2>
    <a href="./sklep.php">
    <img src="sklep.png" class="zdjnowe" alt>
    </a>  
  </div>
  <div class="folder">
  <h2 class="napis1">PROMO</h2>
    <img src="piwo.png" class="zdjnowe" alt>
  </div>
</div>
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
 
 
    <script>
 
  var intervalTime = 7500; 
 
 
  var slideTriggers = document.querySelectorAll('[id^="slide-"]');
 
 
  var currentSlideIndex = 0;
 
 
  function showNextSlide() {
 
    var nextSlideIndex = (currentSlideIndex + 1) % slideTriggers.length;
 
 
    slideTriggers[nextSlideIndex].checked = true;
 
 
    currentSlideIndex = nextSlideIndex;
  }
 
 
  setInterval(showNextSlide, intervalTime);
</script>
</body>
</html>