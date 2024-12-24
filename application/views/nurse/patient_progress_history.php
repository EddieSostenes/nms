<div class="content-wrapper">
  <section class="content-header">
    <h1>Patient Progress Report History</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">Report History</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Patient Progress Report History</h3>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Report ID</th>
                  <th>Date & Time</th>
                  <th>Patient Name</th>
                  <th>Status</th>
                  <th>Remarks</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($history)): ?>
                  <?php foreach ($history as $record): ?>
                    <tr>
                      <td><?php echo $record['id']; ?></td>
                      <td><?php echo $record['date_time']; ?></td>
                      <td><?php echo $record['patient_name']; ?></td>
                      <td><?php echo $record['status']; ?></td>
                      <td><?php echo $record['remarks']; ?></td>
                      <td>
                        <a href="<?php echo base_url('nurse/PatientProgressController/view/' . $record['id']); ?>" class="btn btn-info btn-sm">View</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6">No history found.</td>
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
