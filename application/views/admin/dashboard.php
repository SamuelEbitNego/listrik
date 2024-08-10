<div class="container">
     <h1><?php echo $title; ?></h1>

     <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
     <?php endif; ?>

     <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
     <?php endif; ?>

     <div class="row">
          <div class="col-lg-3 col-md-6">
               <div class="card">
                    <div class="card-header bg-primary text-white">
                         Total Users
                    </div>
                    <div class="card-body">
                         <h2><?php echo $total_users; ?></h2>
                    </div>
               </div>
          </div>

          <div class="col-lg-3 col-md-6">
               <div class="card">
                    <div class="card-header bg-success text-white">
                         Total Bills
                    </div>
                    <div class="card-body">
                         <h2><?php echo $total_bills; ?></h2>
                    </div>
               </div>
          </div>

          <div class="col-lg-3 col-md-6">
               <div class="card">
                    <div class="card-header bg-warning text-white">
                         Unpaid Bills
                    </div>
                    <div class="card-body">
                         <h2><?php echo $unpaid_bills; ?></h2>
                    </div>
               </div>
          </div>

          <div class="col-lg-3 col-md-6">
               <div class="card">
                    <div class="card-header bg-danger text-white">
                         Overdue Bills
                    </div>
                    <div class="card-body">
                         <h2><?php echo $overdue_bills; ?></h2>
                    </div>
               </div>
          </div>
     </div>

     <div class="row mt-4">
          <div class="col-lg-12">
               <div class="card">
                    <div class="card-header bg-info text-white">
                         Recent Bills
                    </div>
                    <div class="card-body">
                         <table class="table table-striped">
                              <thead>
                                   <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Due Date</th>
                                        <th>Status</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($recent_bills as $bill) : ?>
                                        <tr>
                                             <td><?php echo $bill['id']; ?></td>
                                             <td><?php echo $bill['username']; ?></td>
                                             <td><?php echo $bill['amount']; ?></td>
                                             <td><?php echo $bill['due_date']; ?></td>
                                             <td><?php echo $bill['status']; ?></td>
                                        </tr>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>