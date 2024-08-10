<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('user/dashboard'); ?>">
          <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-laptop-house"></i>
          </div>
          <div class="sidebar-brand-text mx-3">User Dashboard</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('user/dashboard'); ?>">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span>
          </a>
     </li>

     <!-- Nav Item - Pay Bills -->
     <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/pay_bills'); ?>">
               <i class="fas fa-fw fa-money-check-alt"></i>
               <span>Pay Bills</span>
          </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
          <button class="btn btn-primary" id="sidebarToggle">Toggle Sidebar</button>
     </div>
</ul>