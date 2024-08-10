<div class="container">
     <h1><?php echo $title; ?></h1>
     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>
     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <form action="<?php echo site_url('admin/update_payment'); ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $payment['id']; ?>">
          <div class="form-group">
               <label for="amount">Amount</label>
               <input type="text" name="amount" class="form-control" value="<?php echo number_format($payment['amount'], 2); ?>" required>
          </div>
          <div class="form-group">
               <label for="payment_method">Payment Method</label>
               <input type="text" name="payment_method" class="form-control" value="<?php echo $payment['payment_method']; ?>" required>
          </div>
          <div class="form-group">
               <label for="payment_date">Payment Date</label>
               <input type="datetime-local" name="payment_date" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($payment['payment_date'])); ?>" required>
          </div>
          <button type="submit" class="btn btn-primary">Update Payment</button>
     </form>
</div>