<?php

// Database
include "config/config.php";

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['forgot'])) {
  // Function to validate POST data
  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Validating user inputs
  $loginemail = validate($_POST['loginemail']);

  // Fetching account info
  $sql = "SELECT * FROM `users` WHERE `loginemail`='$loginemail'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['loginemail'] === $loginemail) {
      // Fetch the Username
      $username = $row['username'];

      // Generate random 8-digit Password with alphabets and numbers 
      $pass = bin2hex(openssl_random_pseudo_bytes(4));

      // Mail the password to the user using PHPMailer
      $mail = new PHPMailer(true);
      $mail->IsSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = ''; // Your Email Address
      $mail->Password = ''; // App Password of your Email Address
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      $mail->SMTPDebug = 3;
      $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
      $mail->SetFrom(''); // Your desired Email Address that will be used as the sender
      $mail->AddAddress($row['loginemail']);
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'Temporary Password for Login to Dashboard System';
      $mail->Body = 'Temporary Password for <strong>' . $username . '</strong> - <strong>' . $pass . '</strong>.';
      $mail->IsHTML(true);

      if (!$mail->send()) {
        echo '<script>
                  alert("' . $mail->ErrorInfo . '");
                  window.location.replace("http://localhost/PHP_Authentication/forgot-password.php");
              </script>';
      } else {
        // Store this temporary password in the database;
        $tempPassword = md5($pass);
        $sql2 = "UPDATE `users` SET `password`='$tempPassword' WHERE `loginemail`='$loginemail'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
          echo '<script>
                    alert("Temporary password has been sent to your registered email address. Please change it after logging in!");
                    window.location.replace("http://localhost/PHP_Authentication/");
                </script>';
        } else {
          echo '<script>
                    alert("SQL Error!");
                    window.location.replace("http://localhost/PHP_Authentication/forgot-password.php");
                </script>';
          exit();
        }
      }
    } else {
      echo '<script>
                alert("Incorrect Credentials!");
                window.location.replace("http://localhost/PHP_Authentication/forgot-password.php");
            </script>';
      exit();
    }
  } else {
    echo '<script>
              alert("Unregistered Credentials");
              window.location.replace("http://localhost/PHP_Authentication/forgot-password.php");
          </script>';
    exit();
  }
} else {
  header('Location: http://localhost/PHP_Authentication');
}
