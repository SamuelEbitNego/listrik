<div class="container">
     <div class="row justify-content-center">
          <div class="col-lg-6">
               <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                         <center>
                              <h3>Register Listrik Aja</h3>
                         </center>
                    </div>
                    <div class="card-body">
                         <?php if ($this->session->flashdata('success')) : ?>
                              <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                         <?php endif; ?>

                         <?php if ($this->session->flashdata('error')) : ?>
                              <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                         <?php endif; ?>

                         <form action="<?php echo site_url('auth/register'); ?>" method="post">
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
                                   <label for="password_confirm">Confirm Password</label>
                                   <input type="password" name="password_confirm" id="password_confirm" class="form-control">
                                   <?php echo form_error('password_confirm', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <center>
                                   <button type="submit" class="btn btn-primary">Register</button>
                              </center>
                         </form>
                    </div>
                    <div class="card-footer text-center">
                         <a href="<?php echo site_url('auth/login'); ?>">Sudah mempunyai akun ? Login disini</a>
                    </div>
               </div>
          </div>
     </div>
</div>