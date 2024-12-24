<div class="content-wrapper">
    <section class="content-header">
        <h1>Help Request Status</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Request Status</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Your Help Desk Requests</h3>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="helpdesk-status" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Issue</th>
                                        <th>Status</th>
                                        <th>Submitted On</th>
                                        <th>Admin Feedback</th>
                                        <th>Resolved At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($tickets)): ?>
                                        <?php foreach ($tickets as $ticket): ?>
                                            <tr>
                                                <td><?php echo $ticket['issue_description']; ?></td>
                                                <td><?php echo ucfirst($ticket['status']); ?></td>
                                                <td><?php echo date('d M Y, H:i', strtotime($ticket['submitted_on'])); ?></td>
                                                <td><?php echo !empty($ticket['admin_reason']) ? $ticket['admin_reason'] : 'Pending'; ?></td>
                                                <td><?php echo ($ticket['resolved_at']) ? date('d M Y, H:i', strtotime($ticket['resolved_at'])) : 'N/A'; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No helpdesk requests yet.</td>
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
        $('#helpdesk-status').DataTable();
    });
</script>
