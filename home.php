<?php
// Include Composer's autoload file
require __DIR__ . '/vendor/autoload.php';

// MongoDB connection details
$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
$databaseName = "homeinsurance";
$collectionName = "homeinsurance";
$status = 0;

// Function to get the user's IPv4 address
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
    // Validate IP address (optional)
    $ip = filter_var($ip, FILTER_VALIDATE_IP) ? $ip : '';
    return $ip;
}

// Connect to MongoDB
try {
    $client = new MongoDB\Client($mongoUrl);
    $collection = $client->$databaseName->$collectionName;

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $formData = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'dob' => $_POST['dob'],
            'homesize' => $_POST['homesize'],
            'ownership' => $_POST['ownership'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zipCode' => $_POST['zipCode'],
            'phoneNo' => $_POST['phoneNo'],
            'email' => $_POST['email'],
            'universal_leadid' => $_POST['universal_leadid'],
            'xxTrustedFormCertUrl' => $_POST['xxTrustedFormCertUrl'],
            'timestamp' => new MongoDB\BSON\UTCDateTime(),
            'ipAddress' => getUserIpAddr()  // Include the user's IPv4 address
        ];

        // Insert data into MongoDB
        $result = $collection->insertOne($formData);

        // Redirect back to form with status parameter
        $status = $result->getInsertedCount() > 0 ? 1 : 0;
        header("Location: homeform.php?status=$status");
        exit();
    }
} catch (Exception $e) {
    // Handle MongoDB connection errors
    echo 'Error: ' . $e->getMessage();
}
?>
