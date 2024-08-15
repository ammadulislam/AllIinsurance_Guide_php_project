<?php
$status = $_GET['status'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>AllinsuranceGuides</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon.png">
  
  <!-- CSS -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    .card {
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .eye-icon {
        cursor: pointer;
        position: absolute;
        right: 20px;
        top: 35px;
    }
    .form-control {
        font-size: 14px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }
    .form-group label {
        color: #343a40;
    }
  </style>

  <!-- trusted form -->
  <script type="text/javascript">
    (function () {
      var tf = document.createElement("script");
      tf.type = "text/javascript";
      tf.async = true;
      tf.src =
        ("https:" == document.location.protocol ? "https" : "http") +
        "://api.trustedform.com/trustedform.js?field=xxTrustedFormCertUrl&ping_field=xxTrustedFormPingUrl&l=" +
        new Date().getTime() +
        Math.random();
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(tf, s);
    })();
  </script>
  <noscript>
    <img src="https://api.trustedform.com/ns.gif" />
  </noscript>

  <script id="LeadIDScript" type="text/javascript">
    (function() {
        var s = document.createElement('script');
        s.id = 'LeadiDscript_campaign';
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//create.lidstatic.com/campaign/5b32c0e0-71bf-5bcb-94d4-bf24507b8134.js?snippet_version=2';
        document.head.appendChild(s);
        
        // Function to set universal_leadid in the hidden input field
        function setUniversalLeadId(leadId) {
            document.getElementById("universal_leadid").value = leadId;
        }
        
        // Check for LeadID object and set universal_leadid if available
        window.addEventListener('LeadId_READY', function () {
            if (window.LeadId && window.LeadId.UID) {
                setUniversalLeadId(window.LeadId.UID);
            }
        });
    })();
  </script>
  <noscript>
    <img src='//create.leadid.com/noscript.gif?lac=07C5D3AC-9CAA-E9BB-CD77-E5191E9B28CA&lck=5b32c0e0-71bf-5bcb-94d4-bf24507b8134&snippet_version=2' />
  </noscript>
</head>
<body>
  <div class="body-inner">
    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <!-- <li><i class="fas fa-map-marker-alt"></i> <p class="info-text"> USA</p> -->
                    </li>
                </ul>
              </div>
          </div>
        </div>
    </div>
    <header id="header" class="header-one">
      <div class="bg-white">
        <div class="container">
          <div class="logo-area">
              <div class="row align-items-center">
                <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                  <a class="navbar-brand" href="#">
                    <img src="images/news/allins.jpeg" alt="AllinsuranceGuides Logo" style="height: 80px; width: 120px; border-radius: 50%;">
                </a>
                
                </div>
                <div class="col-lg-9 header-right">
                    <ul class="top-info-box">
                      <li>
                        <div class="info-box">
                          <div class="info-box-content">
                              <p class="info-box-title">Call Us</p>
                              <p class="info-box-subtitle">(+1) 833-4418488</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="info-box">
                          <div class="info-box-content">
                              <p class="info-box-title">Email Us</p>
                              <p class="info-box-subtitle">Info@AllinsuranceGuides.com</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="site-navigation">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav mr-auto">
                          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                          <li class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Insurance Services <i class="fa fa-angle-down"></i></a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="homeform.php">Home Insurance</a></li>
                                <li><a href="autoform.php">Auto Insurance</a></li>
                                <li><a href="fexpenseform.php">Final expense</a></li>
                                <li><a href="medicareform.php">Medicare</a></li>
                                <li><a href="acaform.php">ACA</a></li>
                              </ul>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                  </nav>
              </div>
            </div>
        </div>
      </div>
    </header>
    <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
      <div class="banner-text">
        <div class="container">
            <div class="row">
              <div class="col-lg-12">
                  <div class="banner-heading">
                    <h1 class="banner-title">Auto Insurance</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">Features</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Auto Insurance</li>
                        </ol>
                    </nav>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    
    <div class="container mt-5">
      <div class="card">
        <form action="auto.php" method="Post" class="formData" >
          <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" required>
          </div>
          <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" required>
          </div>
          <div class="form-group">
              <label for="dob">Date of Birth:</label>
              <input type="text" class="form-control" id="dob" name="dob" placeholder="DD/MM/YYYY" required>
          </div>
          
          <div class="form-group">
              <label for="make">Make:</label>
              <input type="text" class="form-control" id="make" name="make" placeholder="Enter the make" required>
          </div>
          <div class="form-group">
              <label>Model:</label><br>
              <input type="text" class="form-control" id="model" name="model" placeholder="Enter the model" required>
          </div>
          <div class="form-group">
              <label for="year">Year:</label>
              <input type="text" class="form-control" id="year" name="year" placeholder="Enter the year" required>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="city">City:</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="state">State:</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" required>
              </div>
          </div>
          <div class="form-group">
              <label for="zipCode">Zip Code:</label>
              <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Enter your zip code" required>
          </div>
          <div class="form-group">
              <label for="phoneNo">Phone Number:</label>
              <input type="tel" class="form-control" id="phoneNo" name="phoneNo" placeholder="Enter your phone number" required>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
          </div>
          <input type="hidden" id="status" name="status" value="<?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?>">

          <input id="leadid_token" name="universal_leadid" type="hidden" value="">
          
          <input id="xxTrustedFormCertUrl_0" name="xxTrustedFormCertUrl" type="hidden" value="">
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="leadid_tcpa_disclosure" name="leadid_tcpa_disclosure">
              <label class="form-check-label" for="agreement">
                  <p>
                      By clicking on the “Submit” button, I agree to the <a href="termsc.html" target="_blank"><strong>Terms and Conditions</strong></a> and <a href="privacy.html" target="_blank"><strong>Privacy Policy</strong></a> and <a href="authorizepartners.html" target="_blank"><strong>authorize insurance companies, their agents and marketing partners</strong></a> to contact me about life insurance and other non-insurance offers by telephone calls and text messages to the number I provided above. I agree to receive telemarketing calls and pre-recorded messages via an autodialed phone system, also be contacted by artificial voice, even if my telephone number is a mobile number that is currently listed on any state, federal or corporate Do Not Call list. I understand that my consent is not a condition of purchase of any goods or services and that I may revoke my consent at any time. For a quote without consent, please call AllinsuranceGuides at (+1)833-4418488. I understand that standard message and data rates may apply.
                  </p>
              </label>
          </div>
          <button type="submit" class="btn btn-primary" id="subBtn">Submit</button>
           <div class="container mt-5">
    </div>
      </form>



      <?php if ($status !== null): ?>
    <?php if ($status == 1): ?>
        <p style="color: green;">Data successfully saved! Status Code: <?php echo htmlspecialchars($status); ?></p>
    <?php else: ?>
        <p style="color: red;">Failed to save data. Please try again. Status Code: <?php echo htmlspecialchars($status); ?></p>
    <?php endif; ?>
     <?php endif; ?>





      
      
    <footer id="footer" class="footer bg-overlay">
      <div class="footer-main">
        <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-12 footer-widget footer-about">
                <h3 class="widget-title">About Us</h3>
                <p>We are a team of passionate individuals dedicated to providing top-notch insurance services tailored to meet your needs. At AllinsuranceGuides, we believe in transparency, reliability, and exceptional customer service.</p>
              </div>
              <div class="col-lg-4 col-md-12 footer-widget">
                <h3 class="widget-title">Our Services</h3>
                <ul class="list-arrow">
                
                <li><a href="homeform.php">home</a></li>
            <li><a href="fexpenseform.php">final Expense</a></li>
            <li><a href="medicareform.php">Medicare</a></li>
            <li><a href="termsc.html">Terms Condition</a></li>
            <li><a href="privacy.html">Privacy policy</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-md-12 footer-widget">
                <h3 class="widget-title">Contact Us</h3>
                <p><i class="fas fa-phone"></i> (+1) 833-4418488</p>
                <p><i class="fas fa-envelope"></i> Info@AllinsuranceGuides.com</p>
              </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  
  <script src="plugins/jQuery/jquery.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/slick/slick-animation.min.js"></script>
  <script src="plugins/colorbox/jquery.colorbox.js"></script>
  <script src="plugins/shuffle/shuffle.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
