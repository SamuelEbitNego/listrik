<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $title; ?></title>
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"> <!-- Optional custom styles -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
     <link rel="icon" href="<?php echo base_url('assets/img/logo.png'); ?>">
</head>

<body id=" page-top">
     <div id="wrapper">
          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
               <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('admin/dashboard'); ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                         <i class="fas fa-laptop-house"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
               </a>
               <hr class="sidebar-divider my-0">
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('admin/dashboard'); ?>">
                         <i class="fas fa-fw fa-tachometer-alt fa-beat"></i>
                         <span>Home</span>
                    </a>
               </li>

               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('admin/users'); ?>">
                         <i class="fas fa-fw fa-users fa-beat"></i>
                         <span>Manage Users</span>
                    </a>
               </li>

               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('admin/manage_payments'); ?>">
                         <i class="fas fa-fw fa-users fa-beat"></i>
                         <span>Manage Payment</span>
                    </a>
               </li>

               <!-- Nav Item - View Bills -->
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('admin/bills'); ?>">
                         <i class="fas fa-fw fa-file-invoice fa-beat"></i>
                         <span>View Bills</span>
                    </a>
               </li>

               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('admin/complaints'); ?>">
                         <i class="fas fa-fw fa-comments fa-beat"></i>
                         <span>Manage Complaints</span>
                    </a>
               </li>
               <!-- Additional admin menu items can go here -->
               <hr class="sidebar-divider">
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('auth/logout'); ?>">
                         <i class="fa-regular fa-rectangle-xmark fa-beat"></i>
                         <span>Logout</span>
                    </a>
               </li>
          </ul>
          <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">
               <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                         <ul class="navbar-nav ml-auto">
                              <li class="nav-item dropdown no-arrow">
                                   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('username'); ?></span>
                                        <i class="fas fa-user-circle fa-2x"></i>
                                   </a>
                              </li>
                         </ul>
                    </nav>