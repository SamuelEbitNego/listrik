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
                         <th>Komplain</th>
                         <th>Respon</th>
                         <th>Status</th>
                         <th>Waktu</th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($complaints as $complaint) : ?>
                         <tr>
                              <td><?php echo $complaint['id']; ?></td>
                              <td><?php echo $complaint['complaint']; ?></td>
                              <td><?php echo $complaint['response']; ?></td>
                              <td><?php echo ucfirst($complaint['status']); ?></td>
                              <td><?php echo date('d-m-Y H:i:s', strtotime($complaint['created_at'])); ?></td>
                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </div>
</div>