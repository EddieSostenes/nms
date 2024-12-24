<!-- Control Number Modal -->
<div class="modal fade" id="controlNumberModal" tabindex="-1" role="dialog" aria-labelledby="controlNumberModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Form for control number -->
      <form id="controlNumberForm" method="post" action="<?php echo base_url('applications/add_control_number'); ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="controlNumberModalLabel">Add or Update Control Number</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Hidden field to pass student ID -->
          <input type="hidden" name="student_id" id="controlNumberStudentId">
          <div class="form-group">
            <label for="control_number">Control Number</label>
            <input type="text" class="form-control" name="control_number" id="control_number" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Control Number</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function openControlNumberModal(student_id) {
    document.getElementById('controlNumberStudentId').value = student_id;
    $('#controlNumberModal').modal('show');
  }
</script>
