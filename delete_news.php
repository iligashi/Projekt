<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "db";
 
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_news'])) {
    $newsId = $_POST['delete_news'];

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM rubrika WHERE id='$newsId'";
    if ($conn->query($sql) === TRUE) {
        echo "News deleted successfully";
    } else {
        echo "Error deleting news: " . $conn->error;
    }

    $conn->close();
}
?>
