<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Activity</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Activities</a></li>
            <li class="active">Edit Activity</li>
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
                        <h3 class="box-title">Edit Activity</h3>
                    </div>

                    <form method="post" action="<?php echo base_url('activity/update/'.$activity['id']); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="activity_name">Activity Name</label>
                                <input type="text" name="activity_name" class="form-control" value="<?php echo $activity['activity_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="activity_description">Activity Description</label>
                                <textarea name="activity_description" class="form-control" rows="5" required><?php echo $activity['activity_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="questions">Questions (Optional)</label>
                                <textarea name="questions" class="form-control" rows="3"><?php echo $activity['questions']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="submission_date">Submission Date</label>
                                <input type="date" name="submission_date" class="form-control" value="<?php echo $activity['submission_date']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="submission_time">Submission Time</label>
                                <input type="time" name="submission_time" class="form-control" value="<?php echo $activity['submission_time']; ?>" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
