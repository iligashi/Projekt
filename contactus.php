<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contactus.css">
    <title>Contact Us</title>
</head>

<body>
    <div class="header-content">
        <header>
            <div class="nav-bar">
                <div class="logo-news">
                    <img src="images/logo.png" />
                    <hr style="width:90%;
                text-align:center;
                color: red ; border: 2px solid;
               ">
                    <div class="line-in-logo"></div>
                </div>
                </head>

               
                    <div class="nav-bar-buttons">
                        <div class="topnav">
                            <a class="active" href="index.php">Home</a>
                            <a href="#news">News</a>
                            <a href="contactus.php">Contact us</a>
                            <!-- <a href="#about">About</a> -->
                        </div>
                        <div class="buttons-nav">
                            <button class="login-btn"><a href="login.php" style="text-decoration: none;color: #e9e9e9c9 !important;
        ;">Log in</a></button>
                            <button class="signup-btn"><a href="signup.php"
                                    style="text-decoration: none; color: black;">Sign up</a></button>
                        </div>
                    </div>
            </div>

    </div>
    </div>
    </div>
    </header>
    <div class="container-contactus" style=" margin-top: 110px; ">
        <h2 style="color: rgb(255, 255, 255) ;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Contact Us</h2>
        <form name="contactUsForm" action="contactusDB.php"  method="POST">        
               <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Your message" rows="6" required></textarea>
            </div>
            <button class="buton" type="submit">Send</button>
        </form>
    </div>
    <br>
    <br>
    <br><br><br><br><br>
    <footer class="footer">
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon">
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        </ul>
        <ul class="menu">
          <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
          <li class="menu__item"><a class="menu__link" href="#">About</a></li>
          <li class="menu__item"><a class="menu__link" href="#">Services</a></li>
          <li class="menu__item"><a class="menu__link" href="#">Team</a></li>
          <li class="menu__item"><a class="menu__link" href="#">Contact</a></li>
    
        </ul>
        <p>2024 Ilaz Gashi | All Rights Reserved</p>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      
      

</body>

</html>