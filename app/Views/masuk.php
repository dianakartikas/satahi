<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LOGIN | SATAHI</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url(); ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url(); ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url(); ?>/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= route_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <h1>MASUK</h1>
                        <?php if ($config->validFields === ['email']) : ?>
                            <div>
                                <input type="email" class="form-control<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div>
                                <input type="text" class="form-control<?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div>
                            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success submit">Masuk</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Belum mempunyai Akun?
                                <a href="#signup" class="to_register"> Buat Akun </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-handshake"></i> SATAHI!</h1>
                                <p>©2022 Batang Toru</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>
                        <h1>Daftar Akun</h1>
                        <div>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        </div>
                        <div>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                        <div>
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success submit">Daftar</button>
                        </div>
                        <h8>Jika berhasil, menunggu konfirmasi superadmin untuk dapat masuk sistem</h8>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Sudah memiliki akun ?
                                <a href="#signin" class="to_register"> Masuk </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1> SATAHI!</h1>
                                <p>©2022 Batang Toru</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>