<?php
$conn = new mysqli("localhost", "usuario", "senha", "sharpgearlauncher_db");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM games";
$result = $conn->query($sql);

$jogos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jogos[] = $row;
    }
}

$conn->close();
?>
