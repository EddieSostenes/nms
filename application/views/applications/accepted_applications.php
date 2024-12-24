<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Application Management</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Application Management</a></li>
      <li class="active">Accepted Applications</li>
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
            <h4><i class="icon fa fa-exclamation-triangle"></i> Failed!</h4>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif;?>

      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Accepted Applications</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>University</th>
                    <th>Program</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  if(isset($accepted_applications)):
                  $i=1; 
                  foreach($accepted_applications as $application): 
                ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $application['full_name']; ?></td>
                      <td><?php echo $application['email']; ?></td>
                      <td><?php echo $application['university_name']; ?></td>
                      <td><?php echo $application['course_name']; ?></td>
                      <td><?php echo $application['status']; ?></td>
                      <td>
                        <!-- Add Control Number Button -->
                        <button type="button" class="btn btn-primary" onclick="openControlNumberModal(<?php echo $application['student_id']; ?>, '<?php echo $application['full_name']; ?>')">Add Control Number</button>

                        <!-- Add Receipt Button -->
                        <button type="button" class="btn btn-info" onclick="openReceiptModal(<?php echo $application['student_id']; ?>, '<?php echo $application['full_name']; ?>')">Add Receipt</button>

                        <!-- Approve Button -->
                        <a href="<?php echo base_url(); ?>applications/approve/<?php echo $application['student_id']; ?>" class="btn btn-success">
                           Approve
                        </a>

                        <!-- Reject Button -->
                        <a href="<?php echo base_url(); ?>applications/reject/<?php echo $application['student_id']; ?>" class="btn btn-danger">Reject</a>
                      </td>
                    </tr>
                  <?php 
                    $i++;
                    endforeach;
                    endif; 
                  ?> 
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Number Modal -->
<div class="modal fade" id="controlNumberModal" tabindex="-1" role="dialog" aria-labelledby="controlNumberModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="controlNumberForm" method="post" action="<?php echo base_url('applications/submit_control_number'); ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="controlNumberModalLabel">Add or Update Control Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="student_id" id="controlNumberStudentId">
          <input type="hidden" name="student_name" id="controlNumberStudentName">
          <div class="form-group">
            <label for="control_number">Control Number</label>
            <input type="text" class="form-control" name="control_number" id="control_number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Control Number</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="receiptForm" method="post" action="<?php echo base_url('applications/submit_receipt'); ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="receiptModalLabel">Add Payment Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="student_id" id="receiptStudentId">
          <input type="hidden" name="student_name" id="receiptStudentName">
          
          <div class="form-group">
            <label for="receipt_file">Upload Receipt</label>
            <input type="file" class="form-control" name="receipt_file" id="receipt_file" required>
          </div>

          <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" name="payment_date" id="payment_date" required>
          </div>

          <!-- Amount Input -->
          <div class="form-group">
            <label for="amount">Payment Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" step="0.01" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Receipt</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function openControlNumberModal(student_id, student_name) {
    document.getElementById('controlNumberStudentId').value = student_id;
    document.getElementById('controlNumberStudentName').value = student_name;
    $('#controlNumberModal').modal('show');
  }

  function openReceiptModal(student_id, student_name) {
    document.getElementById('receiptStudentId').value = student_id;
    document.getElementById('receiptStudentName').value = student_name;
    $('#receiptModal').modal('show');
  }
</script>
