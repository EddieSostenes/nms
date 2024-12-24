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
            <h3 class="box-title">Your Reports</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Date & Time</th>
                    <th>Hospital Registration Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($reports)): ?>
                    <?php $slno = 1; ?>
                    <?php foreach ($reports as $report): ?>
                      <tr>
                        <td><?php echo $slno++; ?></td>
                        <td><?php echo htmlspecialchars($report['date_time']); ?></td>
                        <td><?php echo htmlspecialchars($report['hospital_registration_number']); ?></td>
                        <td><?php echo htmlspecialchars($report['status']); ?></td>
                        <td>
                          <!-- View Button -->
                          <a href="<?php echo base_url('PatientProgressController/view_nurse/' . $report['id']); ?>" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> View
                          </a>

                          <!-- Edit Button -->
                          <?php if ($report['status'] === 'Draft'): ?>
                            <a href="<?php echo base_url('PatientProgressController/edit/' . $report['id']); ?>" class="btn btn-primary btn-sm">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>

                          <!-- Send to Supervisor Button -->
                          <?php if ($report['status'] === 'Draft'): ?>
                            <a href="<?php echo base_url('PatientProgressController/send_to_supervisor/' . $report['id']); ?>" class="btn btn-success btn-sm">
                              <i class="fa fa-paper-plane"></i> Send to Supervisor
                            </a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5" class="text-center">No reports found.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- DataTables Initialization -->
<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      "order": [[0, "desc"]]
    });
  });
</script>
