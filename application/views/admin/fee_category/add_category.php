<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Fee Category</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-fee-categories'); ?>">Fee Categories</a></li>
            <li class="active">Add Fee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('add_category'); ?>">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Fee</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category">Fee Category</label>
                                <select name="category" class="form-control" id="category" onchange="updateDescription()" required>
                                    <option value="">Select Fee Category</option>
                                    <option value="Caution">Caution</option>
                                    <option value="Supervision">Supervision</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4" readonly></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Add Fee Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    function updateDescription() {
        var category = document.getElementById('category').value;
        var descriptionField = document.getElementById('description');
        if (category === "Caution") {
            descriptionField.value = "Caution fee is a refundable deposit paid at the start of the program to cover damages or other contingencies.";
        } else if (category === "Supervision") {
            descriptionField.value = "Supervision fee is paid for oversight and guidance provided by staff during the student’s training period.";
        } else {
            descriptionField.value = ""; // Clear the description if no category is selected
        }
    }
</script>
