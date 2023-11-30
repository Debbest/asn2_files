<?php
include 'header.tpl';
?>

<body>
  <div class="col-12 col-a-12">
     <div class="user-data">
       <?php
        if (isset($_SESSION['user'])) {
          echo "<div id='uname'><h4>Researcher: " . $_SESSION['user']['username'] . "</h4></div>";
          echo "<div id='email'><h4>Email: " . $_SESSION['user']['email'] . "</h4></div>";
       }
       ?>
     </div>
  </div>
  <div class="col-12 col-a-12" id="dash-button">
      <?php
      \framework\FormGenerator::createButton('button', 'ViewStudies', 'View All Studies');
      ?>
    </div>

</body>


<<?php
include 'header.tpl';
?>