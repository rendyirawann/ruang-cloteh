<?php
error_reporting(1);
require "../base/koneksi.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //inisialisasi username dari login
    $queryUser = "SELECT * FROM users WHERE username = '$username'";
    $resultUser = $conn->query($queryUser)->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruang Cloteh | Landing Page</title>

    <!-- Css Custom -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- Boxicons -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendor/boxicons/css/boxicons.min.css">

    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,200&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- Navbar Start -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" type="submit" href="<?= BASE_URL ?>admin.php">
                <img src="<?= BASE_URL ?>assets/img/icon-rc-edit.png" class="d-inline-block align-top" alt="">
                <h5 class="text1">Ruang&nbsp;</h5>
                <h5 class="text2">Cloteh</h5>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" data-scroll data-easing="easeInOutQuad" href="#home">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll data-easing="easeInOutQuad" href="#about">About Us</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-scroll data-easing="easeInOutQuad" href="#project">Project Team</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-scroll data-easing="easeInOutQuad" href="#contact">Contact</a>
                    </li>
                </ul>
                <li class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"><strong>
                                    <?php echo $_SESSION['username']; ?>
                                </strong></i>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= BASE_URL ?>index.php"><button type="button"
                                    class="btn btn-danger">Logout &#8594;</button></a>

                        </div>
                    </li>
                <!-- <div class="form-login">
                    <a href="log.php"><button type="submit" class="btn btn-sign-in btn-round ml-auto">
                            Login
                        </button></a>

                </div> -->
            </div>
    </nav>

    <!-- Navbar End -->

    <!-- Header Start -->

    <div class="header container-fluid" id="home">
        <div class="caption">
            <div class="row">
                <div class="col-lg-12 d-none d-xl-block d-lg-block d-md-block">
                    <h5 class="blur">e-Cash Application</h5>
                    <h1 class="blur">Ruang Cloteh</h1>
                    <p class="blur">Tiada Hari Tanpa Sebuah Cerita</p>
                    <a href="<?= BASE_URL ?>admin.php"><button type="button" class="btn btn-warning">
                            Get Started &rarr;
                        </button></a>

                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= BASE_URL ?>assets/img/bg-rc.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="<?= BASE_URL ?>assets/img/bg2-rc.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="<?= BASE_URL ?>assets/img/bg3-rc.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="<?= BASE_URL ?>assets/img/bg4-rc.jpg" class="d-block w-100" alt="..." />
                </div>
                <section class="ftco-intro">
                    <div class="container-wrap">
                        <div class="wrap d-md-flex align-items-xl-end">
                            <div class="info">
                                <div class="row no-gutters">
                                    <div class="col-md-4 d-flex ftco-animate">
                                        <div class="icon"><span class="fa fa-phone" aria-hidden="true"></span></div>
                                        <div class="text">
                                            <h3>+62 877-9662-7140</h3>
                                            <p>A small river named Duden flows by their place and supplies.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex ftco-animate">
                                        <div class="icon"><span class="fa fa-map-marker" aria-hidden="true"></span>
                                        </div>
                                        <div class="text">
                                            <h3>Jl. Eka Jati No.b, Gedung Johor</h3>
                                            <p> Kec. Medan Johor, Kota Medan, Sumatera
                                                Utara 20144</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex ftco-animate">
                                        <div class="icon"><span class="fa fa-clock-o" aria-hidden="true"></span></div>
                                        <div class="text">
                                            <h3>Open Monday-Sunday</h3>
                                            <p>7:00pm - 11:59pm</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>

        </div>
    </div>



    <!-- Header End -->

    <!-- About Us Start -->

    <div class="about" id="about">
        <div class="container-fixed">
            <div class="row">
                <div class="col col-about">
                    <h1>About Us</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="<?= BASE_URL ?>assets/img/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>
        </div>
    </div>
            </div>

            <!-- About Us End -->

    <!-- Contact Start -->

    <div id="contact" class="contact">
        <div class="container">
            <div class="section-title col-contact">
                <h1>Contact</h1>
                <p>contact us for any inquiries</p>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>Jl. Eka Jati No.b, Gedung Johor, Kec. Medan Johor, Kota Medan, Sumatera Utara 20144</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email Us</h3>
                        <p>ruangcloteh24@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Call Us</h3>
                        <p>+62 877-9662-7140</p>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31858.193369903085!2d98.6823428317993!3d3.5239899218963893!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcbb712b697a58097!2sRuang%20Cloteh!5e0!3m2!1sid!2sid!4v1651293329409!5m2!1sid!2sid"
                        width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    required />
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required />
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required />
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="pt-5 pb-4">

        <div class="container text-center text-md-left">

            <div class="row text-center text-md-left">

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">About Us</h5>
                    <hr class="mb-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore
                        et dolore magna aliqua. Ut enim minim veniam, nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. </p>

                </div>



                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-info">Contact</h5>
                    <hr class="mb-4">
                    <p>
                        <i class="fa fa-home mr-3"></i>Jl. Eka Jati No.b, Gedung Johor, Kec. Medan Johor, Kota Medan,
                        Sumatera Utara 20144
                    </p>
                    <p>
                        <i class="fa fa-envelope mr-3"></i>ruangcloteh24@gmail.com
                    </p>
                    <p>
                        <i class="fa fa-phone mr-3"></i>+12 3456789
                    </p>
                    <p>
                        <i class="fa fa-print	 mr-3"></i>+12 3456789
                    </p>
                </div>

            </div>

            <hr class="mb-4">
            <div class=" row d-flex justify-content-center">
                <div>
                    <p> Copyright ©2022 All rights reserved by:
                        <a href="#" style="text-decoration: none;">
                            <strong class="text-info">Ruang Cloteh</strong>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="text-center ">

                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-dark"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=" text-dark"><i class="fab fa-google-plus"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=" text-dark"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=" text-dark"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

        </div>
    </footer>
    <!-- Footer End -->

    <!-- JS Custom -->
    <script src="assets/js/script.js"></script>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>