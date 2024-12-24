<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Program Fees</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Program Management</a></li>
            <li class="active">Manage Program Fees</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Program Fee List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Program Name</th>
                                    <th>Price</th>
                                    <th>Student Type</th>
                                    <th>Currency</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($fees as $fee): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $fee['program_name']; ?></td>
                                        <td><?php echo $fee['price']; ?></td>
                                        <td><?php echo $fee['student_type']; ?></td>
                                        <td><?php echo $fee['currency']; ?></td>
                                        <td><?php echo $fee['level']; ?></td>
                                        <td><?php echo $fee['duration']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('edit-program-fee/'.$fee['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="<?php echo base_url('delete-program-fee/'.$fee['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this program fee?');">Delete</a>
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
