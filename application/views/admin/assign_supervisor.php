<div class="content-wrapper">
    <section class="content-header">
        <h1>Assign Supervisor to Student</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student Management</a></li>
            <li class="active">Assign Supervisor</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Success and Error Alerts -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible " role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible " role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Form Start -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assign a Supervisor</h3>
                    </div>

                    <div class="box-body">
                        <form method="post" action="<?php echo base_url('Admin_student_management/save_allocation'); ?>">
                            <!-- Select Student -->
                            <div class="form-group">
                                <label for="student_id">Select Student</label>
                                <select name="student_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Select Student</option>
                                    <?php foreach($students as $student): ?>
                                        <option value="<?php echo $student['student_id']; ?>"><?php echo $student['full_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Select Supervisor -->
                            <div class="form-group">
                                <label for="staff_id">Select Supervisor</label>
                                <select name="staff_id" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Select Supervisor</option>
                                    <?php foreach($staff as $supervisor): ?>
                                        <option value="<?php echo $supervisor['id']; ?>"><?php echo $supervisor['staff_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Assign Supervisor</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>

<!-- Include Select2 CSS and JS for searchable dropdowns 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 for better dropdowns
        $('.select2').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });
</script>
