<?php
require 'vendor/autoload.php'; // Include the MongoDB PHP Library

$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
$databaseName = "aca";
$collectionName = "aca";
$status = 0;
// Function to get the user's IP address
function getUserIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // IP address from remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

try {
    // Create a new MongoDB client
    $client = new MongoDB\Client($mongoUrl);

    // Select the database and collection
    $database = $client->$databaseName;
    $collection = $database->$collectionName;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $formData = [
            "fname" => $_POST['fname'],
            "lname" => $_POST['lname'],
            "gender" => $_POST['gender'],
            "dob" => $_POST['dob'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "zipCode" => $_POST['zipCode'],
            "phoneNo" => $_POST['phoneNo'],
            "email" => $_POST['email'],
            'universal_leadid' => $_POST['universal_leadid'],
            "timestamp" => new MongoDB\BSON\Timestamp(time(), 0),
            "ipAddress" => getUserIpAddr()  // Include the user's IP address
        ];

         // Insert data into MongoDB
         $result = $collection->insertOne($formData);

         // Redirect back to form with status parameter
         $status = $result->getInsertedCount() > 0 ? 1 : 0;
         header("Location: autoform.php?status=$status");
         exit();
    }
} catch (Exception $e) {
    $status = 2;
    error_log("Error: " . $e->getMessage());
}

// Store status in session and redirect
$_SESSION['status'] = $status;
header('Location: medicare.php'); // Redirect back to the form page
exit;
?>
