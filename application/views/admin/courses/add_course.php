<!-- application/views/admin/add_course.php -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add Course
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Courses</a></li>
            <li class="active">Add Course</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <?php if($this->session->flashdata('success')): ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php elseif($this->session->flashdata('error')): ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Course</h3>
                    </div>
                    <form role="form" action="<?php echo base_url('courses/add_course'); ?>" method="POST">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_name">Course Name</label>
                                    <input type="text" name="course_name" class="form-control" placeholder="Course Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Course Category</label>
                                    <select name="course_category" class="form-control">
                                        <option value="Medical & Clinical">Medical & Clinical</option>
                                        <option value="Management & Leadership">Management & Leadership</option>
                                        <option value="IT & Data Science">IT & Data Science</option>
                                        <!-- Add more categories as needed -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" class="form-control" placeholder="e.g., 6 months" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Course Description</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Course Description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
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
