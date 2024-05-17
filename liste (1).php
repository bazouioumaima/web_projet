
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <link rel="stylesheet" href="test.css">
</head>
<body>
    <div class="container">
        <h2>Present Students</h2> <br><br>

        <?php
         include 'private.php';
         $sql = "SELECT name, Date_pre FROM presence WHERE presence = 'present' AND DATE(Date_pre) = CURDATE()";
         $x = $conn->query($sql);
         $table = '<table class="table">';
         $table .= '<thead>';
         $table .= '<tr>';
         $table .= '<th>Full Name</th>';
         $table .= '<th>Date </th>';
         $table .= '</tr>';
         $table .= '</thead>';
         $table .= '<tbody>';

        if ($x->num_rows > 0) {
            while ($row = $x->fetch_assoc()) {
                $table .= '<tr>';
                $table .= '<td>' . $row['name'] . '</td>';
                $table .= '<td>' . $row['Date_pre'] . '</td>';
                $table .= '</tr>';
            }
        } else {
            $table .= '<tr><td>No present students found.</td></tr>';
        }

        $table .= '</tbody>';
        $table .= '</table>';

        echo $table;

        $conn->close();
        ?>
        
    </div>
    
</body>
</html>
