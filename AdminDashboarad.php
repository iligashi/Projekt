<!DOCTYPE html>
<html>
<title>ADMINDASHBOARD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="AdminDashboard.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">News Dashboard</h3>
  <a href="#" class="w3-bar-item w3-button" onclick="showUsers()">Users</a>
  <a href="#" class="w3-bar-item w3-button" onclick="showUserMessages()">User Messages</a>
  <a href="#" class="w3-bar-item w3-button" onclick="showBlogForm()">Contact Us</a>

</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-teal users-header">
  <h1>News</h1>
 <a href="index.php" style="text-decoration: none; color: white;">Back to Homepage</a>
</div>

<div id="usersView" class="w3-container p-20" style="display:none">
<h2>Users</h2>
<table class="w3-table-all">
    <tr class="w3-light-grey">
      <th>Data</th>
      <th>Autori</th>
      <th>Titulli</th>
      <th>Pershkrimi</th>
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
      
      $sql = "SELECT * FROM user";
      $result = $conn->query($sql);
      if ($result) {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
              <tr>
                <td>" . $row['text'] . "</td>
                <td>" . $row['Autori'] . "</td>
                <td>" . $row['Titulli'] . "</td>
                <td>" . $row['Pershkrimi'] . "</td>

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
                <td>" . $row['txt'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['pswd'] . "</td>
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
      blogView
    ?>
  </table>
</div>
<div id="blogView" class="w3-container p-20" style="display:none">
<h2>User Messages</h2>
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


<script>
function showUsers() {
  document.getElementById('usersView').style.display = 'block';
  document.getElementById('userMessagesView').style.display = 'none';
  document.getElementById('blogView').style.display = 'none';
}

function showUserMessages() {
  document.getElementById('usersView').style.display = 'none';
  document.getElementById('userMessagesView').style.display = 'block';
  document.getElementById('blogView').style.display = 'none';
}

function showBlogForm() {
  document.getElementById('usersView').style.display = 'none';
  document.getElementById('userMessagesView').style.display = 'none';
  document.getElementById('blogView').style.display = 'block';
}
document.addEventListener('DOMContentLoaded', function() {
  showUsers();
});
</script>

</body>
</html>
