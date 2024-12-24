<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | Training Management System</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Center the container and make it responsive */
        .container {
            max-width: 900px;
            margin: auto;
            padding-top: 50px;
            padding-bottom: 50px;
            background-color: #f5f7fa;
        }

        /* Improve the appearance of the card */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Add padding and border to form sections */
        .form-section {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }

        .form-section h5 {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Improve the appearance of tabs */
        .nav-tabs .nav-link.completed::after {
            content: "\f00c"; /* Font Awesome checkmark */
            font-family: 'Font Awesome 5 Free';
            color: green;
            font-weight: 900;
            margin-left: 5px;
        }

        /* Center the form on the screen */
        body {
            /*background-color: #e9ecef;*/
            background-color: #f5f7fa;
        }

        .testimonials {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .faq {
            margin-top: 30px;
        }

        .benefits {
            padding: 20px;
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .benefits i {
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <h2>Welcome to the Training Management System</h2>
        <p>Please fill out the registration form to get started with our programs.</p>
    </div>

    <!-- Benefits Section -->
    <div class="benefits">
        <h4>Why Register?</h4>
        <ul class="list-unstyled">
            <li><i class="fas fa-check-circle"></i>Access a variety of training programs</li>
            <li><i class="fas fa-check-circle"></i>Get certified in your field</li>
            <li><i class="fas fa-check-circle"></i>Learn from experienced instructors</li>
        </ul>
    </div>

    <!-- Registration Form -->
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="card-title mb-0">New Registration</h4>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- JavaScript to redirect after 3 seconds -->
                <script>
                    setTimeout(function() {
                        window.location.href = "<?php echo base_url('auth/register'); ?>";
                    }, 3000);
                </script>
            <?php endif; ?>

            <form id="registrationForm" action="<?php echo base_url('auth/register_student'); ?>" method="post">
                <ul class="nav nav-tabs" id="registrationTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</a>
                    </li>
                   <!-- <li class="nav-item">
                        <a class="nav-link" id="university-info-tab" data-toggle="tab" href="#university-info" role="tab" aria-controls="university-info" aria-selected="false">University Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="immigration-info-tab" data-toggle="tab" href="#immigration-info" role="tab" aria-controls="immigration-info" aria-selected="false">Immigration Info</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" id="academic-info-tab" data-toggle="tab" href="#academic-info" role="tab" aria-controls="academic-info" aria-selected="false">Academic Background</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="elective-info-tab" data-toggle="tab" href="#elective-info" role="tab" aria-controls="elective-info" aria-selected="false">Elective/Practical Training/Research Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="accomodation-info-tab" data-toggle="tab" href="#accomodation-info" role="tab" aria-controls="accomodation-info" aria-selected="false">Accomodation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-info-tab" data-toggle="tab" href="#account-info" role="tab" aria-controls="account-info" aria-selected="false">Account Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="declaration-info-tab" data-toggle="tab" href="#declaration-info" role="tab" aria-controls="declaration-info" aria-selected="false">Declaration</a>
                    </li>
                </ul>

                <div class="tab-content" id="registrationTabContent">
                    <!-- Personal Info -->
                    <div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                        <div class="form-section">
                            <h5>Personal Information</h5>
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter your Full Name (Use Capital Letters: First Name and Surname Required) " required>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>

                            <div class="form-group">
                                <label for="placeofbirth">Place of Birth</label>
                                <input type="text" class="form-control" id="PlaceOfBirth" name="PlaceOfBirth" placeholder="Enter your Place of Birth (Country, Region, Town or District)" required>
                            </div>

                            <div class="form-group">
                            <label for="sex">Sex</label>
                            <select class="form-control" name="sex" required>
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="maritalstatus">Marital Status</label>
                            <select class="form-control" name="maritalsatus" required>
                                <option value="">Select</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                            </select>
                        </div>

                        
                        <div class="form-group">
                                <label for="religion">Religion</label>
                                <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter your Religion" required>
                            </div>

                            <div class="form-group">
                                <label for="citizenship">Citizenship</label>
                                <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Enter your Citizenship" required>
                            </div>

                            <div class="form-group">
    <label for="countryofresidence">Country of Residence</label>
    <select class="form-control" name="country" required>
        <option value="">Select</option>
        <?php
        if (isset($country)) {
            foreach ($country as $cnt1) {
                echo "<option value='" . htmlspecialchars($cnt1['country_name'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($cnt1['country_name'], ENT_QUOTES, 'UTF-8') . "</option>";
            }
        }
        ?>
    </select>
</div>

<div class="form-group">
<label for="phoneNumber">Phone Number:</label>
<input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
</div>
                            
<div class="form-group">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
</div>

<div class="form-group">
<label for="passportNumber">Passport Number</label>
<input type="text" class="form-control" id="passportNumber" name="passport_number" placeholder="Enter passport number (If there's 'None' Kindly write NA)" required>
</div>
<div class="form-group">
<label for="visaNumber">Visa Number</label>
<input type="text" class="form-control" id="visaNumber" name="visa_number" placeholder="Enter visa number (If there's 'None' Kindly write NA)" required>
</div>

<div class="form-group">
<label for="address">Address</label>
<textarea class="form-control" id="address" name="address" placeholder="Enter a physical address to which information should be sent" rows="4" required></textarea>
</div>
</div>
</div>

<!-- Elective/Practical Training/Research -->
<div class="tab-pane fade" id="elective-info" role="tabpanel" aria-labelledby="elective-info-tab">
    <div class="form-section">
        <h5>Elective/Practical Training/Research</h5>

        <!-- Question 1: MNH Branch -->
        <div class="form-group">
            <label for="mnhBranch">Which MNH branch would you want to be placed?</label>
            <select class="form-control" id="mnhBranch" name="mnh_branch" required>
                <option value="">Select a branch</option>
                <option value="Upanga">Upanga branch (main)</option>
                <option value="Mloganzila">Mloganzila branch (new)</option>
                <option value="Both">Both branches</option>
            </select>
            <small class="form-text text-muted">
                Please note that Mloganzila, the new branch of MNH, is 45Km from the Main Branch at Upanga.
            </small>
        </div>

        <!-- Question 2: Placement Type -->
        <div class="form-group">
            <label for="placementType">Placement Type</label>
            <select class="form-control" id="placementType" name="placement_type" required>
                <option value="">Select placement type</option>
                <option value="Elective">Elective</option>
                <option value="Practical Training">Practical Training</option>
                <option value="Postgraduate">Postgraduate</option>
                <option value="Research Project">Research Project</option>
            </select>
        </div>

        <!-- Question 3: Departments/Specialities -->
        <div class="form-group">
            <label>Department/Specialities</label>
            <div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="emergencyMedicine" name="departments[]" value="Emergency Medicine">
                    <label class="form-check-label" for="emergencyMedicine">Emergency Medicine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="internalMedicine" name="departments[]" value="Internal Medicine">
                    <label class="form-check-label" for="internalMedicine">Internal Medicine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="pediatrics" name="departments[]" value="Pediatric and Child Health">
                    <label class="form-check-label" for="pediatrics">Pediatric and Child Health</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="surgery" name="departments[]" value="Surgery">
                    <label class="form-check-label" for="surgery">Surgery</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="psychiatric" name="departments[]" value="Psychiatric">
                    <label class="form-check-label" for="psychiatric">Psychiatric</label>
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ent" name="departments[]" value="ENT">
                <label class="form-check-label" for="ent">ENT</label>
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dental" name="departments[]" value="Dental">
                <label class="form-check-label" for="dental">Dental</label>
                </div>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="anaesthesia" name="departments[]" value="Anaesthesia">
                <label class="form-check-label" for="anaesthesia">Anaesthesia</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ophthalmology" name="departments[]" value="Ophthalmology">
                    <label class="form-check-label" for="ophthalmology">Ophthalmology</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="obstetricsGynecology" name="departments[]" value="Obstetrics and Gynecology">
                    <label class="form-check-label" for="obstetricsGynecology">Obstetrics and Gynecology</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="pharmacy" name="departments[]" value="Pharmacy">
                    <label class="form-check-label" for="pharmacy">Pharmacy</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="laboratory" name="departments[]" value="Laboratory">
                    <label class="form-check-label" for="laboratory">Laboratory</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="radiology" name="departments[]" value="Radiology">
                    <label class="form-check-label" for="radiology">Radiology</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rehabilitativeMedicine" name="departments[]" value="Rehabilitative Medicine">
                    <label class="form-check-label" for="rehabilitativeMedicine">Rehabilitative Medicine</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="socialWork" name="departments[]" value="Social Work">
                    <label class="form-check-label" for="socialWork">Social Work</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="urology" name="departments[]" value="Urology">
                    <label class="form-check-label" for="urology">Urology</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="others" name="departments[]" value="Others">
                    <label class="form-check-label" for="others">Others</label>
                </div>
            </div>
            <small class="form-text text-muted">
                Mention all that you wish to rotate. Please note that for Emergency and Internal Medicine requires placement of minimum 2 (two) weeks while other departments require minimum of 1 week placement.
            </small>
        </div>

        <!-- Question 4: Duration -->
        <div class="form-group">
            <label for="duration">Duration</label>
            <select class="form-control" id="duration" name="duration" required>
                <option value="">Select duration</option>
                <option value="1">1 week</option>
                <option value="2">2 weeks</option>
                <option value="3">3 weeks</option>
                <option value="4">4 weeks</option>
                <option value="5">5 weeks</option>
                <option value="6">6 weeks</option>
                <option value="7">7 weeks</option>
                <option value="8">8 weeks</option>
                <option value="9">9 weeks</option>
                <option value="10">10 weeks</option>
                <option value="11">11 weeks</option>
                <option value="12">12 weeks</option>
                <option value="13">13 weeks</option>
                <option value="14">14 weeks</option>
                <option value="15">15 weeks</option>
                <option value="16">16 weeks</option>
                <option value="17">17 weeks</option>
                <option value="18">18 weeks</option>
                <option value="19">19 weeks</option>
                <option value="20">20 weeks</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <!-- Question 5: From Date -->
        <div class="form-group">
            <label for="fromDate">From Date</label>
            <input type="date" class="form-control" id="fromDate" name="from_date" required>
        </div>

        <!-- Question 6: To Date -->
        <div class="form-group">
            <label for="toDate">To Date</label>
            <input type="date" class="form-control" id="toDate" name="to_date" required>
        </div>

        <!-- File Upload: Letter of Introduction -->
        <div class="form-group">
            <label for="introductionLetter">Upload Letter of Introduction from your school/employer/individual student</label>
            <input type="file" class="form-control-file" id="introductionLetter" name="introduction_letter" accept=".pdf,.doc,.docx" required>
        </div>

        <!-- File Upload: Passport Copy -->
        <div class="form-group">
            <label for="passportCopy">Upload Copy of your Passport (Photo and personal detail page only)</label>
            <input type="file" class="form-control-file" id="passportCopy" name="passport_copy" accept=".jpg,.jpeg,.png,.pdf" required>
        </div>
    </div>
</div>


<!-- Accommodation Section -->
<div class="tab-pane fade" id="accomodation-info" role="tabpanel" aria-labelledby="accomodation-info-tab">
    <div class="form-section">
        <h5>Accommodation</h5>

        <!-- Need Accommodation Question -->
        <div class="form-group">
            <label>Need Accommodation?</label>
            <div>
                <input type="radio" id="accommodationYes" name="need_accommodation" value="Yes" required>
                <label for="accommodationYes">Yes</label>
                <input type="radio" id="accommodationNo" name="need_accommodation" value="No" required>
                <label for="accommodationNo">No</label>
            </div>
            <small class="form-text text-muted">
                Please note that the available accommodation is based at Upanga (main) branch.
            </small>
        </div>

        <!-- Modal/Popup for Accommodation Details -->
        <div id="accommodationDetails" style="display: none; margin-top: 15px;">
            <div class="form-group">
                <label for="checkinDate">Check-In Date</label>
                <input type="date" class="form-control" id="checkinDate" name="checkin_date" required>
            </div>
            <div class="form-group">
                <label for="checkoutDate">Check-Out Date</label>
                <input type="date" class="form-control" id="checkoutDate" name="checkout_date" required>
            </div>
            <div class="form-group">
                <label for="numberOfDays">Number of Days</label>
                <input type="number" class="form-control" id="numberOfDays" name="number_of_days" placeholder="Enter number of days" required>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to toggle accommodation details section
    const accommodationYes = document.getElementById('accommodationYes');
    const accommodationNo = document.getElementById('accommodationNo');
    const accommodationDetails = document.getElementById('accommodationDetails');

    accommodationYes.addEventListener('change', function () {
        if (this.checked) {
            accommodationDetails.style.display = 'block';
        }
    });

    accommodationNo.addEventListener('change', function () {
        if (this.checked) {
            accommodationDetails.style.display = 'none';
        }
    });
</script>




                    <!-- Statement and Declaration by Applicant -->
<div class="tab-pane fade" id="declaration-info" role="tabpanel" aria-labelledby="declaration-info-tab">
    <div class="form-section">
        <h5>Statement and Declaration by Applicant</h5>

        <!-- Declaration Statement -->
        <p>
            I have acquainted myself with the entrance requirements for the course/elective/clerkship at 
            Muhimbili National Hospital and certify that, to the best of my knowledge, the information given is correct. 
            I declare that I have read and understood the general information.
        </p>

        <!-- Agree/Disagree Declaration -->
        <div class="form-group">
            <label>Please confirm your declaration:</label>
            <div>
                <input type="radio" id="agree" name="declaration" value="Agree" required>
                <label for="agree">Agree (Declare)</label>
            </div>
            <div>
                <input type="radio" id="disagree" name="declaration" value="Disagree" required>
                <label for="disagree">Disagree</label>
            </div>
        </div>
    </div>
</div>

<!-- Academic Background -->
<div class="tab-pane fade" id="academic-info" role="tabpanel" aria-labelledby="academic-info-tab">
    <div class="form-section">
        <h5>Academic Background</h5>

        <!-- Are you currently studying? -->
        <div class="form-group">
            <label>Are you currently studying?</label>
            <div>
                <input type="radio" id="studyingYes" name="currently_studying" value="Yes" required>
                <label for="studyingYes">Yes</label>
                <input type="radio" id="studyingNo" name="currently_studying" value="No" required>
                <label for="studyingNo">No</label>
            </div>
        </div>

        <!-- Details for currently studying -->
        <div id="studyDetails" style="display: none; margin-top: 15px;">
            <div class="form-group">
                <label for="studyingAt">Studying at:</label>
                <input type="text" class="form-control" id="studyingAt" name="studying_at" placeholder="Enter institution name">
            </div>
            <div class="form-group">
                <label for="courseType">Type of Course:</label>
                <input type="text" class="form-control" id="courseType" name="course_type" placeholder="Enter course type">
            </div>
            <div class="form-group">
                <label for="yearOfStudy">Year of Study:</label>
                <input type="text" class="form-control" id="yearOfStudy" name="year_of_study" placeholder="Enter year of study">
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to toggle the study details section
    const studyingYes = document.getElementById('studyingYes');
    const studyingNo = document.getElementById('studyingNo');
    const studyDetails = document.getElementById('studyDetails');

    studyingYes.addEventListener('change', function () {
        if (this.checked) {
            studyDetails.style.display = 'block';
        }
    });

    studyingNo.addEventListener('change', function () {
        if (this.checked) {
            studyDetails.style.display = 'none';
        }
    });
</script>



                    <!-- Account Info -->
                    <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                        <div class="form-section">
                            <h5>Account Information</h5>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirm">Confirm Password</label>
                                <input type="password" class="form-control" id="passwordConfirm" name="password_confirm" placeholder="Confirm your password" required>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Register</button>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>

<!-- jQuery should load before Bootstrap's JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- Include intl-tel-input CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

<!-- jQuery should load before Bootstrap's JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Initialize Phone Input -->
<script>
    const phoneInputField = document.querySelector("#phoneNumber");
    const phoneInput = window.intlTelInput(phoneInputField, {
      preferredCountries: [
    "af", "al", "dz", "as", "ad", "ao", "ai", "ag", "ar", "am", "aw", "au", "at", "az",
    "bs", "bh", "bd", "bb", "by", "be", "bz", "bj", "bm", "bt", "bo", "ba", "bw", "br", 
    "io", "vg", "bn", "bg", "bf", "bi", "kh", "cm", "ca", "cv", "ky", "cf", "td", "cl",
    "cn", "cx", "cc", "co", "km", "cd", "cg", "ck", "cr", "ci", "hr", "cu", "cy", "cz",
    "dk", "dj", "dm", "do", "ec", "eg", "sv", "gq", "er", "ee", "sz", "et", "fk", "fo", 
    "fj", "fi", "fr", "gf", "pf", "ga", "gm", "ge", "de", "gh", "gi", "gr", "gl", "gd", 
    "gp", "gu", "gt", "gn", "gw", "gy", "ht", "hn", "hk", "hu", "is", "in", "id", "ir", 
    "iq", "ie", "il", "it", "jm", "jp", "jo", "kz", "ke", "ki", "kp", "kr", "kw", "kg", 
    "la", "lv", "lb", "ls", "lr", "ly", "li", "lt", "lu", "mo", "mk", "mg", "mw", "my", 
    "mv", "ml", "mt", "mh", "mq", "mr", "mu", "yt", "mx", "fm", "md", "mc", "mn", "me", 
    "ms", "ma", "mz", "mm", "na", "nr", "np", "nl", "nc", "nz", "ni", "ne", "ng", "nu", 
    "nf", "mp", "no", "om", "pk", "pw", "ps", "pa", "pg", "py", "pe", "ph", "pl", "pt", 
    "pr", "qa", "re", "ro", "ru", "rw", "bl", "sh", "kn", "lc", "mf", "pm", "vc", "ws", 
    "sm", "st", "sa", "sn", "rs", "sc", "sl", "sg", "sx", "sk", "si", "sb", "so", "za", 
    "ss", "es", "lk", "sd", "sr", "sj", "se", "ch", "sy", "tw", "tj", "tz", "th", "tl", 
    "tg", "tk", "to", "tt", "tn", "tr", "tm", "tv", "ug", "ua", "ae", "gb", "us", "uy", 
    "uz", "vu", "va", "ve", "vn", "wf", "eh", "ye", "zm", "zw"
],

        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
    });
</script>





<!-- Tab navigation and completion tracking script -->
<script>
    $(document).ready(function() {
        // Initialize Bootstrap Tabs
        $('#registrationTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

        // Track input changes and mark tabs as completed
        $('input, select').on('change', function() {
            var $tabPane = $(this).closest('.tab-pane');
            var tabId = $tabPane.attr('id');
            var isCompleted = true;

            // Check if all required fields in the current tab are filled
            $tabPane.find('input[required], select[required]').each(function() {
                if ($(this).val() === '') {
                    isCompleted = false;
                    return false;
                }
            });

            // Update the corresponding tab link class without breaking Bootstrap's functionality
            var $tabLink = $('a[href="#' + tabId + '"]');
            if (isCompleted) {
                if (!$tabLink.find('i.fa-check').length) {
                    $tabLink.addClass('completed').append(' <i class="fa fa-check"></i>');
                }
            } else {
                $tabLink.removeClass('completed').find('i.fa-check').remove();
            }
        });
    });
</script>


</body>
</html>
