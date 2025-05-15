<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BLOG - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/style.css">
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="<?=base_url(); ?>public/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url(); ?>public/assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                 
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="public/assets/img/user.png" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                    
                            <a href="<?= base_url('logout') ?>" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="public/assets/img/logo.png" class="header-logo" />
                            <span class="logo-name">BLOG</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                      
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="briefcase"></i><span>Blogs</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo base_url() ?>getaddblog">Create Blog</a></li>
                                <li><a class="nav-link" href="<?php echo base_url() ?>getbloglist">blog list</a></li>
                            </ul>
                        </li>
                     
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->