
<?php
$mysqli = new mysqli("localhost", "root", "", "photo");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if ($result = $mysqli->query("SELECT filename FROM photo")) {
    printf("<html>");
    while ($row = $result->fetch_assoc()) {
        printf ('<img src="./img/%s"><br>', $row["filename"]);
    }
    printf("</html>");
    $result->close();
}

$mysqli->close();
?>
