<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $title; ?></title>
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
</head>

<body>
     <div class="container">
          <h1><?php echo $title; ?></h1>
          <?php if ($this->session->flashdata('success')) : ?>
               <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
          <?php endif; ?>
          <?php if ($this->session->flashdata('error')) : ?>
               <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
          <?php endif; ?>

          <div class="card">
               <div class="card-body">
                    <h5 class="card-title">Bill Details</h5>
                    <p class="card-text"><strong>Amount:</strong> <?php echo number_format($bill['amount'], 2); ?></p>
                    <p class="card-text"><strong>Due Date:</strong> <?php echo date('d-m-Y', strtotime($bill['due_date'])); ?></p>

                    <form action="<?php echo site_url('user/process_payment'); ?>" method="post">
                         <input type="hidden" name="bill_id" value="<?php echo $bill['id']; ?>">

                         <div class="form-group">
                              <label for="payment_method">Choose Payment Method:</label>
                              <select name="payment_method" id="payment_method" class="form-control">
                                   <option value="atm">ATM</option>
                                   <option value="va">Virtual Account (VA)</option>
                                   <option value="mbanking">Mobile Banking</option>
                                   <option value="digital_wallet">Digital Wallet (e.g., GoPay, OVO)</option>
                              </select>
                         </div>

                         <div class="form-group">
                              <a href="<?php echo site_url('user/pay_bill/' . $bill['id']); ?>" class="btn btn-primary">Pay</a>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>