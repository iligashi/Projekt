<!DOCTYPE html>
<html>
<head>
<title>ADMINDASHBOARD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="AdminDashboard.css">
</head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">News Dashboard</h3>
  <a href="#" class="w3-bar-item w3-button" onclick="showUsers()">Users</a>
  <!-- <a href="#" class="w3-bar-item w3-button" onclick="showUserNews()">News</a> -->
  <a href="#" class="w3-bar-item w3-button" onclick="showBlogForm()">Contact Us</a>
  <a href="#" class="news-col" onclick="showNews()" style="    width: 100%;
    display: block;
    padding: 8px 16px;
    text-align: left;
    border: none;
    white-space: normal;
    float: none;
    outline: 0;
    text-decoration: none;"> News</a>
</div>

<!-- Page Content -->
<div style="margin-left:25%">
<div class="w3-container w3-teal users-header">
  <h1>News</h1>
 <a href="index.php" style="text-decoration: none; color: white;">Back to Homepage</a>
</div>
<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "db";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user'])) {
    $userId = $_POST['edit_user'];
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $sql = "UPDATE user SET name='$firstName', surname='$lastName', email='$email' WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $userId = $_POST['delete_user'];

    $sql = "DELETE FROM user WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

?>



<div id="usersView" class="w3-container p-20" style="display:none">
    <h2>Users</h2>
    <table class="w3-table-all">
        <tr class="w3-light-grey">
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php 
        $sql = "SELECT * FROM user";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<form method='post' action=''>"; // Form for updating user
                    echo "<input type='hidden' name='edit_user' value='" . $row['id'] . "'>";
                    echo "<td><input type='text' name='firstName' value='" . $row['name'] . "'></td>";
                    echo "<td><input type='text' name='lastName' value='" . $row['surname'] . "'></td>";
                    echo "<td><input type='email' name='email' value='" . $row['email'] . "'></td>";
                    echo "<td><button type='submit'>Update</button></td>";
                    echo "<td><button type='submit' name='delete_user' value='" . $row['id'] . "'>Delete</button></td>"; // Delete button
                    echo "</form>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            $result->free();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
            error_log($error_message); 
            die($error_message);
        }
        ?>
    </table>
</div>


<script>
function editUser(userId) {
    // Get user data
    var firstName = document.getElementById('firstName-' + userId).innerText;
    var lastName = document.getElementById('lastName-' + userId).innerText;
    var email = document.getElementById('email-' + userId).innerText;

    // Prompt for editing
    var newFirstName = prompt("Enter new first name:", firstName);
    if (newFirstName != null) {
        var newLastName = prompt("Enter new last name:", lastName);
        if (newLastName != null) {
            var newEmail = prompt("Enter new email:", email);
            if (newEmail != null) {

                document.getElementById('firstName-' + userId).innerText = newFirstName;
                document.getElementById('lastName-' + userId).innerText = newLastName;
                document.getElementById('email-' + userId).innerText = newEmail;
            }
        }
    }
}

function deleteUser(userId) {

    if (confirm("Are you sure you want to delete this user?")) {

        var row = document.getElementById('user-' + userId);
        row.parentNode.removeChild(row);
    }
}
</script>


<div id="userMessagesView" class="w3-container p-20" style="display:none">
<h2>User Messages</h2>
<table class="w3-table-all">
    <tr class="w3-light-grey">
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
    </tr>
    <?php 
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "db";
      
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM messages";
      $result = $conn->query($sql);
      if ($result) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>" . $row['Name'] . "</td>
                <td>" . $row['Email'] . "</td>
                <td>" . $row['Password'] . "</td>
              </tr>";
          }
        } else {
            echo "No results found.";
        }
        
          $result->free();
      } else {
          $error_message = "Error: " . $sql . "<br>" . $conn->error;
          error_log($error_message); // Log the error
          die($error_message);
      }
      
      $conn->close();
    
    ?>
  </table>
</div>

