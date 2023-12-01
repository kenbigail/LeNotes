<?php 
// Configure and Identify the Databases
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stikenotes";

// identify the mysqli
$con = new mysqli($servername, $username, $password, $dbname);
// if connection error then give a message
if ($con->connect_error) {
    die ("failed to connect" . $con->connect_error);
}

// Display Notes Data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM notes";
    $result = $con->query($sql);

    $notes = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $notes[] = $row;
        }
    }
    // convert data to JSON so we can make it into an API
    echo json_encode($notes);

// Server Request METHOD POST (from the Index JS)
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $note = $data->notes;

    // create the Insert Query on SQL
    $sql = "INSERT INTO notes (note_fill) VALUES ('$note')";
    $con->query($sql); 

// Server Request METHOD DELETE (from Index JS)
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Identify the PHP ID
    $id = $_GET['id'];

    // create the Delete Query on SQL
    $sql = "DELETE FROM notes WHERE id = $id";
    $con->query($sql);
}
?>