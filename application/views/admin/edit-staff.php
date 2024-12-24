<style>
  .floatybox {
    display: inline-block;
    width: 123px;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Staff Management</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Staff Management</a></li>
      <li class="active">Edit Staff</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <?php echo validation_errors('<div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
      </div>'); ?>

      <?php if($this->session->flashdata('success')): ?>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Failed!</h4>
              <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
      <?php endif;?>

      <!-- column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Staff</h3>
          </div>
          <!-- /.box-header -->

          <?php if(isset($content)): ?>
            <?php foreach($content as $cnt): ?>
                <!-- form start -->
                <?php echo form_open_multipart('Staff/update');?>
                  <div class="box-body">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Full Name</label>
                        <input type="hidden" name="txtid" value="<?php echo $cnt['id'] ?>" class="form-control">
                        <input type="text" name="txtname" value="<?php echo $cnt['staff_name'] ?>" class="form-control" placeholder="Full Name">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Department</label>
                        <select class="form-control" name="slcdepartment">
                          <option value="">Select</option>
                          <?php
                          if(isset($department)) {
                            foreach($department as $cnt1) {
                              $selected = ($cnt1['id'] == $cnt['department_id']) ? 'selected' : '';
                              echo "<option value='{$cnt1['id']}' {$selected}>{$cnt1['department_name']}</option>";
                            }
                          } 
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="slcgender">
                          <option value="">Select</option>
                          <option value="Male" <?php echo ($cnt['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                          <option value="Female" <?php echo ($cnt['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                          <option value="Others" <?php echo ($cnt['gender'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="txtemail" value="<?php echo $cnt['email'] ?>" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="txtmobile" value="<?php echo $cnt['mobile'] ?>" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="filephoto" class="form-control">
                        <small>Current: <?php echo $cnt['pic']; ?></small>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="txtdob" value="<?php echo $cnt['dob'] ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Date of Joining</label>
                        <input type="date" name="txtdoj" value="<?php echo $cnt['doj'] ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="txtcity" value="<?php echo $cnt['city'] ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" name="txtstate" value="<?php echo $cnt['state'] ?>" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Country</label>
                        <select class="form-control" name="slccountry">
                          <option value="">Select</option>
                          <?php
                          if(isset($country)) {
                            foreach ($country as $cnt1) {
                              $selected = ($cnt1['country_name'] == $cnt['country']) ? 'selected' : '';
                              echo "<option value='{$cnt1['country_name']}' {$selected}>{$cnt1['country_name']}</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="txtaddress"><?php echo $cnt['address'] ?></textarea>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Ward</label>
                        <select class="form-control" name="slcward">
                          <option value="">Select</option>
                          <option value="Ward 1" <?php echo ($cnt['ward'] == 'Ward 1') ? 'selected' : ''; ?>>Ward 1</option>
                          <option value="Ward 2" <?php echo ($cnt['ward'] == 'Ward 2') ? 'selected' : ''; ?>>Ward 2</option>
                          <option value="Ward 3" <?php echo ($cnt['ward'] == 'Ward 3') ? 'selected' : ''; ?>>Ward 3</option>
                          <option value="None" <?php echo ($cnt['ward'] == 'None') ? 'selected' : ''; ?>>None</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="slcrole">
                          <option value="">Select</option>
                          <option value="Staff" <?php echo ($cnt['role'] == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                          <option value="Nurse" <?php echo ($cnt['role'] == 'Nurse') ? 'selected' : ''; ?>>Nurse</option>
                          <option value="DNS" <?php echo ($cnt['role'] == 'DNS') ? 'selected' : ''; ?>>DNS</option>
                          <option value="DED" <?php echo ($cnt['role'] == 'DED') ? 'selected' : ''; ?>>DED</option>
                          <option value="SUPERVISOR" <?php echo ($cnt['role'] == 'SUPERVISOR') ? 'selected' : ''; ?>>SUPERVISOR</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                  </div>
                </form>
              <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
