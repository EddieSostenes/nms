<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Currency</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-currency'); ?>">Currency Management</a></li>
            <li class="active">Edit Currency</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?php echo base_url('edit-currency/' . $currency['id']); ?>" enctype="multipart/form-data">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Currency</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="currency_name">Currency Name</label>
                                <input type="text" class="form-control" name="currency_name" value="<?php echo $currency['currency_name']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="currency_symbol">Currency Symbol</label>
                                <select name="currency_symbol" class="form-control" required>
                                    <option value="USD" <?php echo ($currency['currency_symbol'] == 'USD') ? 'selected' : ''; ?>>USD - United States Dollar</option>
                                    <option value="EUR" <?php echo ($currency['currency_symbol'] == 'EUR') ? 'selected' : ''; ?>>EUR - Euro</option>
                                    <option value="GBP" <?php echo ($currency['currency_symbol'] == 'GBP') ? 'selected' : ''; ?>>GBP - British Pound</option>
                                    <option value="JPY" <?php echo ($currency['currency_symbol'] == 'JPY') ? 'selected' : ''; ?>>JPY - Japanese Yen</option>
                                    <option value="CAD" <?php echo ($currency['currency_symbol'] == 'CAD') ? 'selected' : ''; ?>>CAD - Canadian Dollar</option>
                                    <option value="TZS" <?php echo ($currency['currency_symbol'] == 'TZS') ? 'selected' : ''; ?>>TZS - Tanzanian Shilling</option>
                                    <!-- Add more currency options as needed -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="flag">Current Flag</label><br>
                                <img src="<?php echo base_url('uploads/flags/' . $currency['flag']); ?>" alt="flag" width="50"><br><br>
                                <label for="flag">Upload New Flag</label>
                                <input type="file" class="form-control" name="flag">
                                <input type="hidden" name="current_flag" value="<?php echo $currency['flag']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="exchange_rate">Exchange Rate</label>
                                <input type="text" class="form-control" name="exchange_rate" value="<?php echo $currency['exchange_rate']; ?>" required>
                                <input type="checkbox" name="fetch_exchange_rate"> Fetch real-time exchange rate
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="active" <?php echo ($currency['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                    <option value="inactive" <?php echo ($currency['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Update Currency</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
