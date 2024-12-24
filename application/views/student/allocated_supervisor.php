<div class="content-wrapper">
    <section class="content-header">
        <h1>Allocated Supervisor</h1>
    </section>
    
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Supervisor Profile</h3>
                    </div>
                    <div class="box-body box-profile">
                        <?php if ($supervisor): ?>
                            <div class="text-center">
                                <img class="profile-user-img img-responsive img-square" src="<?php echo base_url(); ?>assets/dist/img/<?php echo isset($supervisor['profile_picture']) ? $supervisor['profile_picture'] : 'mnh.png'; ?>" alt="Supervisor profile picture">
                            </div>
                            
                            <h3 class="profile-username text-center"><?php echo $supervisor['supervisor_name']; ?></h3>
                            <p class="text-muted text-center">Department: <?php echo $supervisor['department']; ?></p>
                            
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right"><?php echo $supervisor['email']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile</b> <a class="pull-right"><?php echo $supervisor['mobile']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address</b> <a class="pull-right"><?php echo $supervisor['address'] . ', ' . $supervisor['city'] . ', ' . $supervisor['state'] . ', ' . $supervisor['country']; ?></a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">No supervisor allocated to you yet.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
