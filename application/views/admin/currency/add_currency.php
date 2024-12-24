<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add Currency
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url('manage-currency'); ?>">Currency Management</a></li>
            <li class="active">Add Currency</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php elseif($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo base_url('add-currency'); ?>" enctype="multipart/form-data">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New Currency</h3>
                        </div>

                        <div class="box-body">
                            <!-- Currency Name -->
                            <div class="form-group">
                                <label for="currency_name">Currency Name</label>
                                <input type="text" class="form-control" name="currency_name" placeholder="Enter currency name (e.g., Tanzanian Shilling)" required>
                            </div>

                            <!-- Currency Symbol -->
                            <div class="form-group">
                                <label for="currency_symbol">Currency Symbol</label>
                                <select name="currency_symbol" class="form-control select2" style="width: 100%;" required>
                                    <option value="" disabled selected>Select Currency Symbol</option>
                                    <option value="USD">USD - United States Dollar</option>
                                    <option value="EUR">EUR - Euro</option>
                                    <option value="GBP">GBP - British Pound</option>
                                    <option value="JPY">JPY - Japanese Yen</option>
                                    <option value="JPY">CAD - Canadian Dollar</option>
                                    <option value="TZS">TZS - Tanzanian Shilling</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <!-- Flag -->
                            <div class="form-group">
                                <label for="flag">Currency Flag</label>
                                <input type="file" class="form-control" name="flag" accept="image/*">
                                <small class="text-muted">Upload an image representing the currency (e.g., a flag or symbol).</small>
                            </div>

                            <!-- Exchange Rate -->
                            <div class="form-group">
                                <label for="exchange_rate">Exchange Rate</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="exchange_rate" name="exchange_rate" placeholder="Enter exchange rate (e.g., 2300)" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" id="fetch_rate" type="button">Fetch Real-Time Rate</button>
                                    </span>
                                </div>
                                <small class="text-muted">Exchange rate is compared with Tanzanian Shilling (TZS).</small>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right">Add Currency</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        // When 'Fetch Real-Time Rate' button is clicked
        $('#fetch_rate').on('click', function() {
            const currencySymbol = $('select[name="currency_symbol"]').val();
            if (currencySymbol) {
                $.ajax({
                    url: "<?php echo base_url('currency/get_exchange_rate_ajax'); ?>",
                    type: "POST",
                    data: { currency_symbol: currencySymbol },
                    success: function(response) {
                        const data = JSON.parse(response);
                        if (data.exchange_rate) {
                            $('#exchange_rate').val(data.exchange_rate);
                        } else {
                            alert('Failed to fetch exchange rate.');
                        }
                    },
                    error: function() {
                        alert('Unable to fetch the exchange rate.');
                    }
                });
            } else {
                alert('Please select a currency symbol first.');
            }
        });
    });
</script>
