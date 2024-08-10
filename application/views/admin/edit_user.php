<div class="container">
     <h1><?php echo $title; ?></h1>

     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <form action="<?php echo site_url('admin/edit_user/' . $user['id']); ?>" method="post">
          <div class="form-group">
               <label for="username">Username</label>
               <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username', $user['username']); ?>">
               <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email', $user['email']); ?>">
               <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
               <label for="role">Role</label>
               <select name="role" id="role" class="form-control">
                    <option value="user" <?php echo set_select('role', 'user', $user['role'] == 'user'); ?>>User</option>
                    <option value="admin" <?php echo set_select('role', 'admin', $user['role'] == 'admin'); ?>>Admin</option>
               </select>
               <?php echo form_error('role', '<small class="text-danger">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
     </form>
</div>