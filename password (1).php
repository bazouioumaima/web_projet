<?php
$pswd = $_POST['password'];
$x = "professor";
$name = $_POST['name'];
$y = "Erraji Elmahdi";

if (($pswd === $x) && ($name === $y)) {
   
    header("Location: number.php");
    exit();
} else {
    
    echo "<script>
            alert('Incorrect password or name. Please try again.');
            window.location.href='professor.php';
          </script>";
}
?>