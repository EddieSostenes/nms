<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Programs</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Program Management</a></li>
            <li class="active">Manage Programs</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Program List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Program Name</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($programs as $program): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $program['program_name']; ?></td>
                                        <td><?php echo $program['duration']; ?></td>
                                        <td>
                                            <?php if($program['status'] == 'active'): ?>
                                                <span class="label label-success">Active</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('edit-program/'.$program['program_id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="<?php echo base_url('delete-program/'.$program['program_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this program?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
