<!DOCTYPE html>
<html>
<head>
    <title>Jornaya BOT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
</head>
<body>
<div class="container">
        

    <form method="post" id="myForm" onsubmit="return validateForm()">

      <h4 id="status" name="status"> Status:  {{status}} </h4>


        <div class="row">
       <label for="website_select">Site name: </label>
        <select id="formtype" class="form-control"  name="formtype" required>
            <option value="" disabled selected>Select Website</option>
            <option value="F1">F1  => https://getaccidentclaims.com/</option>
            <option value="F2">F2  => https://eazylegalclaim.com/mva/</option>
            <option value="F3">F3  => https://www.getcompensationnow.com/claim-now/</option>
            <option value="F4">F4  => https://accidentalclaimservices.com/</option>
            <option value="F5">F5  => https://insurancequotebucket.com/insurance-services/home-insurance/</option>
            <option value="F6">F6  => https://victimclaim.com/</option>
            <!-- Add more options if needed -->
        </select>
                <div class="invalid-feedback">Please select a website.</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="First_Name">First Name</label>
                    <input type="text" id="First_Name" name="first_Name" required class="form-control" value="">
                    <div class="invalid-feedback">Please enter First Name.</div>
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group">
                    <label for="Last_Name">Last Name</label>
                    <input type="text" id="Last_Name" name="last_Name" required class="form-control" value="">
                    <div class="invalid-feedback">Please enter Last Name.</div>
                </div>
            </div>  

        </div>

        <div class="row">

           <div class="col-md-6">
    <div class="form-group">
        <label for="tel">Phone Number</label>
        <input type="tel" id="tel" name="phone" required class="form-control" value="" maxlength="10" pattern="[0-9]{10}">
        <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
    </div>
