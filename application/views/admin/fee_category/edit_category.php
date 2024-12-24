<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Fee Category</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-fee-categories'); ?>">Fee Category Management</a></li>
            <li class="active">Edit Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('edit-category/' . $category['id']); ?>">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Fee Category</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="<?php echo $category['category_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description"><?php echo $category['description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status">
                                    <option value="active" <?php echo ($category['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactive" <?php echo ($category['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
