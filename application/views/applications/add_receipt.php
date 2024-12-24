<!-- Receipt Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="receiptForm" method="post" action="<?php echo base_url('applications/submit_receipt'); ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="receiptModalLabel">Add Payment Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="student_id" id="receiptStudentId">
          
          <div class="form-group">
            <label for="receipt_file">Upload Receipt</label>
            <input type="file" class="form-control" name="receipt_file" id="receipt_file" required>
          </div>

          <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" class="form-control" name="payment_date" id="payment_date" required>
          </div>

          <!-- New Amount Input -->
          <div class="form-group">
            <label for="amount">Payment Amount</label>
            <input type="number" class="form-control" name="amount" id="amount" step="0.01" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Receipt</button>
        </div>
      </form>
    </div>
  </div>
</div>
