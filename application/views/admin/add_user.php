<div class="container">
     <h1><?php echo $title; ?></h1>

     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <form action="<?php echo site_url('admin/add_user'); ?>" method="post">
          <div class="form-group">
               <label for="username">Username</label>
               <input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username'); ?>">
               <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>">
               <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
               <label for="password">Password</label>
               <input type="password" name="password" id="password" class="form-control">
               <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
               <label for="role">Role</label>
               <select name="role" id="role" class="form-control">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
               </select>
               <?php echo form_error('role', '<small class="text-danger">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Add User</button>
     </form>
</div>