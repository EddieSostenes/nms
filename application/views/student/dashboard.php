<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Student Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <!-- Row for Programs and Enrollment Status -->
        <div class="row">
            <!-- Enrolled Programs Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Your Enrolled Programs</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <!-- Loop through the enrolled programs -->
                            <?php if (!empty($enrolled_programs)): ?>
                                <?php foreach ($enrolled_programs as $program): ?>
                                    <li class="list-group-item">
                                        <strong><?php echo $program['program_name']; ?></strong> 
                                        <span class="pull-right">
                                            <a href="<?php echo base_url('student/program_details/' . $program['program_id']); ?>" class="btn btn-primary btn-xs">Details</a>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No enrolled programs currently.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Enrollment Status & Feedback Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Enrollment Status</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if(!empty($enrolled_programs)): ?>
                                <?php foreach($enrolled_programs as $program): ?>
                                    <li class="list-group-item">
                                        Enrolled in: <strong><?php echo $program['program_name']; ?></strong>
                                        <span class="pull-right">Status: <strong><?php echo ucfirst($program['enrollment_status']); ?></strong></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">You are not enrolled in any programs currently.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row for Progress, Reports, and Certificates -->
        <div class="row">
            <!-- Program Progress Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Program Progress</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if(!empty($progress)): ?>
                                <?php foreach($progress as $program_progress): ?>
                                    <li class="list-group-item">
                                        <?php echo $program_progress['program_name']; ?>: <strong><?php echo $program_progress['progress_percentage']; ?>%</strong> Complete
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No progress data available yet.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Reports & Certificates Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reports & Certificates</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if(!empty($enrolled_programs)): ?>
                                <?php foreach($enrolled_programs as $program): ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo base_url('student/download_report/'.$program['program_id']); ?>">Download Report - <?php echo $program['program_name']; ?></a><br>
                                        <a href="<?php echo base_url('student/download_certificate/'.$program['program_id']); ?>">Download Certificate - <?php echo $program['program_name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No reports or certificates available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>





        <!-- Row for Program Schedules/Deadlines and Payment Information -->
        <div class="row">
            <!-- Program Schedules Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Program Schedules & Deadlines</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if (!empty($schedules)): ?>
                                <?php foreach ($schedules as $schedule): ?>
                                    <li class="list-group-item">
                                        <?php echo $schedule['program_name']; ?>: Next session on <?php echo $schedule['start_date']; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No schedule information available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Payment Information Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment Information</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if (!empty($payments)): ?>
                                <?php foreach ($payments as $payment): ?>
                                    <li class="list-group-item">
                                        Payment for <?php echo $payment['program_name']; ?>: 
                                        <?php echo ucfirst($payment['status']); ?> - 
                                        Receipt: <a href="<?php echo base_url('student/download_receipt/'.$payment['payment_id']); ?>">Download</a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No payment records available.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>








        <!-- Row for Help Desk and Activity Logs -->
        <div class="row">
            <!-- Help Desk Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Help Desk</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if(!empty($help_desk)): ?>
                                <?php foreach($help_desk as $ticket): ?>
                                    <li class="list-group-item">
                                        Issue: <?php echo $ticket['issue_description']; ?> - Status: <?php echo ucfirst($ticket['status']); ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No help desk tickets.</li>
                            <?php endif; ?>
                            <a href="<?php echo base_url('student/submit_ticket'); ?>" class="btn btn-primary btn-block">Submit a New Ticket</a>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Daily Activity Logs Section -->
            <div class="col-lg-6 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daily Activity Logs</h3>
                    </div>
                    <div class="box-body">
                        <ul class="list-group">
                            <?php if(!empty($activities)): ?>
                                <?php foreach($activities as $activity): ?>
                                    <li class="list-group-item">
                                        Activity: <?php echo $activity['activity_description']; ?> - Date: <?php echo $activity['date']; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">No activity logs available.</li>
                            <?php endif; ?>
                            <a href="<?php echo base_url('student/add_daily_activity'); ?>" class="btn btn-success btn-block">Add New Activity</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
