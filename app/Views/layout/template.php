<!DOCTYPE html>
<html lang="zxx">


<title><?= $title; ?></title>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tiga Bersaudara">
    <meta name="keywords" content="Tiga Bersaudara">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="/template/img/tb.png" rel="shortcut icon" />

    <!-- Google Font -->
    <!-- <link href="/template/https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet"> -->


    <!-- Stylesheets -->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/template/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/template/css/flaticon.css" />
    <link rel="stylesheet" href="/template/css/slicknav.min.css" />
    <link rel="stylesheet" href="/template/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/template/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/template/css/animate.css" />
    <link rel="stylesheet" href="/template/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/carousnap/carousnap@v1.4/carousnap/carousnap.css" type="text/css"/>
    <!-- My css -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">
                        <!-- logo -->
                        <a href="/" class="site-logo">
                            <img src="/template/img/tb.png" alt="">
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <!-- <form class="header-search-form">
                            <input type="text" placeholder="Pencarian Produk....">
                            <button><i class="flaticon-search"></i></button>
                        </form> -->
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="user-panel">
                            <div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a href="/pages/login">Sign</a> In or <a href="/pages/register">Create Account</a>
                            </div>
                            <div class="up-item">
                                <div class="shopping-card">
                                    <i class="flaticon-bag"></i>
                                </div>
                                <a href="/pages/keranjang">Keranjang Belanja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-navbar">
            <div class="container">


                <?= $this->include('layout/navbar'); ?>
                <?= $this->renderSection('content'); ?>


                <!-- Footer section -->
                <section class="footer-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget about-widget">
                                    <h2>Alamat</h2>
                                    <p class="text-white"><strong>Jl. Ahmad Yani,Lekong Dendek Dasan Tereng, Narmada. Kab. Lombok Barat, Nusa Tenggara Barat</strong></p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="footer-widget about-widget">
                                    <h2 class="text-white">Kontak Kami</h2>
                                    <P class="text-white"><strong>Email : syamsulaufa78@gmail.com <br><a href="https://wa.link/w3que3" class="wa">Telp/WA : +62878-5677-8689</a></strong></P>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Footer section end -->



                <!--====== Javascripts & Jquery ======-->
                <script src="/template/js/jquery-3.2.1.min.js"></script>
                <script src="/template/js/bootstrap.min.js"></script>
                <script src="/template/js/jquery.slicknav.min.js"></script>
                <script src="/template/js/owl.carousel.min.js"></script>
                <script src="/template/js/jquery.nicescroll.min.js"></script>
                <script src="/template/js/jquery.zoom.min.js"></script>
                <script src="/template/js/jquery-ui.min.js"></script>
                <script src="/template/js/main.js"></script>
                <script src="/css/jquery.fancybox.js"></script>
                <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/carousnap/carousnap@v1.4/carousnap/carousnap.js" id="scriptCarousnap"></script>
                <script>
                    $(document).ready(function() {
                        $("select.ukuran").change(function() {
                            var selectedCountry = $(this).children("option:selected").val();
                            if (selectedCountry == 'custom') {
                                // alert("You have selected the country - " + selectedCountry);
                                $("div.ukuran").append(" <input type='text' name='ukuran1' class='form-control mb-1' id='exampleFormControlInput1' placeholder='P (cm)'><input type='text' name='ukuran2' class='form-control' id='exampleFormControlInput1' placeholder='L (cm)'>");
                            } else {
                                $("div.ukuran").empty();
                            }
                        });
                    });
                </script>

</body>

</html>