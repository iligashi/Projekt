<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="news.css">
    <title>News</title>
</head>
<body>
  <div class="header-contentt" style=" background-color: #00000096;
  width: 100%;">
    <header>
        <div  class="nav-bar">
            <div class="logo-news">
                <img src="images/logo.png"/>
                <hr style="width:90%;
                text-align:center;
                color: red ; border: 2px solid;
               ">
                <div class="line-in-logo"></div>
            </div>
  </head>
  <body>
  <div class="nav-bar-buttons">
  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="#news">News</a>
    <a href="contactus.php">Contact</a>
  </div>
  <div class="buttons-nav">
    <button class="login-btn" ><a href="login.php" style="text-decoration: none;color: #fffffff5 !important;
        ;">Log in</a></button>
    <button class="signup-btn"><a href="signup.php" style="text-decoration: none; color: black;" >Sign up</a></button>
  </div>
</div>
</div>
</div>
<br>
<br>
<!-- <div class="slider-form-fix"> -->
    <div class="slider">
      <div class="slide active">
        <img src="images/breaking-news.jpg" alt="Image 1" />
      </div>
      <div class="slide">
        <img src="images/sportnews.jpg" alt="Image 2" />
      </div>
      <div class="slide">
        <img src="images/health-news.jpg" alt="Image 3" />
      </div>
    </div>
    <style>
        .slider {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    position: relative;
    border-radius: 10px;
    box-shadow: -1px 15px 20px 5px rgb(255 0 0);
}

.slide {
  display: none;
}

.slide.active {
  display: block;
  animation: slideIn 1s ease-in-out forwards;
}

@keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
  
}

    </style>

  <br><br><br>
 <div id="news">
  <div class="fotografit">
    <div class="rubrika">
        <img src="images/breaking-news.jpg" alt="" class="img-0">
        <div class="views_date">
            <p style="font-weight: 700;
            font-size: 20px;
            font-family: system-ui;
            color: rgb(74 87 83);
            background: #FFFFFF;
    box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.10);
    border-radius: 20px;">Breaking News</p>
           
        </div>
    </div>
    <style>
    
  .rubrika {
    display: flex;
    align-items: center;
    max-width: 600px;
    margin: 50px auto;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .rubrika:hover {
    transform: translateY(-5px);
  }

  .rubrika img {
    max-width: 300px;
    height: auto;
    /* border-top-left-radius: 20px;
    border-bottom-left-radius: 20px; */
    object-fit: cover;
  }

  .views_date {
    /* padding: 20px; */
    background-color: #fff;
    flex-grow: 1;
    /* border-top-right-radius: 20px;
    border-bottom-right-radius: 20px; */
  }

  .rubrika p {
    margin: 0;
    font-weight: 700;
    font-size: 20px;
    color: #4a5753;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .rubrika p:before {
    content: '';
    display: block;
    width: 20px;
    height: 4px;
    background-color: #4a5753;
    margin-bottom: 10px;
  }
  
  
    </style>
    <div class="rubrika">
        <img src="images/fashion news.webp" alt="" class="img-6">
        <div class="views_date">
            <p >Fashion News</p>
        </div>
    </div>
    <div class="rubrika">
        <img src="images/health-news.jpg" alt="" class="img-1">
        <div class="views_date">
            <p>Health News</p>
        </div>
    </div>
    <div class="rubrika">
        <img src="images/lifestyle-news.jpg" alt="" class="img-3">
        <div class="views_date">
            <p>Fashion News</p>
        </div>
    </div>
    <div class="rubrika">
        <img src="images/socialmedia-news.png" alt="" class="img-4">
        <div class="views_date">
            <p>Social Media</p>
        </div>
    </div>
    <div class="rubrika">
        <img src="images/sportnews.jpg" alt="" class="img-5">
        <div class="views_date">
            <p>Sport News</p>
        </div>
    </div>

  <?php
  $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "db"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from database
    $sql = "SELECT title, photo FROM rubrika ORDER BY id DESC"; // Assuming 'id' is the primary key
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="rubrika">';
            echo '<img src="' . $row["photo"] . '" alt="" class="img-new">';
            echo '<div class="views_date">';
            echo '<p>' . $row["title"] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No news found.";
    }


    $conn->close();
    ?>
    
    </div>
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
  
  
  

  <script src="news.js"></script>
  </body>
  </html>
  
