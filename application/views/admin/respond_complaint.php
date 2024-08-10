<div class="container">
     <h1><?php echo $title; ?></h1>
     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>
     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>
     <form action="<?php echo site_url('admin/respond_complaint/' . $complaint['id']); ?>" method="post">
          <div class="form-group">
               <label for="complaint">Komplain</label>
               <textarea name="complaint" id="complaint" class="form-control" readonly><?php echo $complaint['complaint']; ?></textarea>
          </div>
          <div class="form-group">
               <label for="response">Respon</label>
               <textarea name="response" id="response" class="form-control" required><?php echo $complaint['response']; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Response</button>
     </form>
</div>