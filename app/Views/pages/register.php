<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/auth/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="/penggunaController/save" method="POST" class="register-form" id="register-form">
                            <?= csrf_field(); ?>

                            <div class="form-group row">
                                <label for="nama_lengkap" class="zmdi zmdi-account material-icons-name"></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError("nama_lengkap"); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" class="form-control <?= ($validation->hasError("email")) ? "is-invalid" : ""; ?>" id="email" name="email" placeholder="Email">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("email"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class="form-control id=" password" name="password" placeholder="password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("password"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <label for="no_hp"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" class="form-control <?= ($validation->hasError("no_hp")) ? "is-invalid" : ""; ?>" id="no_hp" name="no_hp" placeholder="Nomor Telepon">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("no_hp"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_wa"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" class="form-control <?= ($validation->hasError("no_wa")) ? "is-invalid" : ""; ?>" id="no_wa" name="no_wa" placeholder="Nomor Whatsapp">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("no_wa"); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/auth/images/rog.png" alt="sing up image"></figure>
                        <a href="/pages/login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- JS -->
        <script src="/auth/vendor/jquery/jquery.min.js"></script>
        <script src="/auth/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>