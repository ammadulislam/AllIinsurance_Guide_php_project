<?php
// Start the session
session_start();

// Include Composer's autoload file
require 'vendor/autoload.php'; // Include the MongoDB PHP Library

$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
$databaseName = "madicare";
$collectionName = "madicare";
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
            "dob" => $_POST['dob'],
            "gender" => $_POST['gender'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "zipCode" => $_POST['zipCode'],
            "phoneNo" => $_POST['phoneNo'],
            "email" => $_POST['email'],
            "universal_leadid" => $_POST['universal_leadid'],
            "timestamp" => new MongoDB\BSON\UTCDateTime(), // Current UTC timestamp
            "ipAddress" => getUserIpAddr() // Get user's IP address
        ];

        // Insert the form data into the collection
        $insertResult = $collection->insertOne($formData);

        if ($insertResult->getInsertedCount() == 1) {
            $status = 1;
        } else {
            $status = 2;
        }
    }
} catch (Exception $e) {
    $status = 2;
    error_log("Error: " . $e->getMessage());
}

// Store status in session and redirect
$_SESSION['status'] = $status;
header('Location: medicare.html'); // Redirect back to the form page
exit;
?>
