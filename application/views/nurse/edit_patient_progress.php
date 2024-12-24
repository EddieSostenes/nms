<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Patient Progress Report</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Patient Progress Report</a></li>
      <li class="active">Edit Report</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Edit Patient Progress Report</h3>
          </div>
          <?php echo form_open('nurse/PatientProgressController/update/' . $report['id']); ?>
          <div class="box-body">
            <div class="form-group">
              <label>Date and Time</label>
              <input type="datetime-local" name="date_time" value="<?php echo $report['date_time']; ?>" class="form-control" required>
            </div>
            <!-- Add other fields as per add form -->
            <div class="form-group">
              <label>Diagnosis</label>
              <textarea name="diagnosis" class="form-control rich-text" rows="5"><?php echo $report['diagnosis']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Narrate Information</label>
              <textarea name="narration" class="form-control rich-text" rows="5"><?php echo $report['narration']; ?></textarea>
            </div>
            <div class="form-group">
              <label>Treatment, Care & Plan</label>
              <textarea name="treatment_care_plan" class="form-control rich-text" rows="5"><?php echo $report['treatment_care_plan']; ?></textarea>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">Update</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>
</div>
