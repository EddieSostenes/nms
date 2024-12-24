<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Enrollments</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Enrollments</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enrollments</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Slno</th>
                                    <th>Student</th>
                                    <th>Supervisor</th>
                                    <th>Program</th>
                                    <th>Course</th>
                                    <th>Training</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; foreach ($enrollments as $enrollment): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $enrollment['student_name']; ?></td>
                                        <td><?php echo $enrollment['supervisor_name']; ?></td>
                                        <td><?php echo $enrollment['program_name']; ?></td>
                                        <td><?php echo $enrollment['course_name']; ?></td>
                                        <td><?php echo $enrollment['training_name']; ?></td>
                                        <td><?php echo $enrollment['start_date']; ?></td>
                                        <td><?php echo $enrollment['end_date']; ?></td>
                                        <td><?php echo ucfirst($enrollment['status']); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('edit-enrollment/'.$enrollment['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?php echo base_url('delete-enrollment/'.$enrollment['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?');">Delete</a>
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
