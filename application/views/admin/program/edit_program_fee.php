<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Program Fee</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Program Management</a></li>
            <li class="active">Edit Program Fee</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Program Fee Information</h3>
                    </div>
                    <form method="post" action="<?php echo base_url('edit-program-fee/'.$fee['id']); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="program_id">Select Program</label>
                                <select class="form-control" name="program_id" required>
                                    <?php foreach($programs as $program): ?>
                                        <option value="<?php echo $program['program_id']; ?>" <?php if($fee['program_id'] == $program['program_id']) echo 'selected'; ?>>
                                            <?php echo $program['program_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Program Fee</label>
                                <input type="text" class="form-control" name="price" value="<?php echo $fee['price']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="student_type">Student Type</label>
                                <input type="text" class="form-control" name="student_type" value="<?php echo $fee['student_type']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <input type="text" class="form-control" name="currency" value="<?php echo $fee['currency']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="level">Level</label>
                                <input type="text" class="form-control" name="level" value="<?php echo $fee['level']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" name="duration" value="<?php echo $fee['duration']; ?>" required>
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
