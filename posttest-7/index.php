<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Filmefy</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <div>
          <h1>Filmefy</h1>
      </div>
      <?php
      require("navbar.php"); 
      ?>
  </header>
   
  <main>
    <div class="container_am">
      <div id="about_me_section" class="textbox" >
        <p class="centertext">halo nama saya Demosa Guardy Nugroho dengan NIM 2309106026 dari kelas A2</p>
      </div>
    </div>
    <div class="container">
      <div class="menu">
        <b>Recently watch</b>
        <ul>
          <li>
            <img src="asset/Kiki's Delivery Service.jpg" alt="kiki"><br>
            Kiki's Delivery Service
          </li>
          <li>
            <img src="asset/hashira arc.jpg" alt="hashira"><br>
            Demon Slayer: Hashira Training
          </li>
          <li>
            <img src="asset/totoro.jpg" alt="totoro"><br>
            My Neighbor Totoro
          </li>
        </ul>
      </div>
    </div>
    <div class="container">
      <div class="menu">
        <b>Horror Night</b>
        <ul>
          <li>
            <img src="asset/Sinister2.jpg" alt="sinister"><br>
            Sinister 2
          </li>
          <li>
            <img src="asset/conjuring.jpg" alt="conjuring"><br>
            The Conjuring
          </li>
        </ul>
      </div>
      <div class="container">
        <div class="menu">
          <b>Lagi Santai Kawan</b>
          <ul>
            <li>
              <img src="asset/barakamon.jpg" alt="barakamon"><br>
              Barakamon
            </li>
            <li>
              <img src="asset/gauss.jpg" alt="gaus"><br>
              Gaus Electronics
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>

   <footer>
    <p>© 2024 Filmefy. All rights reserved.</p>
    <p>Follow us: <a href="#">Facebook</a> | <a href="#">Instagram</a></p>
  </footer>

  <script text="text/javascript" src="script.js"></script>
  </body>
</html>