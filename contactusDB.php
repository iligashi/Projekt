<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (!empty($name) || !empty($email) || !empty($message)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "db";
    
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $INSERT = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
        if ($conn->query($INSERT) === TRUE) {
            $to = 'news@gmail.com';
            $subject = "NEWS notification";
            $headers = "From: $email";
            $mailSuccess = mail($to, $subject, $message, $headers);
            setcookie("message", 'sent', time()+3600, '/');
            header('Location: contactUs.php');
        } else {
            echo "Error: " . $INSERT . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
?>

