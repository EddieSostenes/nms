<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Training
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Trainings</a></li>
            <li class="active">Edit Training</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Check for success/error flash messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-12">
                <!-- Edit Training Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Training</h3>
                    </div>
                    <form role="form" method="post" action="<?php echo base_url('training/edit_training/' . $training['id']); ?>">
                        <div class="box-body">
                            <!-- Training Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="training_name">Training Name</label>
                                    <input type="text" class="form-control" name="training_name" value="<?php echo $training['training_name']; ?>" required>
                                </div>
                            </div>
                            <!-- Training Category -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="training_category">Training Category</label>
                                    <input type="text" class="form-control" name="training_category" value="<?php echo $training['training_category']; ?>" required>
                                </div>
                            </div>

                            <!-- Training Level -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="training_level">Training Level</label>
                                    <select class="form-control" name="training_level" required>
                                        <option value="Diploma" <?php echo ($training['training_level'] == 'Diploma') ? 'selected' : ''; ?>>Diploma</option>
                                        <option value="Degree" <?php echo ($training['training_level'] == 'Degree') ? 'selected' : ''; ?>>Degree</option>
                                        <option value="Masters" <?php echo ($training['training_level'] == 'Masters') ? 'selected' : ''; ?>>Masters</option>
                                        <option value="Phd" <?php echo ($training['training_level'] == 'Phd') ? 'selected' : ''; ?>>Phd</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Duration -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration">Duration (e.g., 4 weeks, 6 months)</label>
                                    <input type="text" class="form-control" name="duration" value="<?php echo $training['duration']; ?>" required>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" rows="4" required><?php echo $training['description']; ?></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="active" <?php echo ($training['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo ($training['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save Changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
