<?php 
    include_once 'session.php';
    include_once 'mail.php';
  
    $_SESSION['reg_email'] = $_POST['email'];
    $_SESSION['reg_name'] = $_POST['name'];
    $_SESSION['reg_password'] = $_POST['password'];
    $_SESSION['reg_phone'] = $_POST['sdt'];
    $_SESSION['reg_gender'] = $_POST['gender'];
    $_SESSION['reg_birth'] = $_POST['birth'];

    sendMail($_SESSION['reg_email']);
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Otp-Verification</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/verification.css" />
  </head>
  <body>
    <div class="d-flex justify-content-center align-items-center continer" style="margin-top: 100px;">
      <div class="card py-5 px-3">
        <h5 class="m-0 align-items-center">Email verification</h5>
        <span class="mobile-text"
          ><b>Enter the code we just sent on your email</b>
          <b class="text-color">Your email</b>
        </span>
        <form action="create.php" method="post">
        <div class="d-flex flex-row mt-5">
          <input name="num1" type="text" class="form-control inputs" maxlength="1" autofocus="" />
          <input name="num2" type="text" class="form-control inputs" maxlength="1"/>
          <input name="num3" type="text" class="form-control inputs" maxlength="1" />
          <input name="num4" type="text" class="form-control inputs" maxlength="1"/>
          <input name="num5" type="text" class="form-control inputs" maxlength="1"/>
          <input name="num6" type="text" class="form-control inputs" maxlength="1"/>
          
         <!-- <input hidden value="" oninput="num1.value+num2.value+num3.value+num4.value+num5.value+num6.value" /> -->

        </div>
        <h2>
          
        </h2>
        <button type="submit">send</button>
        </form>
        <div class="text-center mt-5">
          <span class="d-block mobile-text" id="countdown"></span>
          <span class="d-block mobile-text" id="resend"></span>
        </div>
      </div>
    </div>
    <script src="js/main.js"></script>
  </body>
</html>
