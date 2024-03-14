<?php
// Database connection settings
$db_name = 'your_database_name.accdb'; // Change this to your Access database filename
$db_path = 'C:/path/to/your/database/' . $db_name; // Change this to your database file path

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$type = $_POST['type'];
$events = implode(',', $_POST['events']);
$single_event = isset($_POST['single_event']) ? 'Yes' : 'No';

// Connect to the database
$conn = new COM('ADODB.Connection');
$connStr = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=$db_path";
$conn->Open($connStr);

// Insert data into the database
$sql = "INSERT INTO Participants (Name, Email, Type, Events, SingleEvent) VALUES ('$name', '$email', '$type', '$events', '$single_event')";
$conn->Execute($sql);

// Close the connection
$conn->Close();

// Redirect back to the form with a success message
header('Location: tournament_form.html?success=1');
exit();
?>
