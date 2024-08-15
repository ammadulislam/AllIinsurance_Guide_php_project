<?php
// Include Composer's autoload file
require __DIR__ . '/vendor/autoload.php';

session_start(); // Start the session for storing status

// MongoDB connection details
$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
$databaseName = "auto";
$collectionName = "auto";

// Function to get the user's IPv4 address
function getUserIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $ip = filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '';
    return $ip;
}

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Connect to MongoDB
try {
    $client = new MongoDB\Client($mongoUrl);
    $collection = $client->$databaseName->$collectionName;

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate form data
        $formData = [
            'fname' => sanitizeInput($_POST['fname']),
            'lname' => sanitizeInput($_POST['lname']),
            'dob' => sanitizeInput($_POST['dob']),
            'make' => sanitizeInput($_POST['make']),
            'model' => sanitizeInput($_POST['model']),
            'year' => sanitizeInput($_POST['year']),
            'address' => sanitizeInput($_POST['address']),
            'city' => sanitizeInput($_POST['city']),
            'state' => sanitizeInput($_POST['state']),
            'zipCode' => sanitizeInput($_POST['zipCode']),
            'phoneNo' => sanitizeInput($_POST['phoneNo']),
            'email' => filter_var(sanitizeInput($_POST['email']), FILTER_VALIDATE_EMAIL) ? sanitizeInput($_POST['email']) : '',
            'universal_leadid' => sanitizeInput($_POST['universal_leadid']),
            'xxTrustedFormCertUrl' => sanitizeInput($_POST['xxTrustedFormCertUrl']),
            'timestamp' => new MongoDB\BSON\UTCDateTime(),
            'ipAddress' => getUserIpAddr()
        ];

        // Insert data into MongoDB
        $result = $collection->insertOne($formData);

        // Redirect back to form with status parameter
        $status = $result->getInsertedCount() > 0 ? 1 : 0;
        header("Location: autoform.php?status=$status");
        exit();
    }
} catch (Exception $e) {
    // Handle MongoDB connection errors
    echo 'Error: ' . $e->getMessage();
}
?>
