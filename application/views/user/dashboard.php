<div class="container">
     <h1><?php echo $title; ?></h1>
     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>
     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <div class="table-responsive">
          <table class="table table-striped table-bordered">
               <thead>
                    <tr>
                         <th>ID</th>
                         <th>Amount</th>
                         <th>Due Date</th>
                         <th>Status</th>
                         <th>Action</th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($bills as $bill) : ?>
                         <tr>
                              <td><?php echo $bill['id']; ?></td>
                              <td><?php echo number_format($bill['amount'], 2); ?></td>
                              <td><?php echo date('d-m-Y', strtotime($bill['due_date'])); ?></td>
                              <td><?php echo ucfirst($bill['status']); ?></td>
                              <td>
                                   <?php if ($bill['status'] == 'unpaid') : ?>
                                        <a href="<?php echo site_url('user/pay_bill/' . $bill['id']); ?>" class="btn btn-primary">Pay</a>
                                   <?php else : ?>
                                        <button class="btn btn-success">Paid</button>
                                   <?php endif; ?>
                                   <a href="<?php echo site_url('user/delete_bill/' . $bill['id']); ?>" class="btn btn-danger">Delete</a>
                              </td>

                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </div>
</div>