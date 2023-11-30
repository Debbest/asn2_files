<?php
include 'header.tpl';
?>

<body>
  <div class="col-12 col-a-12">
      <!-- Create Login form using form generator-->
    <?php
      use framework\FormGenerator;

      if (isset($_SESSION['errors'])) {
        echo "<div class='errors'>";
        foreach ($_SESSION['errors'] as $error => $message) {
        echo "<h3> $message </h3>";
        }
      echo "</div>";
      unset($_SESSION['errors']);
     }

    echo '<div class="form-container">';
      //include 'loginError.tpl.php';
      FormGenerator::startForm('login.php', 'post', 'login', 'login');
      FormGenerator::hiddenInput('login');
      FormGenerator::createInput('email', 'email', 'Email', 'email@email.com', 'Email Address', true);
      FormGenerator::createInput('password', 'password', 'Password', 'password', 'Password', true);
      echo '<div class="col-2 col-a-2">';
      FormGenerator::createButton('submit', 'submit', 'Login', 'submit', 'Login');
      FormGenerator::createButton('reset', 'reset', 'Reset', 'reset', 'Reset');
      echo '</div>';
      FormGenerator::endForm();
      echo '</div>';
    ?>

  </div>
</body>
<?php
 include 'footer.tpl';
?>
