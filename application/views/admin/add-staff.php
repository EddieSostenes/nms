<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Staff Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Staff Management</a></li>
      <li class="active">Add Staff</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <!-- Display Validation Errors -->
      <?php echo validation_errors('<div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-times-circle"></i> Error!</h4>', '</div>
        </div>'); ?>

      <!-- Display Success/Error Messages -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php elseif ($this->session->flashdata('error')): ?>
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-times"></i> Failed!</h4>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- Add Staff Form -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Staff</h3>
          </div>

          <!-- Form Start -->
          <?php echo form_open_multipart('Staff/insert'); ?>
          <div class="box-body">

            <!-- Full Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="txtname" class="form-control" placeholder="Enter Full Name" required>
              </div>
            </div>

            <!-- Department -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Department</label>
                <select class="form-control" name="slcdepartment" required>
                  <option value="">Select Department</option>
                  <?php if (isset($department)): ?>
                    <?php foreach ($department as $dept): ?>
                      <option value="<?php echo $dept['id']; ?>">
                        <?php echo htmlspecialchars($dept['department_name']); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <!-- Ward -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Ward</label>
                <select class="form-control" name="slcward" required>
                  <option value="">Select Ward</option>
                    <option value="Internal Medicine">Internal Medicine</option>
                    <option value="General Surgery">General Surgery</option>
                    <option value="Orthopedic">Orthopedic</option>
                    <option value="Neural Surgery">Neural Surgery</option>
                    <option value="BIMA Medical">BIMA Medical</option>
                    <option value="BIMA Surgical">BIMA Surgical</option>
                    <option value="Private Ward">Private Ward</option>
                    <option value="VIP/VVIP">VIP/VVIP</option>
                    <option value="MICU">MICU</option>
                    <option value="SICU">SICU</option>
                    <option value="PICU">PICU</option>
                    <option value="NICU">NICU</option>
                    <option value="Pediatric Medical">Pediatric Medical</option>
                    <option value="Pediatric Surgical">Pediatric Surgical</option>
                    <option value="5th Floor ANC">5th Floor ANC</option>
                    <option value="5th Floor PNC">5th Floor PNC</option>
                    <option value="5th Floor Babies">5th Floor Babies</option>
                    <option value="5th Floor GYN">5th Floor GYN</option>
                    <option value="4th Floor PNC">4th Floor PNC</option>
                    <option value="4th Floor Babies">4th Floor Babies</option>
                    <option value="4th Floor General Neonates">4th Floor General Neonates</option>
                    <option value="4th Floor KMC Babies">4th Floor KMC Babies</option>
                    <option value="4th Floor Geonatal N/S">4th Floor Geonatal N/S</option>
                    <option value="PSY">PSY</option>
                    <option value="Labour Ward">Labour Ward</option>
                    <option value="Others">Others</option>
                    <option value="None">None</option>
                </select>
              </div>
            </div>

            <!-- Role -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="slcrole" required>
                  <option value="">Select Role</option>
                  <option value="Staff">Staff</option>
                  <option value="Nurse">Nurse</option>
                  <option value="DNS">DNS</option>
                  <option value="DED">DED</option>
                  <option value="SUPERVISOR">SUPERVISOR</option>

                </select>
              </div>
            </div>

            <!-- Gender -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control" name="slcgender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="txtemail" class="form-control" placeholder="Enter Email" required>
              </div>
            </div>

            <!-- Mobile -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="txtmobile" class="form-control" placeholder="Enter Mobile" required>
              </div>
            </div>

            <!-- Photo -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Photo</label>
                <input type="file" name="filephoto" class="form-control">
              </div>
            </div>

            <!-- Date of Birth -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="txtdob" class="form-control" required>
              </div>
            </div>

            <!-- Date of Joining -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Joining</label>
                <input type="date" name="txtdoj" class="form-control" required>
              </div>
            </div>

            <!-- City -->
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" name="txtcity" class="form-control" placeholder="Enter City" required>
              </div>
            </div>

            <!-- State -->
            <div class="col-md-6">
              <div class="form-group">
                <label>State</label>
                <input type="text" name="txtstate" class="form-control" placeholder="Enter State" required>
              </div>
            </div>

            <!-- Country -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="slccountry" required>
                  <option value="">Select Country</option>
                  <?php if (isset($country)): ?>
                    <?php foreach ($country as $cnt): ?>
                      <option value="<?php echo htmlspecialchars($cnt['country_name']); ?>">
                        <?php echo htmlspecialchars($cnt['country_name']); ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>

            <!-- Address -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="txtaddress" rows="3" placeholder="Enter Address"></textarea>
              </div>
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
          <?php echo form_close(); ?>
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
