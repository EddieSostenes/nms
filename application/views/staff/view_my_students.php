<div class="container">
    <h3>My Allocated Students</h3>

    <?php if(empty($students)): ?>
        <div class="alert alert-warning">No students assigned yet.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student): ?>
                <tr>
                    <td><?php echo $student['student_name']; ?></td>
                    <td><?php echo $student['student_email']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
