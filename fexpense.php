<?php
// Include Composer's autoload file
require __DIR__ . '/vendor/autoload.php';

// MongoDB connection details
$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
$databaseName = "fexpense";
$collectionName = "fexpense";
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

// Connect to MongoDB
try {
    $client = new MongoDB\Client($mongoUrl);
    $collection = $client->$databaseName->$collectionName;

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get current timestamp
        $currentTimestamp = new MongoDB\BSON\UTCDateTime();

        // Get form data
        $formData = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'gender' => $_POST['gender'],
            'dob' => $_POST['dob'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zipCode' => $_POST['zipCode'],
            'phoneNo' => $_POST['phoneNo'],
            'email' => $_POST['email'],
            'universal_leadid' => $_POST['universal_leadid'],
            'timestamp' => $currentTimestamp, // Add timestamp field
            'ipAddress' => getUserIpAddr() // Add IP address field
        ];

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
header('Location: home.html'); // Redirect back to the form page
exit;
?>
