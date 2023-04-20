<?= $this->include('header'); ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= base_url(); ?>/beranda" class="site_title"><img src="<?= base_url(); ?>/assets/img/logo.png" alt="Sipadu Logo"> <span>S A T A H I</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?= base_url(); ?>/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?= user()->username; ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <?= $this->include('sidebar'); ?>

                    <?= $this->include('navbar'); ?>

                </div>
            </div>

            <?= $this->include('topbar'); ?>
            <!-- page content -->
            <div class="right_col" role="main">

                <?= $this->renderSection('content'); ?>
            </div>
            <?= $this->include('footer'); ?>
        </div>
    </div>