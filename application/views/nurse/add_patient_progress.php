<div class="content-wrapper">
  <section class="content-header">
    <h1>Patient Progress Report</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">Add Report</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
      <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
      <?php endif; ?>

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Patient Progress Report</h3>
          </div>
          <?php echo form_open('PatientProgressController/add'); ?>
          <div class="box-body">
            <!-- Date and Time -->
            <div class="form-group col-md-6">
              <label>Date and Time</label>
              <input type="datetime-local" name="date_time" class="form-control" required>
            </div>

            <!-- Demographic Information -->
            <div class="form-group col-md-6">
              <label>Hospital Registration Number</label>
              <input type="text" name="hospital_registration_number" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Surname</label>
              <input type="text" name="surname" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Other Name</label>
              <input type="text" name="other_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Address</label>
              <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Phone Number</label>
              <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Next of Kin</label>
              <input type="text" name="next_of_kin_name" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Next of Kin Phone</label>
              <input type="text" name="next_of_kin_phone" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
              <label>Hypersensitivity</label>
              <input type="text" name="hypersensitivity" class="form-control" placeholder="Optional">
            </div>

            <!-- Diagnosis -->
            <div class="form-group col-md-12">
              <label>Diagnosis</label>
              <textarea name="diagnosis" class="form-control rich-text" rows="5" required></textarea>
            </div>

            <!-- Narration -->
            <div class="form-group col-md-12">
              <label>Narrate Information</label>
              <textarea name="narration" class="form-control rich-text" rows="5" required></textarea>
            </div>

            <!-- Treatment -->
            <div class="form-group col-md-12">
              <label>Treatment, Care & Plan</label>
              <textarea name="treatment_care_plan" class="form-control rich-text" rows="5" required></textarea>
            </div>

            <!-- Vital Signs -->
            <div class="form-group col-md-2">
              <label>BP</label>
              <input type="text" name="bp" class="form-control" placeholder="e.g., 120/80 mmHg" required>
            </div>
            <div class="form-group col-md-2">
              <label>RR</label>
              <input type="text" name="rr" class="form-control" placeholder="e.g., 16 breaths/min" required>
            </div>
            <div class="form-group col-md-2">
              <label>Temperature</label>
              <input type="text" name="temperature" class="form-control" placeholder="e.g., 36.5°C" required>
            </div>
            <div class="form-group col-md-2">
              <label>SpO₂</label>
              <input type="text" name="spo2" class="form-control" placeholder="e.g., 98%" required>
            </div>
            <div class="form-group col-md-2">
              <label>HR</label>
              <input type="text" name="hr" class="form-control" placeholder="e.g., 75 bpm" required>
            </div>
            <div class="form-group col-md-2">
              <label>RBG</label>
              <input type="text" name="rbg" class="form-control" placeholder="e.g., 5.6 mmol/L" required>
            </div>

    
            <!-- Reported By -->
            <div class="form-group col-md-6">
            <label>Reported By</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata('staff_name'); ?>" readonly>
            </div>

            <!-- Designation -->
            <div class="form-group col-md-6">
            <label>Designation</label>
            <select name="designation" class="form-control" required>
                <option value="">Select Designation</option>
                <option value="Nurse">Nurse</option>
                <option value="SUPERVISOR">SUPERVISOR</option>
                <option value="DNS">DNS</option>
                
            </select>
            </div>


          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>
