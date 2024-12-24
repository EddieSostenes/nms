<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Program</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Program Management</a></li>
            <li class="active">Edit Program</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Program Information</h3>
                    </div>
                    <form method="post" action="<?php echo base_url('edit-program/'.$program['program_id']); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="program_name">Program Name</label>
                                <input type="text" class="form-control" name="program_name" value="<?php echo $program['program_name']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" name="duration" value="<?php echo $program['duration']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="4" required><?php echo $program['description']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="active" <?php if($program['status'] == 'active') echo 'selected'; ?>>Active</option>
                                    <option value="inactive" <?php if($program['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
