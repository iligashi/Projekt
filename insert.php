<?php
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pswd'];

if (!empty($txt) || !empty($email) || !empty($pswd)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "db";
    
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $INSERT = "INSERT INTO user (name, email, password, role) VALUES ('$name','$email', '$password', 'user')";
        
        if ($conn->query($INSERT) === TRUE) {
            setcookie("logedInUser", 'registered', time()+3600, '/');
            header('Location: ./publish-news.php');
        } else {
            echo "Error: " . $INSERT . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>

