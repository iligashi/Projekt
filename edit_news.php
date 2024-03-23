<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "db";
 
 $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_news'])) {
    $newsId = $_POST['edit_news'];
    $newTitle = $_POST['new_title'];

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE rubrika SET title='$newTitle' WHERE id='$newsId'";
    if ($conn->query($sql) === TRUE) {
        echo "News title updated successfully";
    } else {
        echo "Error updating news title: " . $conn->error;
    }

    $conn->close();
}
?>
