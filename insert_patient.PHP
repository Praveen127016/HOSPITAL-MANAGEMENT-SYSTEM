<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get values from form safely
  $patient_id = $_POST['patient_id'] ?? null;
  $room_id = $_POST['room_id'] ?? null;
  $firstname = $_POST['firstname'] ?? '';
  $lastname = $_POST['lastname'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $address = $_POST['address'] ?? '';
  $city = $_POST['city'] ?? '';
  $state = $_POST['state'] ?? '';
  $zipcode = $_POST['zipcode'] ?? '';
  $allergies = $_POST['allergies'] ?? '';
  $chronicdiseases = $_POST['chronicdiseases'] ?? '';
  $OtherHealthConcerns = $_POST['OtherHealthConcerns'] ?? '';
  $policy_number = $_POST['policy_number'] ?? '';
  $PharmacyId = $_POST['PharmacyId'] ?? '';

  // Create MySQL connection
  $conn = new mysqli('localhost', 'root', '123456pk', 'HMS');

  // Check connection
  if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }

  // Prepare and bind the SQL statement
  $stmt = $conn->prepare("INSERT INTO patient (patient_id, room_id, firstname, lastname, email, phone, address, city, state, zipcode, allergies, chronicdiseases, OtherHealthConcerns, policy_number, PharmacyId) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->bind_param("iisssssssssssss",
    $patient_id, $room_id, $firstname, $lastname, $email, $phone,
    $address, $city, $state, $zipcode, $allergies, $chronicdiseases,
    $OtherHealthConcerns, $policy_number, $PharmacyId
  );

  // Execute the statement
  if ($stmt->execute()) {
    echo "✅ Patient data successfully inserted.";
  } else {
    echo "❌ Error: " . $stmt->error;
  }

  // Close resources
  $stmt->close();
  $conn->close();

} else {
  echo "❌ Please submit the form using POST method.";
}
?>
