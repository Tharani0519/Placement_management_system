<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "revised"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connected successfully
echo "Connected to the database successfully";
   
if(isset($_POST['submit']))

  
 $Name = $_POST['Fullname'];
 $USN = $_POST['USN'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];
  $Question = $_POST['Question'];
   $Answer = $_POST['Answer']; 
  

   $query = "SELECT * FROM slogin WHERE USN = ?";
   $stmt = $conn->prepare($query);
   
   if (!$stmt) {
       die("Prepare failed: " . $conn->error);
   }
   
   // Bind the USN parameter
   
   $stmt->bind_param("s", $USN);
   
   // Execute the query
   $stmt->execute();
   
   // Get the result
   $result = $stmt->get_result();
   
   // Check if any rows were returned
   if ($result->num_rows > 0) {
       // Rows found, do something
   } else {
       // No rows found
   }
   
   
   
    
   if ($result->num_rows == 0)
 {
  if($repassword == $password)
  {
    
    
    $insertQuery="INSERT INTO slogin(Name, USN ,PASSWORD,Email,Question,Answer) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $Name, $USN, $password, $Email, $Question, $Answer);
        
        if ($stmt->execute()) {
            echo "<center> You have registered successfully...!! Go back to  </center>";
            echo "<center><a href='index.php'>Login here</a> </center>";
        } else {
            echo "<center>Failed to insert data into the database.</center>";
        }
        
        $stmt->close();
    } else {
        echo "<center>Your password does not match</center>";
    }
} else {
    echo "<center>This USN already exists</center>";
}


// Close the statement and connection
  
   $conn->close();
   ?>