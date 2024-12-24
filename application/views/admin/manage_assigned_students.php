<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage Assigned Students</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Student Management</a></li>
            <li class="active">Manage Assigned Students</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Box for managing allocations -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Manage Assigned Students</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th> <!-- Serial number -->
                                        <th>Student Name</th>
                                        <th>Supervisor Name</th>
                                        <th>Allocation Date</th>
                                        <th>Status</th>
                                        <th>Actions</th> <!-- Column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sn = 1; foreach($assignments as $assignment): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td> <!-- Serial number -->
                                            <td><?php echo $assignment['student_name']; ?></td>
                                            <td><?php echo $assignment['supervisor_name']; ?></td>
                                            <td><?php echo $assignment['allocation_date']; ?></td>
                                            <td><?php echo $assignment['status']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('allocation/edit/'.$assignment['id']); ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="<?php echo base_url('allocation/delete/'.$assignment['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this allocation?');">
                                                    <i class="fa fa-trash"></i> Remove
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Include necessary DataTables CSS and JS 
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "order": [[0, "asc"]] // Sorting by serial number in ascending order
        });
    });
</script>-->
