<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Unitrack</title>
<meta content="" name="description"/>
<meta content="" name="keywords"/>
<!-- Favicons -->
<link href="{{ asset('unitrack-site/assets/img/favicon.png') }}" rel="icon"/>
<link href="{{ asset('unitrack-site/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"/>
<!-- Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet"/>
<!-- Vendor CSS Files -->
<link href="{{ asset('unitrack-site/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('unitrack-site/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"/>
<link href="{{ asset('unitrack-site/assets/vendor/aos/aos.css') }}" rel="stylesheet"/>
<link href="{{ asset('unitrack-site/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('unitrack-site/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('unitrack-site/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"/>
<!-- Main CSS File -->
<link href="{{ asset('unitrack-site/assets/css/main.css') }}" rel="stylesheet"/>
<!-- =======================================================
  * Template Name: Clinic
  * Template URL: https://bootstrapmade.com/clinic-bootstrap-template/
  * Updated: Jul 23 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body class="index-page">

<header class="header fixed-top" id="header">
<div class="topbar d-flex align-items-center dark-background">
<div class="container d-flex justify-content-center justify-content-md-between">
<div class="contact-info d-flex align-items-center">
<i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
<i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
</div>
<div class="social-links d-none d-md-flex align-items-center">
<a class="twitter" href="#!"><i class="bi bi-twitter-x"></i></a>
<a class="facebook" href="#!"><i class="bi bi-facebook"></i></a>
<a class="instagram" href="#!"><i class="bi bi-instagram"></i></a>
<a class="linkedin" href="#!"><i class="bi bi-linkedin"></i></a>
</div>
</div>
</div><!-- End Top Bar -->
<div class="branding d-flex align-items-cente">
<div class="container position-relative d-flex align-items-center justify-content-between">
<a class="logo d-flex align-items-center" href="index.html">
<!-- Uncomment the line below if you also wish to use an image logo -->
<!-- <img src="assets/img/logo.webp" alt=""> -->
<h1 class="sitename">Unitrack</h1>
</a>
<nav class="navmenu" id="navmenu">
<ul>
<li><a class="active" href="{{ url('/') }}">Home</a></li>
<li><a href="{{ url('/about') }}">About</a></li>
<li><a href="{{ url('/departments') }}">Departments</a></li>
<li><a href="{{ url('/services') }}">Services</a></li>
<li><a href="{{ url('/doctors') }}">Doctors</a></li>
<li class="dropdown"><a href="#"><span>More Pages</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="{{ url('/department-details') }}">Department Details</a></li>
<li><a href="{{ url('/service-details') }}">Service Details</a></li>
<li><a href="{{ url('/appointment') }}">Appointment</a></li>
<li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
<li><a href="{{ url('/faq') }}">Frequently Asked Questions</a></li>
<li><a href="{{ url('/gallery') }}">Gallery</a></li>
<li><a href="{{ url('/terms') }}">Terms</a></li>
<li><a href="{{ url('/privacy') }}">Privacy</a></li>
<li><a href="{{ url('/404') }}">404</a></li>
</ul>
</li>
<li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="#">Dropdown 1</a></li>
<li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
<ul>
<li><a href="#">Deep Dropdown 1</a></li>
<li><a href="#">Deep Dropdown 2</a></li>
<li><a href="#">Deep Dropdown 3</a></li>
<li><a href="#">Deep Dropdown 4</a></li>
<li><a href="#">Deep Dropdown 5</a></li>
</ul>
</li>
<li><a href="#">Dropdown 2</a></li>
<li><a href="#">Dropdown 3</a></li>
<li><a href="#">Dropdown 4</a></li>
</ul>
</li>
<li><a href="{{ url('/contact') }}">Contact</a></li>
</ul>
<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
</div>
</div>
</header>

<main class="main">
    @yield('content')
</main>

<footer class="footer-16 footer position-relative" id="footer">
<div class="container">
<div class="footer-main" data-aos="fade-up" data-aos-delay="100">
<div class="row align-items-start">
<div class="col-lg-5">
<div class="brand-section">
<a class="logo d-flex align-items-center mb-4" href="index.html">
<span class="sitename">Unitrack</span>
</a>
<p class="brand-description">Crafting exceptional digital experiences through thoughtful design and
                innovative solutions that elevate your brand presence.</p>
<div class="contact-info mt-5">
<div class="contact-item">
<i class="bi bi-geo-alt"></i>
<span>123 Creative Boulevard, Design District, NY 10012</span>
</div>
<div class="contact-item">
<i class="bi bi-telephone"></i>
<span>+1 (555) 987-6543</span>
</div>
<div class="contact-item">
<i class="bi bi-envelope"></i>
<span>hello@designstudio.com</span>
</div>
</div>
</div>
</div>
<div class="col-lg-7">
<div class="footer-nav-wrapper">
<div class="row">
<div class="col-6 col-lg-3">
<div class="nav-column">
<h6>Studio</h6>
<nav class="footer-nav">
<a href="#!">Our Story</a>
<a href="#!">Design Process</a>
<a href="#!">Portfolio</a>
<a href="#!">Case Studies</a>
<a href="#!">Awards</a>
</nav>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="nav-column">
<h6>Services</h6>
<nav class="footer-nav">
<a href="#!">Brand Identity</a>
<a href="#!">Web Design</a>
<a href="#!">Mobile Apps</a>
<a href="#!">Digital Strategy</a>
<a href="#!">Consultation</a>
</nav>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="nav-column">
<h6>Resources</h6>
<nav class="footer-nav">
<a href="#!">Design Blog</a>
<a href="#!">Style Guide</a>
<a href="#!">Free Assets</a>
<a href="#!">Tutorials</a>
<a href="#!">Inspiration</a>
</nav>
</div>
</div>
<div class="col-6 col-lg-3">
<div class="nav-column">
<h6>Connect</h6>
<nav class="footer-nav">
<a href="#!">Start Project</a>
<a href="#!">Schedule Call</a>
<a href="#!">Join Newsletter</a>
<a href="#!">Follow Updates</a>
<a href="#!">Partnership</a>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer-bottom">
<div class="container">
<div class="bottom-content" data-aos="fade-up" data-aos-delay="300">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="copyright">
<p>© <span class="sitename">Unitrack</span>. All rights reserved.</p>
</div>
</div>
<div class="col-lg-6">
<div class="legal-links">
<a href="#!">Privacy Policy</a>
<a href="#!">Terms of Service</a>
<a href="#!">Cookie Policy</a>
<div class="credits">
<!-- All the links in the footer should remain intact. -->
<!-- You can delete the links only if you've purchased the pro version. -->
<!-- Licensing information: https://bootstrapmade.com/license/ -->
<!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>. Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>

</body>
</html>
