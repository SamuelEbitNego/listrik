<div class="container">
     <h1><?php echo $title; ?></h1>
     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>
     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>
     <form action="<?php echo site_url('user/submit_complaint'); ?>" method="post">
          <div class="form-group">
               <label for="complaint">Complaint</label>
               <textarea name="complaint" id="complaint" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
     </form>
</div>