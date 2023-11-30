<?php
include 'header.tpl';
?>
  <body>
    <div class="col-12 col-a-12">
      <!-- Create Register form using form generator-->
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
      FormGenerator::startForm('register.php', 'post', 'register', 'register');
      FormGenerator::hiddenInput('register');
      FormGenerator::createInput('username', 'username', 'Username', 'username', 'Username', true);
      FormGenerator::createInput('email', 'email', 'Email', 'email@email.com', 'Email Address', true);
      FormGenerator::createInput('email2', 'email2', 'Email2', 'email@email.com', 'Confirm Email Address', true);
      FormGenerator::createInput('password', 'password', 'Password', 'password', 'Password', true);
      FormGenerator::createInput('password', 'password2', 'Password2', 'password', 'Confirm Password', true);
      echo '<div class="col-2 col-a-2">';
      FormGenerator::createButton('submit', 'submit', 'Register');
      FormGenerator::createButton('reset', 'reset', 'Reset');
      echo '</div>';
      FormGenerator::endForm();
      echo '</div>';
      ?>

    </div>
  </body>

<?php
include 'footer.tpl';
?>