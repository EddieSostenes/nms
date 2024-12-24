<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Enrollment</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-enrollments'); ?>">Enrollment Management</a></li>
            <li class="active">Add Enrollment</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('add-enrollment'); ?>">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Enroll Student</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="student">Select Student</label>
                                <select name="student_id" class="form-control" required>
                                    <?php foreach ($students as $student): ?>
                                        <option value="<?php echo $student['student_id']; ?>"><?php echo $student['full_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="supervisor">Select Supervisor</label>
                                <select name="supervisor_id" class="form-control" required>
                                    <?php foreach ($supervisors as $supervisor): ?>
                                        <option value="<?php echo $supervisor['id']; ?>"><?php echo $supervisor['staff_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="program">Select Program</label>
                                <select name="program_id" class="form-control" required>
                                    <?php foreach ($programs as $program): ?>
                                        <option value="<?php echo $program['program_id']; ?>"><?php echo $program['program_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="course">Select Course</label>
                                <select name="course_id" class="form-control" required>
                                    <?php foreach ($courses as $course): ?>
                                        <option value="<?php echo $course['id']; ?>"><?php echo $course['course_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="training">Select Training</label>
                                <select name="training_id" class="form-control" required>
                                    <?php foreach ($trainings as $training): ?>
                                        <option value="<?php echo $training['id']; ?>"><?php echo $training['training_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Enrollment Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending">Pending</option>
                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Add Enrollment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
