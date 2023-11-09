<?php

  // DB
  include 'config/config.php';
  
  // Close Session
  session_start();
  session_unset();
  session_destroy();
  
  // Redirection
  echo '<script>
          alert("You have successfully logged out!");
          window.location.replace("http://localhost/PHP_Authentication/");
        </script>';

?>