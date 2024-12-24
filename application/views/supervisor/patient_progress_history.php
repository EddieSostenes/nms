<div class="content-wrapper">
  <section class="content-header">
    <h1>Patient Progress Report History</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">History</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Your Report History</h3>
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
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4" class="text-center">No reports found.</td>
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
