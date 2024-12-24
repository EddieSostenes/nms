<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Trainings</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Manage Trainings</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Training Name</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trainings as $training): ?>
                                    <tr>
                                        <td><?php echo $training['id']; ?></td>
                                        <td><?php echo $training['training_name']; ?></td>
                                        <td><?php echo $training['training_category']; ?></td>
                                        <td><?php echo $training['training_level']; ?></td>
                                        <td><?php echo $training['description']; ?></td>
                                        <td><?php echo $training['duration']; ?></td>
                                        <td><?php echo ucfirst($training['status']); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('training/edit_training/' . $training['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                            <a href="<?php echo base_url('training/delete_training/' . $training['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this training?');">Delete</a>
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
