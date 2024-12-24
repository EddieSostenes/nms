<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Activity</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Activities</a></li>
            <li class="active">Add Activity</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Activity</h3>
                    </div>

                    <form method="post" action="<?php echo base_url('activity/save'); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="activity_name">Activity Name</label>
                                <input type="text" name="activity_name" class="form-control" placeholder="Enter activity name" required>
                            </div>
                            <div class="form-group">
                                <label for="activity_description">Activity Description</label>
                                <textarea name="activity_description" class="form-control" rows="5" placeholder="Enter activity description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="questions">Questions (Optional)</label>
                                <textarea name="questions" class="form-control" rows="3" placeholder="Enter any questions for the activity"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="submission_date">Submission Date</label>
                                <input type="date" name="submission_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="submission_time">Submission Time</label>
                                <input type="time" name="submission_time" class="form-control" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
