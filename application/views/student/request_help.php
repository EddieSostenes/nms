<div class="content-wrapper">
    <section class="content-header">
        <h1>Request Help</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Request Help</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Submit a Help Request</h3>
                    </div>

                    <form method="post" action="<?php echo base_url('helpdesk/request'); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="issue_description">Describe Your Issue</label>
                                <textarea class="form-control" name="issue_description" id="issue_description" rows="5" placeholder="Describe the issue you're facing..." required></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
