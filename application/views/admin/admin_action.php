<div class="content-wrapper">
    <section class="content-header">
        <h1>Take Action on HelpDesk Request</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">HelpDesk Action</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">HelpDesk Request from <b><?php echo $ticket['full_name']; ?></b></h3>
                    </div>

                    <form method="post" action="<?php echo base_url('admin/helpdesk/action/'.$ticket['ticket_id']); ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="issue_description">Issue Description</label>
                                <textarea class="form-control" rows="5" readonly><?php echo $ticket['issue_description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Action</label>
                                <select class="form-control" name="status" required>
                                    <option value="resolved">Resolved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reason">Add Feedback/Reason</label>
                                <textarea class="form-control" name="reason" rows="3" placeholder="Provide a reason for your action..." required></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit Action</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
