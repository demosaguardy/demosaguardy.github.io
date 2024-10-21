<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<nav>
  <ul class="links">
    <li><a href="index.php">Home</a></li>
    <li>Genre</li>
    <li id="about_me_btn">About Me</li>
    <li>
      <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) : ?>
        <a href="logout.php" class="button">
          Logout
        </a>
      <?php else : ?>
        <a href="login.php" class="button">
          Login
        </a>
      <?php endif; ?>
    </li>
    <li><a href="rekomen.php">User's Favorite</a></li>
    <li><img src="asset/sun.png" id="icon"></li>
  </ul>

  <div class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</nav>