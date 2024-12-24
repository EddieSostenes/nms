<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Allocation</h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="<?php echo base_url('allocation/update/' . $allocation['id']); ?>">
    <!-- Hidden field for Student ID -->
    <input type="hidden" name="student_id" value="<?php echo $allocation['student_id']; ?>">

    <!-- Display Student Name -->
    <div class="form-group">
        <label for="student">Student</label>
        <input type="text" class="form-control" id="student" name="student_name" value="<?php echo $allocation['student_name']; ?>" readonly>
    </div>

    <!-- Dropdown for Supervisor Name -->
    <div class="form-group">
        <label for="staff_id">Select Supervisor</label>
        <select name="staff_id" class="form-control" required>
            <option value="">Select Supervisor</option>
            <?php foreach($staff as $supervisor): ?>
                <option value="<?php echo $supervisor['id']; ?>" <?php echo ($allocation['staff_id'] == $supervisor['id']) ? 'selected' : ''; ?>>
                    <?php echo $supervisor['staff_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Status Field -->
    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
            <option value="active" <?php echo ($allocation['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo ($allocation['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

            </div>
        </div>
    </section>
</div>
