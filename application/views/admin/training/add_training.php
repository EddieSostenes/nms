<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Training
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Trainings</a></li>
            <li class="active">Add Training</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Display success or error messages -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <!-- General form elements -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Training</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url('training/add_training'); ?>">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Training Name -->
                                    <div class="form-group">
                                        <label for="training_name">Training Name</label>
                                        <input type="text" class="form-control" name="training_name" placeholder="Enter Training Name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Training Category -->
                                    <div class="form-group">
                                        <label for="training_category">Training Category</label>
                                        <input type="text" class="form-control" name="training_category" placeholder="Enter Training Category (e.g., Internship, ipt etc)" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Training Level -->
                                    <div class="form-group">
                                        <label for="training_level">Training Level</label>
                                        <select class="form-control" name="training_level" required>
                                            <option value="" disabled selected>Select Training Level</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Degree">Degree</option>
                                            <option value="Masters">Masters</option>
                                            <option value="Phd">Phd</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Duration -->
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" name="duration" placeholder="Enter Duration (e.g., 4 weeks, 6 months)" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" rows="4" placeholder="Provide a brief description of the training..." required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Add Training</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
