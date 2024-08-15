<?php
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require __DIR__ . '/vendor/autoload.php'; // Include Composer's autoload file

// MongoDB connection details
$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority";
$databaseName = "finalexpense";
$collectionName = "finalexpense";
// Connect to MongoDB
try {
    $client = new MongoDB\Client($mongoUrl);
    $db = $client->selectDatabase($databaseName);
    $collection = $db->selectCollection($collectionName);

    // Query MongoDB collection
    $cursor = $collection->find();

} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Error connecting to MongoDB: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        header, .footer {
            background-color: #ff69b4; /* Pink color */
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .row-odd {
            background-color: #f9f9f9;
        }
        .row-even {
            background-color: #fff;
        }
    </style>
    <script>
    function sendData(api, rowData) {
        fetch(api, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(rowData),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            alert('API Response:\n' + JSON.stringify(data));
            console.log('Success:', data);
        })
        .catch((error) => {
            alert('Error sending data to API:\n' + error.message);
            console.error('Error:', error);
        });
    }

    function handleLinkClick(api, row, action) {
        const rowData = {
            id: row.cells[0].innerText,
            fname: row.cells[1].innerText,
            lname: row.cells[2].innerText,
            gender: row.cells[3].innerText,
            dob: row.cells[4].innerText,
            address: row.cells[5].innerText,
            city: row.cells[6].innerText,
            state: row.cells[7].innerText,
            zipCode: row.cells[8].innerText,
            phoneNo: row.cells[9].innerText,
            email: row.cells[10].innerText  // Adjusted to match the table header
        };
        sendData(api, rowData)
            .then(response => {
                alert('API Response:\n' + JSON.stringify(response));
                console.log('Success:', response);
            })
            .catch(error => {
                alert('Error: ' + error.message);
                console.error('Error:', error);
            });
    }
</script>

</head>
<body>

<header>
    <h1>Data Submitted</h1>
</header>

<div class="container mt-5">
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>        
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>PhoneNo</th>
                    <th>Email</th>
                    <b><th>D1</th><b> 
                    <b><th>D2</th><b> 
                    <b><th>D3</th><b> 
                </tr>
            </thead>
            <tbody>
            
                <?php
                foreach ($cursor as $document) {
                    echo "<tr>";
                    echo "<td>" . $document["_id"] . "</td>";
                    echo "<td>" . $document["fname"] . "</td>";
                    echo "<td>" . $document["lname"] . "</td>"; 
                    echo "<td>" . $document["gender"] . "</td>";
                    echo "<td>" . $document["dob"] . "</td>";
                    echo "<td>" . $document["address"] . "</td>";
                    echo "<td>" . $document["city"] . "</td>";
                    echo "<td>" . $document["state"] . "</td>";
                    echo "<td>" . $document["zipCode"] . "</td>";
                    echo "<td>" . $document["phoneNo"] . "</td>";
                    echo "<td>" . $document["email"] . "</td>";
                    // Actions column
                    echo "<td>
                            <a href='#' onclick=\"handleLinkClick('https://ringlabmedia.com/ping/mva.php', this.closest('tr'), 'D1')\">D1</a>
                          </td>";
                    echo "<td>
                            <a href='#' onclick=\"handleLinkClick('https://markethubapi.leadmantra.com/api/legal/SubmitLead', this.closest('tr'), 'D2')\">D2</a>
                          </td>";
                    echo "<td>
                            <a href='#' onclick=\"handleLinkClick('https://forms.33mileradius.com/post.php', this.closest('tr'), 'D3')\">D3</a>
                          </td>";
    
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer mt-5">
    <p>Pragmatic Fit|| Author || AUI4772 -2024</p>
</footer>

</body>
</html>
