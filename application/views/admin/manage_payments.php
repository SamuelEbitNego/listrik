<div class="container">
     <h1><?php echo $title; ?></h1>
     <div class="table-responsive">
          <table class="table table-striped table-bordered">
               <thead>
                    <tr>
                         <th>ID</th>
                         <th>Bill ID</th>
                         <th>Amount</th>
                         <th>Payment Method</th>
                         <th>Payment Date</th>
                         <th>Customer Name</th>
                         <th>Actions</th> <!-- Add Actions Column -->
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($payments as $payment) : ?>
                         <tr>
                              <td><?php echo $payment['id']; ?></td>
                              <td><?php echo $payment['bill_id']; ?></td>
                              <td><?php echo number_format($payment['amount'], 2); ?></td>
                              <td><?php echo $payment['payment_method']; ?></td>
                              <td><?php echo date('d-m-Y H:i:s', strtotime($payment['payment_date'])); ?></td>
                              <td><?php echo isset($payment['username']) ? $payment['username'] : 'N/A'; ?></td>
                              <td>
                                   <a href="<?php echo site_url('admin/edit_payment/' . $payment['id']); ?>" class="btn btn-warning">Edit</a>
                                   <a href="<?php echo site_url('admin/delete_payment/' . $payment['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this payment?');">Delete</a>
                              </td>
                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </div>
</div>