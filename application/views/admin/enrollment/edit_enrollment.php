<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Enrollment</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-enrollments'); ?>">Manage Enrollments</a></li>
            <li class="active">Edit Enrollment</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('edit-enrollment/' . $enrollment['id']); ?>">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Enrollment</h3>
                        </div>

                        <div class="box-body">
                            <!-- Approved Students Dropdown -->
                            <div class="form-group">
                                <label for="student_id">Approved Students</label>
                                <select name="student_id" class="form-control" required>
                                    <option value="">Select Approved Student</option>
                                    <?php foreach($students as $student): ?>
                                        <option value="<?php echo $student['student_id']; ?>" 
                                            <?php echo ($enrollment['student_id'] == $student['student_id']) ? 'selected' : ''; ?>>
                                            <?php echo $student['full_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Supervisor Dropdown -->
                            <div class="form-group">
                                <label for="supervisor_id">Supervisor</label>
                                <select name="supervisor_id" class="form-control" required>
                                    <option value="">Select Supervisor</option>
                                    <?php foreach($supervisors as $supervisor): ?>
                                        <option value="<?php echo $supervisor['id']; ?>"
                                            <?php echo ($enrollment['supervisor_id'] == $supervisor['id']) ? 'selected' : ''; ?>>
                                            <?php echo $supervisor['staff_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Program Dropdown -->
                            <div class="form-group">
                                <label for="program_id">Program</label>
                                <select name="program_id" class="form-control" required>
                                    <option value="">Select Program</option>
                                    <?php foreach($programs as $program): ?>
                                        <option value="<?php echo $program['id']; ?>"
                                            <?php echo ($enrollment['program_id'] == $program['id']) ? 'selected' : ''; ?>>
                                            <?php echo $program['program_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Course Dropdown -->
                            <div class="form-group">
                                <label for="course_id">Course</label>
                                <select name="course_id" class="form-control" required>
                                    <option value="">Select Course</option>
                                    <?php foreach($courses as $course): ?>
                                        <option value="<?php echo $course['id']; ?>"
                                            <?php echo ($enrollment['course_id'] == $course['id']) ? 'selected' : ''; ?>>
                                            <?php echo $course['course_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Training Dropdown -->
                            <div class="form-group">
                                <label for="training_id">Training</label>
                                <select name="training_id" class="form-control" required>
                                    <option value="">Select Training</option>
                                    <?php foreach($trainings as $training): ?>
                                        <option value="<?php echo $training['id']; ?>"
                                            <?php echo ($enrollment['training_id'] == $training['id']) ? 'selected' : ''; ?>>
                                            <?php echo $training['training_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Start Date -->
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="<?php echo $enrollment['start_date']; ?>" required>
                            </div>

                            <!-- End Date -->
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" value="<?php echo $enrollment['end_date']; ?>" required>
                            </div>

                            <!-- Enrollment Status -->
                            <div class="form-group">
                                <label for="status">Enrollment Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="active" <?php echo ($enrollment['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactive" <?php echo ($enrollment['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
