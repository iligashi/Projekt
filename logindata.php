<?php
$email = $_POST ['email'];
$password =$_POST['password'];


$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "db";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $query = "SELECT * FROM user where email='$email' and password='$password'";
    if ($result = $conn->query($query)) {
        $res = null;
        $userId = null;
        while($obj = $result->fetch_object()) {
            $res = $obj->role;
            $userId = $obj->id;
        }
        

        if (isset($res) && $res == 'admin') {
            setcookie("logedInUser", "admin-".$userId, time()+3600, '/');
            header('Location: ./AdminDashboarad.php');
        } elseif( isset($res) && ($res == 'user')) {
            setcookie("logedInUser", $userId, time()+3600, '/');
            header('Location: ./publish-news.php');
        } else {
            echo "<div class=\"non-login-screen\">";
            echo "<p>Please enter valid email and password</p>";
            echo "<button onclick=\"window.location.href='./login.php'\">Go Back</button>";
            echo "</div>";
        }
        $result->close();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error. '
        <button onclick="window.location.href=\'./login.php\'">Go Back</button>';
    }
    $conn->close();
}
?>