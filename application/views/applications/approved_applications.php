<!-- Approved Applications View -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Application Management</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Application Management</a></li>
      <li class="active">Approved Applications</li>
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
            <h3 class="box-title">Approved Applications</h3>
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
                    <th>Control Number</th>
                    <th>Receipt</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(isset($approved_applications)):
                    $i = 1; 
                    foreach($approved_applications as $application): 
                  ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $application['full_name']; ?></td>
                      <td><?php echo $application['email']; ?></td>
                      <td><?php echo $application['university_name']; ?></td>
                      <td><?php echo $application['course_name']; ?></td>
                      <td><?php echo $application['control_number']; ?></td>
                      <td>
                        <?php if(!empty($application['receipt_path'])): ?>
                          <a href="<?php echo base_url() . $application['receipt_path']; ?>" target="_blank" class="btn btn-info">View Receipt</a>
                        <?php else: ?>
                          <span class="label label-danger">No Receipt Uploaded</span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo ucfirst($application['status']); ?></td>
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
