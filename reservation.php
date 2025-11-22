<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "tastyfood";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $people = $conn->real_escape_string($_POST['people']);

  
    $sql = "INSERT INTO reservations (name, phone, reservation_date, reservation_time, people)
            VALUES ('$name', '$phone', '$date', '$time', '$people')";

    if ($conn->query($sql) === TRUE) {
        
        echo "<script>
                alert('Table reserved successfully! We will see you soon.');
                window.location.href = 'index.html';
              </script>";
    } else {
    
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>