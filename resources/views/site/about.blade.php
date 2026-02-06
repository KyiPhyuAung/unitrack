@extends('layouts.site')

@section('content')

<!-- Page Title -->
<div class="page-title">
<div class="heading">
<div class="container">
<div class="row d-flex justify-content-center text-center">
<div class="col-lg-8">
<h1 class="heading-title">About</h1>
<p class="mb-0">
                Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo
                odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum
                debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat
                ipsum dolorem.
              </p>
</div>
</div>
</div>
</div>
<nav class="breadcrumbs">
<div class="container">
<ol>
<li><a href="index.html">Home</a></li>
<li class="current">About</li>
</ol>
</div>
</nav>
</div><!-- End Page Title -->
<!-- About Section -->
<section class="about section" data-aos="fade-up" data-aos-delay="50" id="about">
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row align-items-center">
<div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
<div class="about-content">
<h2>Compassionate Care for Every Family</h2>
<p class="lead">For over two decades, we have been dedicated to providing exceptional healthcare services
                to our community. Our commitment goes beyond medical treatment—we believe in building lasting
                relationships with our patients and their families.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</p>
<div class="stats-grid">
<div class="stat-item">
<span class="stat-number" data-purecounter-duration="2" data-purecounter-end="15000" data-purecounter-start="0">15000</span>
<span class="stat-label">Patients Treated</span>
</div>
<div class="stat-item">
<span class="stat-number" data-purecounter-duration="2" data-purecounter-end="25" data-purecounter-start="0">25</span>
<span class="stat-label">Years Experience</span>
</div>
<div class="stat-item">
<span class="stat-number" data-purecounter-duration="2" data-purecounter-end="50" data-purecounter-start="0">50</span>
<span class="stat-label">Medical Specialists</span>
</div>
</div><!-- End Stats Grid -->
</div><!-- End About Content -->
</div>
<div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
<div class="image-wrapper">
<img alt="Healthcare facility" class="img-fluid main-image" src="{{ asset('unitrack-site/assets/img/health/facilities-6.webp') }}"/>
<div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
<img alt="Medical team" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-8.webp') }}"/>
</div>
</div><!-- End Image Wrapper -->
</div>
</div>
<div class="values-section" data-aos="fade-up" data-aos-delay="300">
<div class="row">
<div class="col-lg-12 text-center">
<h3>Our Core Values</h3>
<p class="section-description">These principles guide everything we do in our commitment to exceptional
                healthcare</p>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
<div class="value-item">
<div class="value-icon">
<i class="bi bi-heart-pulse"></i>
</div>
<h4>Compassion</h4>
<p>Providing care with empathy and understanding for every patient's unique needs and circumstances.</p>
</div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
<div class="value-item">
<div class="value-icon">
<i class="bi bi-shield-check"></i>
</div>
<h4>Excellence</h4>
<p>Maintaining the highest standards of medical care through continuous learning and innovation.</p>
</div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
<div class="value-item">
<div class="value-icon">
<i class="bi bi-people"></i>
</div>
<h4>Integrity</h4>
<p>Building trust through honest communication and ethical practices in all our interactions.</p>
</div>
</div>
<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
<div class="value-item">
<div class="value-icon">
<i class="bi bi-lightbulb"></i>
</div>
<h4>Innovation</h4>
<p>Embracing cutting-edge technology and treatments to improve patient outcomes.</p>
</div>
</div>
</div><!-- End Values Row -->
</div><!-- End Values Section -->
<div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
<div class="row">
<div class="col-lg-12 text-center">
<h3>Accreditations &amp; Certifications</h3>
<p class="section-description">Recognized by leading healthcare organizations for our commitment to
                quality care</p>
</div>
</div>
<div class="row justify-content-center">
<div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="100">
<div class="certification-item">
<img alt="Healthcare certification" class="img-fluid" src="{{ asset('unitrack-site/assets/img/clients/clients-1.webp') }}"/>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="200">
<div class="certification-item">
<img alt="Medical accreditation" class="img-fluid" src="{{ asset('unitrack-site/assets/img/clients/clients-2.webp') }}"/>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="300">
<div class="certification-item">
<img alt="Healthcare certification" class="img-fluid" src="{{ asset('unitrack-site/assets/img/clients/clients-3.webp') }}"/>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="400">
<div class="certification-item">
<img alt="Medical certification" class="img-fluid" src="{{ asset('unitrack-site/assets/img/clients/clients-4.webp') }}"/>
</div>
</div>
<div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="500">
<div class="certification-item">
<img alt="Healthcare accreditation" class="img-fluid" src="{{ asset('unitrack-site/assets/img/clients/clients-5.webp') }}"/>
</div>
</div>
</div><!-- End Certifications Row -->
</div><!-- End Certifications Section -->
</div>
</section><!-- /About Section -->

@endsection