<div id="blogView" class="w3-container p-20" style="display:none">
<h2>Contact Us</h2>
<table class="w3-table-all">
    <tr class="w3-light-grey">
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
    </tr>
    <?php 
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "db";
      
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM messages";
      $result = $conn->query($sql);
      if ($result) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['message'] . "</td>
              </tr>";
          }
        } else {
            echo "No results found.";
        }
        
          $result->free();
      } else {
          $error_message = "Error: " . $sql . "<br>" . $conn->error;
          error_log($error_message); // Log the error
          die($error_message);
      }
      
      $conn->close();
    
    ?>
  </table>
  
</div>

<div id="NewsView" class="p-20" style="display:none" >
<table class="w3-table-all">
    <?php 
      $host = "localhost";
      $dbUsername = "root";
      $dbPassword = "";
      $dbname = "db";
      
      $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "SELECT * FROM rubrika";
      $result = $conn->query($sql);
      if ($result) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="rubrika">';
            echo '<img src="' . $row["photo"] . '" alt="" class="img-new">';
            echo '<div class="views_date">';
            echo '<p>' . $row["title"] . '</p>';
            echo '</div>';
            echo '<div class="actions">';
            echo '<button class="edit-btn" onclick="editNews(' . $row["id"] . ')">Edit</button>';
            echo '<button class="delete-btn" onclick="deleteNews(' . $row["id"] . ')">Delete</button>';
            echo '</div>';
            echo '</div>';
          }
        } else {
            echo "No results found.";
        }
        
          $result->free();
      } else {
          $error_message = "Error: " . $sql . "<br>" . $conn->error;
          error_log($error_message);
          die($error_message);
      }
      
      $conn->close();
    
    ?>
  </table>
  <?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "db";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_news'])) {
        // Handle editing news title
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
    } elseif (isset($_POST['delete_news'])) {
        // Handle deleting news
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
}
?>

<script>
function editNews(newsId) {
    var newTitle = prompt("Enter the new title:");
    if (newTitle !== null) {
        var formData = new FormData();
        formData.append('edit_news', newsId);
        formData.append('new_title', newTitle);

        fetch('edit_news.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Display response message
            // Reload the page to update the news list
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

function deleteNews(newsId) {
    if (confirm('Are you sure you want to delete this news?')) {
        var formData = new FormData();
        formData.append('delete_news', newsId);

        fetch('delete_news.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); 
            location.reload();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}
</script>

  <style>

  #NewsView {
    display: none;
    padding: 20px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  .rubrika {
    margin-bottom: 20px;
  }
  .rubrika img {
    max-width: 100px;
    height: auto;
    margin-right: 10px;
    border-radius: 5px;
  }
  .rubrika .views_date {
    display: flex;
    align-items: center;
  }
  .rubrika .views_date p {
    margin: 0;
  }
  .rubrika .actions {
    margin-top: 10px;
  }
  /* CSS for edit and delete buttons */
.actions {
    display: flex;
    gap: 10px; /* Adjust the space between buttons */
}

.edit-btn, .delete-btn {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.delete-btn {
    background-color: #f44336;
}

.edit-btn:hover, .delete-btn:hover {
    background-color: #45a049;
}

.edit-btn:focus, .delete-btn:focus {
    outline: none;
}

</style>
</div>

<script>
function showUsers() {
  document.getElementById('usersView').style.display = 'block';
  document.getElementById('userMessagesView').style.display = 'none';
  document.getElementById('blogView').style.display = 'none';
}

function showUserNews() {
  document.getElementById('usersView').style.display = 'none';
  document.getElementById('userMessagesView').style.display = 'block';
  document.getElementById('blogView').style.display = 'none';
  document.getElementById('NewsView').style.display = 'none';

}

function showBlogForm() {
  document.getElementById('usersView').style.display = 'none';
  document.getElementById('userMessagesView').style.display = 'none';
  document.getElementById('blogView').style.display = 'block';
  document.getElementById('NewsView').style.display = 'none';

}
function showNews(){
  document.getElementById('usersView').style.display = 'none';
  document.getElementById('userMessagesView').style.display = 'none';
  document.getElementById('blogView').style.display = 'none';
  document.getElementById('NewsView').style.display = 'block';

}
document.addEventListener('DOMContentLoaded', function() {
  showUsers();
});
</script>


</body>
</html>
