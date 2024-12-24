<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Register New Student
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Student Management</a></li>
      <li class="active">New Registration</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <?php if($this->session->flashdata('success')): ?>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php elseif($this->session->flashdata('error')): ?>
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif;?>

      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">New Student Registration</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- Form starts -->
            <form id="registrationForm" action="<?php echo base_url('applications/register_student'); ?>" method="post">
              <!-- Nav Tabs -->
              <ul class="nav nav-tabs" id="registrationTab" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="personal-info" aria-selected="true">Personal Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="university-info-tab" data-toggle="tab" href="#university-info" role="tab" aria-controls="university-info" aria-selected="false">University Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="immigration-info-tab" data-toggle="tab" href="#immigration-info" role="tab" aria-controls="immigration-info" aria-selected="false">Immigration Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="training-info-tab" data-toggle="tab" href="#training-info" role="tab" aria-controls="training-info" aria-selected="false">Training Info</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="account-info-tab" data-toggle="tab" href="#account-info" role="tab" aria-controls="account-info" aria-selected="false">Account Info</a>
                </li>
              </ul>

              <!-- Tab Content -->
              <div class="tab-content" id="registrationTabContent">
                <!-- Personal Info -->
                <div class="tab-pane fade in active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                  <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Enter full name" required>
                  </div>
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                  </div>
                  <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                  </div>
                </div>

                <!-- University Info -->
                <div class="tab-pane fade" id="university-info" role="tabpanel" aria-labelledby="university-info-tab">
                  <div class="form-group">
                    <label for="universityName">University Name</label>
                    <input type="text" class="form-control" id="universityName" name="university_name" placeholder="Enter university name" required>
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
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
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
                  </div>
                  <div class="form-group">
                    <label for="contactPersonEmail">University Contact Person Email</label>
                    <input type="email" class="form-control" id="contactPersonEmail" name="contact_person_email" placeholder="Enter contact person email" required>
                  </div>
                </div>

                <!-- Immigration Info -->
                <div class="tab-pane fade" id="immigration-info" role="tabpanel" aria-labelledby="immigration-info-tab">
                  <div class="form-group">
                    <label for="passportNumber">Passport Number</label>
                    <input type="text" class="form-control" id="passportNumber" name="passport_number" placeholder="Enter passport number" required>
                  </div>
                  <div class="form-group">
                    <label for="visaNumber">Visa Number</label>
                    <input type="text" class="form-control" id="visaNumber" name="visa_number" placeholder="Enter visa number" required>
                  </div>
                </div>

                <!-- Training Info -->
                <div class="tab-pane fade" id="training-info" role="tabpanel" aria-labelledby="training-info-tab">
                  <div class="form-group">
                    <label for="courseName">Course Name</label>
                    <input type="text" class="form-control" id="courseName" name="course_name" placeholder="Enter course name" required>
                  </div>
                  <div class="form-group">
                    <label for="courseCategory">Course Category</label>
                    <input type="text" class="form-control" id="courseCategory" name="course_category" placeholder="Enter course category" required>
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="Enter level" required>
                  </div>
                </div>

                <!-- Account Info -->
                <div class="tab-pane fade" id="account-info" role="tabpanel" aria-labelledby="account-info-tab">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                  </div>
                  <div class="form-group">
                    <label for="passwordConfirm">Confirm Password</label>
                    <input type="password" class="form-control" id="passwordConfirm" name="password_confirm" placeholder="Confirm password" required>
                  </div>
                </div>
              </div>
              
              <!-- Submit Button -->
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
            <!-- End of form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

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
