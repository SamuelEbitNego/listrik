<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $title; ?></title>
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
     <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">
     <link rel="icon" href="<?php echo base_url('assets/img/logo.png'); ?>">
</head>

<body id=" page-top">
     <div id="wrapper">
          <!-- Sidebar -->
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
               <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('user/dashboard'); ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                         <i class="fas fa-laptop-house"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Dashboard</div>
               </a>
               <hr class="sidebar-divider my-0">
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('user/dashboard'); ?>">
                         <i class="fas fa-fw fa-tachometer-alt"></i>
                         <span>Home</span>
                    </a>
               </li>

               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('user/pay_bill'); ?>">
                         <i class="fas fa-fw fa-money-check-alt"></i>
                         <span>Pay Bills</span>
                    </a>
               </li>

               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('user/complaints'); ?>">
                         <i class="fas fa-fw fa-envelope"></i>
                         <span>My Complaints</span>
                    </a>
               </li>
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('user/submit_complaint'); ?>">
                         <i class="fas fa-fw fa-edit"></i>
                         <span>Submit Complaint</span>
                    </a>
               </li>
               <!-- Additional user menu items can go here -->
               <hr class="sidebar-divider">
               <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url('auth/login'); ?>">
                         <i class="fas fa-fw fa-money-check-alt"></i>
                         <span>Logout</span>
                    </a>
               </li>
          </ul>
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
                                   <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                             <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Settings
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">
                                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Logout
                                        </a>
                                   </div>
                              </li>
                         </ul>
                    </nav>