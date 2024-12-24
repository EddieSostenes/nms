<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Activities</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Activities</a></li>
            <li class="active">Manage Activities</li>
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

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Activities</h3>
                    </div>

                    <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Slno.</th>
                                    <th>Activity Name</th>
                                    <th>Description</th>
                                    <th>Questions</th>
                                    <th>Submission Date</th>
                                    <th>Submission Time</th>
                                    <th>Added By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($activities)): ?>
                                    <?php foreach($activities as $key => $activity): ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $activity['activity_name']; ?></td>
                                            <td><?php echo $activity['activity_description']; ?></td>
                                            <td><?php echo !empty($activity['questions']) ? $activity['questions'] : 'N/A'; ?></td>
                                            <td><?php echo date('d M Y', strtotime($activity['submission_date'])); ?></td>
                                            <td><?php echo date('H:i', strtotime($activity['submission_time'])); ?></td>
                                            <td><?php echo $activity['added_by']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('activity/edit/'.$activity['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                                                <a href="<?php echo base_url('activity/delete/'.$activity['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No activities found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
