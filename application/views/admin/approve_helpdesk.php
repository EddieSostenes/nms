<div class="content-wrapper">
    <section class="content-header">
        <h1>Approve Helpdesk Requests</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Helpdesk Approval</li>
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
                        <h3 class="box-title">Pending Helpdesk Requests</h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="helpdesk-approval" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Issue</th>
                                        <th>Status</th>
                                        <th>Submitted On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($tickets)): ?>
                                        <?php foreach ($tickets as $ticket): ?>
                                            <tr>
                                                <td><?php echo $ticket['full_name']; ?></td>
                                                <td><?php echo $ticket['issue_description']; ?></td>
                                                <td><?php echo ucfirst($ticket['status']); ?></td>
                                                <td><?php echo date('d M Y, H:i', strtotime($ticket['submitted_on'])); ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/helpdesk/action/'.$ticket['ticket_id']); ?>" class="btn btn-primary btn-xs">Take Action</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No pending helpdesk requests.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Include DataTables JavaScript -->
<script>
    $(document).ready(function() {
        $('#helpdesk-approval').DataTable();
    });
</script>
