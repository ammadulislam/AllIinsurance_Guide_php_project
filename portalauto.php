<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

require __DIR__ . '/vendor/autoload.php'; // Include Composer's autoload file

// MongoDB connection details
$mongoUrl = "mongodb+srv://ammad:W0yZ62UMibVB0h31@cluster0.an6btrn.mongodb.net/?retryWrites=true&w=majority";
$databaseName = "auto";
$collectionName = "auto";

// Connect to MongoDB
try {
    $client = new MongoDB\Client($mongoUrl);
    $db = $client->selectDatabase($databaseName);
    $collection = $db->selectCollection($collectionName);

    // Query MongoDB collection with sorting by _id in descending order
    $cursor = $collection->find([], ['sort' => ['_id' => -1]]);

} catch (MongoDB\Driver\Exception\Exception $e) {
    error_log("Error connecting to MongoDB: " . $e->getMessage());
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        async function sendData(api, data) {
            try {
                const response = await fetch(api, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                return await response.json();
            } catch (error) {
                throw new Error('Network response was not ok.');
            }
        }

        function handleLinkClick(row, action) {
            const selectedRowData = {
                fname: row.cells[0].innerText,
                lname: row.cells[1].innerText,
                dob: row.cells[2].innerText,
                make: row.cells[3].innerText,
                model: row.cells[4].innerText,
                year: row.cells[5].innerText,
                address: row.cells[6].innerText,
                city: row.cells[7].innerText,
                state: row.cells[8].innerText,
                zip: row.cells[9].innerText,
                caller_id: row.cells[10].innerText,
                email: row.cells[11].innerText,
                jornaya_leadid: row.cells[12].innerText,
                xxTrustedFormCertUrl: row.cells[13].innerText
            };

            let api = '';
            if (action === 'D1') {
                selectedRowData.lead_token = '7c934ddf6cff43f8a18e22a507d42bc4';
                selectedRowData.traffic_source_id = 10099524;
                selectedRowData.primary_spoken_language = 'English';
                selectedRowData.tcpa_call_consent = true;
                selectedRowData.tcpa_text = 'By submitting this request I authorize Archenia, Inc, directly or by third parties acting on its behalf, to send marketing/promotional messages— including texts and calls made using an automatic telephone dialing system.';
                // Display a modal for entering Ping ID
                document.getElementById('Modal').style.display = 'block';
                document.getElementById('submitLeadId').addEventListener('click', function() {
                    let pingId = document.getElementById('leadidInput').value;
                    selectedRowData.ping_id = pingId;

                    // API endpoint for D1
                    let api = 'https://app.mktremodel.com/api/post/leads';
                    sendData(api, selectedRowData)
                        .then(response => {
                            alert('API Response:\n' + JSON.stringify(response));
                            console.log('Success:', response);
                            document.getElementById('Modal').style.display = 'none';
                        })
                        .catch(error => {
                            alert('Error: ' + error.message);
                            console.error('Error:', error);
                        });
                });
            } else if (action === 'D2') {
                selectedRowData.lead_token = 'differentTokenForD2';
                selectedRowData.traffic_source_id = 20099524;
                selectedRowData.primary_spoken_language = 'Spanish';
                selectedRowData.tcpa_call_consent = true;
                selectedRowData.tcpa_text = 'By submitting this request I authorize XYZ, Inc, directly or by third parties acting on its behalf, to send marketing/promotional messages— including texts and calls made using an automatic telephone dialing system.';
                let api = 'https://app.mktremodel.com/api/post/leads';
                sendData(api, selectedRowData)
                    .then(response => {
                        alert('API Response:\n' + JSON.stringify(response));
                        console.log('Success:', response);
                    })
                    .catch(error => {
                        alert('Error: ' + error.message);
                        console.error('Error:', error);
                    });
            } else if (action === 'D3') {
                selectedRowData.lead_token = 'anotherTokenForD3';
                selectedRowData.traffic_source_id = 30099524;
                selectedRowData.primary_spoken_language = 'French';
                selectedRowData.tcpa_call_consent = true;
                selectedRowData.tcpa_text = 'By submitting this request I authorize ABC, Inc, directly or by third parties acting on its behalf, to send marketing/promotional messages— including texts and calls made using an automatic telephone dialing system.';
                let api = 'https://app.mktremodel.com/api/post';
                sendData(api, selectedRowData)
                    .then(response => {
                        alert('API Response:\n' + JSON.stringify(response));
                        console.log('Success:', response);
                    })
                    .catch(error => {
                        alert('Error: ' + error.message);
                        console.error('Error:', error);
                    });
            }
        }

        function closeModal() {
            document.getElementById('Modal').style.display = 'none';
        }
    </script>
</head>
<body>

<header>
    <h1>Auto Insurance Portal</h1>
</header>

<div class="container mt-5">
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip Code</th>
                    <th>PhoneNo</th>
                    <th>Email</th>
                    <th>Jornaya</th>
                    <th>trusted_form_url</th>
                    <th>D1</th>
                    <th>D2</th>
                    <th>D3</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cursor as $document) {
                    echo "<tr>";
                    echo "<td>" . $document["fname"] . "</td>";
                    echo "<td>" . $document["lname"] . "</td>";
                    echo "<td>" . $document["dob"] . "</td>";
                    echo "<td>" . $document["make"] . "</td>";
                    echo "<td>" . $document["model"] . "</td>";
                    echo "<td>" . $document["year"] . "</td>";
                    echo "<td>" . $document["address"] . "</td>";
                    echo "<td>" . $document["city"] . "</td>";
                    echo "<td>" . $document["state"] . "</td>";
                    echo "<td>" . $document["zipCode"] . "</td>";
                    echo "<td>" . $document["phoneNo"] . "</td>";
                    echo "<td>" . $document["email"] . "</td>";
                    echo "<td>" . $document["universal_leadid"] . "</td>";
                    echo "<td>" . $document["xxTrustedFormCertUrl"] . "</td>";
                    echo "<td><button onclick=\"handleLinkClick(this.parentElement.parentElement, 'D1')\">D1</button></td>";
                    echo "<td><button onclick=\"handleLinkClick(this.parentElement.parentElement, 'D2')\">D2</button></td>";
                    echo "<td><button onclick=\"handleLinkClick(this.parentElement.parentElement, 'D3')\">D3</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="Modal" class="modal">
        <div class="modal-content" style="width: 300px; margin: 15% auto; padding: 20px; border: 1px solid #888;">
            <span class="close" onclick="document.getElementById('Modal').style.display = 'none';">&times;</span>
            <label for="leadidInput">Enter leadID:</label>
            <input type="text" id="leadidInput" name="leadidInput" class="form-control">
            <button id="submitLeadId" class="btn btn-primary mt-2">Submit</button>
        </div>


<footer class="footer">
    <p>Footer Content Here</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
