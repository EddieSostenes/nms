<div class="content-wrapper">
  <section class="content-header">
    <h1>Manage Patient Progress Reports</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">Manage Reports</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Manage Patient Progress Reports</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Report ID</th>
                  <th>Date & Time</th>
                  <th>Patient Name</th>
                  <th>Reported By</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($reports)): ?>
                  <?php foreach ($reports as $report): ?>
                    <tr>
                      <td><?php echo $report['id']; ?></td>
                      <td><?php echo $report['date_time']; ?></td>
                      <td><?php echo $report['patient_name']; ?></td>
                      <td><?php echo $report['reported_by']; ?></td>
                      <td><?php echo $report['status']; ?></td>
                      <td>
                        <a href="<?php echo base_url('dns/PatientProgressController/view/' . $report['id']); ?>" class="btn btn-info btn-sm">View</a>
                        <a href="<?php echo base_url('dns/PatientProgressController/approve/' . $report['id']); ?>" class="btn btn-success btn-sm">Approve</a>
                        <a href="<?php echo base_url('dns/PatientProgressController/return_for_correction/' . $report['id']); ?>" class="btn btn-warning btn-sm">Return for Correction</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6">No reports found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
