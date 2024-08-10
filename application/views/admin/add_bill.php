<div class="container">
    <h1><?php echo $title; ?></h1>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <form action="<?php echo site_url('admin/add_bill'); ?>" method="post">
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select User</option>
                <?php foreach ($users as $user) : ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('user_id', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo set_value('amount'); ?>">
            <?php echo form_error('amount', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="<?php echo set_value('due_date'); ?>">
            <?php echo form_error('due_date', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Add Bill</button>
    </form>
</div>
