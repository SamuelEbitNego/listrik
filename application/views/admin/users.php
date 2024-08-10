<div class="container">
     <h1><?php echo $title; ?></h1>

     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>

     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <a href="<?php echo site_url('admin/add_user'); ?>" class="btn btn-primary mb-3">Add New User</a>

     <table class="table table-striped">
          <thead>
               <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($users as $user) : ?>
                    <tr>
                         <td><?php echo $user['id']; ?></td>
                         <td><?php echo $user['username']; ?></td>
                         <td><?php echo $user['email']; ?></td>
                         <td><?php echo $user['role']; ?></td>
                         <td>
                              <a href="<?php echo site_url('admin/edit_user/' . $user['id']); ?>" class="btn btn-warning">Edit</a>
                              <a href="<?php echo site_url('admin/delete_user/' . $user['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                         </td>
                    </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</div>