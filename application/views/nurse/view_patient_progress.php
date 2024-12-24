<div class="content-wrapper">
  <section class="content-header">
    <h1>View Patient Progress Report</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">View Report</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Patient Progress Report Details</h3>
            <button class="btn btn-primary pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
          </div>
          <div class="box-body">
            <table class="table table-bordered">
              <tr>
                <th>Date & Time</th>
                <td><?php echo $report['date_time']; ?></td>
              </tr>
              <tr>
                <th>Hospital Registration Number</th>
                <td><?php echo $report['hospital_registration_number']; ?></td>
              </tr>
              <tr>
                <th>Surname</th>
                <td><?php echo $report['surname']; ?></td>
              </tr>
              <tr>
                <th>Other Name</th>
                <td><?php echo $report['other_name']; ?></td>
              </tr>
              <tr>
                <th>Address</th>
                <td><?php echo $report['address']; ?></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td><?php echo $report['phone_number']; ?></td>
              </tr>
              <tr>
                <th>Next of Kin</th>
                <td><?php echo $report['next_of_kin_name']; ?></td>
              </tr>
              <tr>
                <th>Next of Kin Phone</th>
                <td><?php echo $report['next_of_kin_phone']; ?></td>
              </tr>
              <tr>
                <th>Hypersensitivity</th>
                <td><?php echo $report['hypersensitivity']; ?></td>
              </tr>
              <tr>
                <th>Diagnosis</th>
                <td><?php echo nl2br($report['diagnosis']); ?></td>
              </tr>
              <tr>
                <th>Narrate Information</th>
                <td><?php echo nl2br($report['narration']); ?></td>
              </tr>
              <tr>
                <th>Treatment, Care & Plan</th>
                <td><?php echo nl2br($report['treatment_care_plan']); ?></td>
              </tr>
              <tr>
                <th>BP</th>
                <td><?php echo $report['bp']; ?></td>
              </tr>
              <tr>
                <th>RR</th>
                <td><?php echo $report['rr']; ?></td>
              </tr>
              <tr>
                <th>Temperature</th>
                <td><?php echo $report['temperature']; ?></td>
              </tr>
              <tr>
                <th>SpO₂</th>
                <td><?php echo $report['spo2']; ?></td>
              </tr>
              <tr>
                <th>HR</th>
                <td><?php echo $report['hr']; ?></td>
              </tr>
              <tr>
                <th>RBG</th>
                <td><?php echo $report['rbg']; ?></td>
              </tr>
              <tr>
                <th>Reported By</th>
                <td><?php echo $report['reported_by']; ?></td>
              </tr>
              <tr>
                <th>Designation</th>
                <td><?php echo $report['designation']; ?></td>
              </tr>
              <tr>
                <th>Status</th>
                <td><?php echo $report['status']; ?></td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <a href="<?php echo base_url('PatientProgressController/manage'); ?>" class="btn btn-default">Back</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<style>
  @media print {
    .content-header, .breadcrumb, .btn, .box-footer { display: none; }
    .box { border: none; box-shadow: none; }
    table { width: 100%; }
  }
</style>