</div>




             
            <div class="col-md-6">
                <div class="form-group">
                 <label for="Address">Address</label>
                    <input type="Address" id="Address" name="address" required class="form-control" value="">
                    <div class="invalid-feedback">Please enter a valid Address.</div>
                </div>
            </div>

        </div>

          <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="City">City</label>
                    <input type="City" id="City" name="city" required class="form-control" value="">
                    <div class="invalid-feedback">Please enter a valid City .</div>
                </div>
            </div>

             
            <div class="col-md-4">
                <div class="form-group">

                                    <label for="state">State</label>
                                    <select id="state" class="form-control" name="state" required>
                                        <option value="" disabled="" selected="">Select State</option>
                                        <option value="AL" >Alabama
                                        </option>
                                        <option value="AK" >Alaska
                                        </option>
                                        <option value="AZ" >Arizona
                                        </option>
                                        <option value="AR" >Arkansas
                                        </option>
                                        <option value="CA" >California
                                        </option>
                                        <option value="CO" >Colorado
                                        </option>
                                        <option value="CT" >
                                            Connecticut</option>
                                        <option value="DE" >Delaware
                                        </option>
                                        <option value="FL" >Florida
                                        </option>
                                        <option value="GA" >Georgia
                                        </option>
                                        <option value="HI" >Hawaii
                                        </option>
                                        <option value="ID" >Idaho
                                        </option>
                                        <option value="IL" >Illinois
                                        </option>
                                        <option value="IN" >Indiana
                                        </option>
                                        <option value="IA" >Iowa
                                        </option>
                                        <option value="KS" >Kansas
                                        </option>
                                        <option value="KY" >Kentucky
                                        </option>
                                        <option value="LA" >Louisiana
                                        </option>
                                        <option value="ME" >Maine
                                        </option>
                                        <option value="MD" >Maryland
                                        </option>
                                        <option value="MA" >
                                            Massachusetts</option>
                                        <option value="MI" >Michigan
                                        </option>
                                        <option value="MN" >Minnesota
                                        </option>
                                        <option value="MS" >
                                            Mississippi</option>
                                        <option value="MO" >Missouri
                                        </option>
                                        <option value="MT" >Montana
                                        </option>
                                        <option value="NE" >Nebraska
                                        </option>
                                        <option value="NV" >Nevada
                                        </option>
                                        <option value="NH" >New
                                            Hampshire</option>
                                        <option value="NJ" >New Jersey
                                        </option>
                                        <option value="NM" >New Mexico
                                        </option>
                                        <option value="NY" >New York
                                        </option>
                                        <option value="NC" >North
                                            Carolina</option>
                                        <option value="ND" >North
                                            Dakota</option>
                                        <option value="OH" >Ohio
                                        </option>
                                        <option value="OK" >Oklahoma
                                        </option>
                                        <option value="OR" >Oregon
                                        </option>
                                        <option value="PA" >
                                            Pennsylvania</option>
                                        <option value="RI" >Rhode
                                            Island</option>
                                        <option value="SC" >South
                                            Carolina</option>
                                        <option value="SD" >South
                                            Dakota</option>
                                        <option value="TN" >Tennessee
                                        </option>
                                        <option value="TX" >Texas
                                        </option>
                                        <option value="UT" >Utah
                                        </option>
                                        <option value="VT" >Vermont
                                        </option>
                                        <option value="VA" >Virginia
                                        </option>
                                        <option value="WA" >Washington
                                        </option>
                                        <option value="WV" >West
                                            Virginia</option>
                                        <option value="WI" >Wisconsin
                                        </option>
                                        <option value="WY" >Wyoming
                                        </option>
                                    </select>
                               </div>

            </div>
              <div class="col-md-4">
                <div class="form-group">
                     <label for="zip_code">Zip Code</label>
                    <input type="text" id="zip_code" name="zip_code" required class="form-control" maxlength="5" minlength="5">
                    <div class="invalid-feedback">Please enter a valid zip code.</div>
               </div>
            </div>
            
        </div>

  <div class="row">
   <div class="col-md-6">
                <div class="form-group">
                    <label for="email_address">Email Address</label>
                                    <input type="email" id="email_address"  name="email" required
                                        class="form-control" value="">
                    <div class="invalid-feedback">Please enter a valid Email  .</div>
                </div>
            </div>
           
          

             
            <div class="col-md-6">
                <div class="form-group">
                 <label for="DOB">Date of Birth</label>
                    <input type="Date" id="DOB" name="dOB" required class="form-control" value="">
                    <div class="invalid-feedback">Please enter a valid Date of Birth.</div>
                </div>
            </div>
            
        </div>



        <div class="row">



             <div class="col-md-6">
        <div class="form-group">
            <label for="injury_type">Injury Type</label>
            <select id="injury_type" class="form-control" name="injury_type" required>
              <option value="Anxiety">Anxiety</option>
                    <option value="Back or Neck Pain">Back or Neck Pain</option>
                    <option value="Brain Injury">Brain Injury</option>
                    <option value="Broken Bones">Broken Bones</option>
                    <option value="Cuts and Bruises">Cuts and Bruises</option>
                    <option value="Headaches">Headaches</option>
                    <option value="Loss of Life">Loss of Life</option>
                    <option value="Loss of Lims">Loss of Limb</option>
                    <option value="Memory Loss">Memory Loss</option>
                    <option value="Spinal Cord Injury or Paralysis">
                      Spinal Cord Injury or Paralysis
                    </option>
                    <option value="Whiplash">Whiplash</option>
                    <option value="no injury">no injury</option>
            </select>
            <div class="invalid-feedback">Please select an Injury Type.</div>
        </div>
    </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="Accident_Date">Incident Year</label>
                       <select id="Accident_Date" class="form-control" name="accident_Date" required class="form-control" value="">
                    <option value="Within 1 Year">Within 1 Year</option>
                    <option value="Within 2 Year">Within 2 Year</option>
                    <option value="Within 3 Year">Within 3 Year</option>
                    <option value="Within 4 Year">Within 4 Year</option>
                    <option value="Within 5 Year">Within 5 Year</option>
                    <option value="Within 6 Year">Within 6 Year</option>
            </select>
                    <div class="invalid-feedback">Please enter a valid Accident Date .</div>
                </div>
            </div>
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary" onclick="updateStatus()">Submit</button>
        </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#tel').inputmask('(999) 999-9999'); // Applying phone number mask
        
        $('#myForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var form = document.getElementById('myForm');
            if (form.checkValidity() === true) {
                $('#status').text('Processing...'); // Update status message to Processing upon form submission
                // Simulate form submission (replace this with your actual form submission logic)
                setTimeout(function() {
                    $('#status').text('Status: Processing completed'); // Update status message after processing
                }, 2000); // Simulating a 2-second processing time
            } else {
                $('#status').text('Please fill in all required fields.'); // Update status message if form validation fails
            }
        });
        
        $('#website_select').change(function() {
            $('#status').text('Idle'); // Reset status message
            $('#myForm')[0].reset(); // Reset form fields
        });
    });

    function validateForm() {
        var form = document.getElementById('myForm');
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            $('#status').text('Processing...'); // Update status message to Processing
            $('button[type="submit"]').attr('disabled', true); // Disable submit button if form is valid
        }

        form.classList.add('was-validated');
        return form.checkValidity();
    }
</script>


</body>
</html>
