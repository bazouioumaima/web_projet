
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presence</title>
   <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
    <form action="student.php" method="post">
    
        <div class="cnt"><input type="text" id="name" name="name" placeholder="Name" required>
        <input type="number" name="nombre"  placeholder="Insert The Correct Number"></div>
         <div class="radio-input" >
  <input value="present" name="presence" id="value-1" type="radio" required>
  <label for="value-1">Present</label>
  <input value="abscent" name="presence" id="value-2" type="radio" required>
  <label for="value-2">Abscent</label>

  <div><input type="submit" id="submit" class="button" value="Submit"></div>
    </form></div>

</div>
       
    <?php
include 'private.php';



$reqprofnumber = "SELECT profnumber FROM professor WHERE id=1";
$res = $conn->query($reqprofnumber);


$row = $res->fetch_assoc();
$profnumber = $row['profnumber'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $presence = $_POST['presence'];
    $number = $_POST['nombre'];

    if (!empty($name)) {

        $x = "SELECT * FROM presence WHERE name='$name'";
        $y = $conn->query($x);
        
        if ($y->num_rows > 0) {
            echo "<script>alert('Name already exists in the database.');</script>"; 
            return false;
        } 
        else {
            if ($number == $profnumber) {
                $insert_query = "INSERT INTO presence (name, presence) VALUES ('$name', '$presence')";
            } else {
                $insert_query = "INSERT INTO presence (name, presence) VALUES ('$name', 'abscent')";
            }

            if ($conn->query($insert_query) === TRUE) {
                echo "<script>alert('Record inserted successfully!');
                      window.location.href='wlc.html';</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Name cannot be empty. Please enter your name.');</script>";
    }
}

$conn->close();
?>


</body>
</html>


