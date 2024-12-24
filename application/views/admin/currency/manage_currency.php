<div class="content-wrapper">
    <section class="content-header">
        <h1>Manage Currencies</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Currencies</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Currency List</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Flag</th>
                                    <th>Currency Name</th>
                                    <th>Symbol</th>
                                    <th>Exchange Rate</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($currencies as $currency): ?>
                                    <tr>
                                        <td><img src="<?php echo base_url('uploads/flags/'.$currency['flag']); ?>" alt="flag" width="30"></td>
                                        <td><?php echo $currency['currency_name']; ?></td>
                                        <td><?php echo $currency['currency_symbol']; ?></td>
                                        <td><?php echo $currency['exchange_rate']; ?></td>
                                        <td>
                                            <?php if($currency['status'] == 'active'): ?>
                                                <span class="label label-success">Active</span>
                                            <?php else: ?>
                                                <span class="label label-warning">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('edit-currency/'.$currency['id']); ?>" class="btn btn-sm btn-info">Edit</a>
                                            <a href="<?php echo base_url('delete-currency/'.$currency['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this currency?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
