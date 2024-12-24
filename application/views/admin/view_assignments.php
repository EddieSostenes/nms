<div class="container">
    <h3>Student-Supervisor Assignments</h3>

    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Supervisor Name</th>
                <th>Allocation Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($assignments as $assignment): ?>
            <tr>
                <td><?php echo $assignment['student_name']; ?></td>
                <td><?php echo $assignment['supervisor_name']; ?></td>
                <td><?php echo $assignment['allocation_date']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
