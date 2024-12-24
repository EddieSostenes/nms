<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Program Fee</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Program Management</a></li>
            <li class="active">Add Program Fee</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Program Fee</h3>
                    </div>
                    <form method="post" action="<?php echo base_url('add-program-fee'); ?>">
                        <div class="box-body">
                            <!-- Program Selection -->
                            <div class="form-group">
                                <label for="program_id">Select Program</label>
                                <select class="form-control" name="program_id" required>
                                    <?php foreach($programs as $program): ?>
                                        <option value="<?php echo $program['program_id']; ?>"><?php echo $program['program_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Program Fee -->
                            <div class="form-group">
                                <label for="price">Program Fee</label>
                                <input type="text" class="form-control" name="price" placeholder="Enter Program Fee" required>
                            </div>

                            <!-- Student Type Selection -->
                            <div class="form-group">
                                <label for="student_type">Student Type</label>
                                <select class="form-control" name="student_type" required>
                                    <option value="Local">Local</option>
                                    <option value="International">International</option>
                                    <option value="Abroad">Abroad</option>
                                    <option value="All Student Types">All Student Types</option>

                                </select>
                            </div>

                            <!-- Currency Selection -->
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select class="form-control" name="currency" required>
                                    <option value="" disabled selected>Select Currency</option>
                                    <option value="USD">USD - United States Dollar</option>
                                    <option value="EUR">EUR - Euro</option>
                                    <option value="GBP">GBP - British Pound</option>
                                    <option value="JPY">JPY - Japanese Yen</option>
                                    <option value="CAD">CAD - Canadian Dollar</option>
                                    <option value="TZS">TZS - Tanzanian Shilling</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <!-- Program Level Selection -->
                            <div class="form-group">
                                <label for="level">Program Level</label>
                                <select class="form-control" name="level" required>
                                    <option value="" disabled selected>Select Program Level</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Degree">Degree</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Phd">PhD</option>
                                </select>
                            </div>

                            <!-- Duration Input -->
                            <div class="form-group">
                                <label for="duration">Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="e.g., 3 Months" required>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
