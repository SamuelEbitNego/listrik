<!DOCTYPE html>
<html lang="en">

<head>
     <!-- ... -->
</head>

<body id="page-top">
     <div id="wrapper">
          <?php $this->load->view('templates/user_sidebar'); ?>
          <div id="content-wrapper" class="d-flex flex-column">
               <div id="content">
                    <?php $this->load->view('templates/user_topbar'); ?>
                    <div class="container-fluid">
                         <!-- Your content goes here -->
                    </div>
               </div>
               <?php $this->load->view('templates/footer'); ?>
          </div>
     </div>
</body>

</html>