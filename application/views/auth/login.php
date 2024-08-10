<div class="container">
     <div class="row justify-content-center">
          <div class="col-lg-6">
               <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                         <center>
                              <h3>Login Listrik Aja</h3>
                         </center>
                    </div>
                    <div class="card-body">
                         <?php if ($this->session->flashdata('success')) : ?>
                              <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                         <?php endif; ?>

                         <?php if ($this->session->flashdata('error')) : ?>
                              <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                         <?php endif; ?>

                         <form action="<?php echo site_url('auth/login'); ?>" method="post">
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
                              <center>
                                   <button type="submit" class="btn btn-primary">Login</button>
                              </center>

                         </form>
                    </div>
                    <div class="card-footer text-center">
                         <a href="<?php echo site_url('auth/register'); ?>">Belum mempunyai akun? Daftar disini</a>
                    </div>
               </div>
          </div>
     </div>
</div>