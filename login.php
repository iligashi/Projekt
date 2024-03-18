<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>News</title>
  <link rel="stylesheet" href="login.css">
  <style>
    .h1{
      text-decoration: none;
    }
  </style>
</head>

<body id="login">
  <div class="container flex">
    <div class="scannova-page flex">
      <div class="text-scanova-login">
      <h1><a href="index.php" style="text-decoration: none;   color: #f21818;
            font-size: 4rem;
            margin-bottom: 10px;">News</a></h1>
        <p>News 24/7 </p>
        <p> Fastest way to get to news 24/7</p>
      </div>
      <form class="form-login" id="login-form" name="loginForm" action="logindata.php" method="POST">
        <input id="email" name="email" type="email" placeholder="Email or phone number" required>
        <input id="password" type="password" name="password" placeholder="Password" required>
        <div class="link-scanova-login">
          <button type="submit"  class="login" >Login</button>
          <p id="invalid-username"></p>
         
        </div>
        <hr>
        <div class="button-login1">
          <a href="signup.php">Create new account</a>
        </div>
      </form>
    </div>
  </div>
  <script src="login.js"></script>
</body>

</html>