<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Application Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Application Management</a></li>
      <li class="active">Rejected Applications</li>
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
                <?php echo $this->session->set_flashdata('success'); ?>
          </div>
        </div>
      <?php elseif($this->session->set_flashdata('error')): ?>
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Failed!</h4>
                <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif;?>

      <div class="col-xs-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Rejected Applications</h3>
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
                  <th>Reason for Rejection</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(isset($rejected_applications)):
                  $i=1; 
                  foreach($rejected_applications as $application): 
                ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $application['full_name']; ?></td>
                      <td><?php echo $application['email']; ?></td>
                      <td><?php echo $application['university_name']; ?></td>
                      <td><?php echo $application['course_name']; ?></td>
                      <td><?php echo $application['status']; ?></td>
                      <td><?php echo $application['rejection_reason']; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>applications/view/<?php echo $application['student_id']; ?>" class="btn btn-info">View Details</a>
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
