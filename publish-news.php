<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>News</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">
    </div>
    <button type="submit">Insert</button>
</form>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
}

form {
    width: 100%;
    max-width: 400px;
    padding: 40px;
    background: linear-gradient(to bottom right, #ffffff, #f3f4f6);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 25px;
}

label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 14px;
    border: 1px solid #d1d8e0;
    border-radius: 10px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="file"]:focus {
    border-color: #4dabf7;
    outline: none;
}

button[type="submit"] {
    background-color: red;
    color: #fff;
    padding: 14px 24px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: red;
}

</style>

</body>
</html>
<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (!empty($_POST['title']) && isset($_FILES['photo'])) {

        $title = $conn->real_escape_string($_POST['title']);
        
        // File upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
  
        if ($_FILES["photo"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                
                // Insert data into database
                $sql = "INSERT INTO rubrika (title, photo) VALUES ('$title', '$target_file')";
                
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php");
                    echo "Content inserted successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Title and photo are required.";
    }
}

$conn->close();
?>
