<div class="container">
    <h1><?php echo $title; ?></h1>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <a href="<?php echo site_url('admin/add_bill'); ?>" <i class="fa-solid fa-wallet"></i> Add New Bill</a>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bills as $bill) : ?>
                <tr>
                    <td><?php echo $bill['id']; ?></td>
                    <td><?php echo $bill['username']; ?></td>
                    <td><?php echo $bill['amount']; ?></td>
                    <td><?php echo $bill['due_date']; ?></td>
                    <td><?php echo $bill['status']; ?></td>
                    <td>
                        <a href="<?php echo site_url('admin/delete_bill/' . $bill['id']); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>