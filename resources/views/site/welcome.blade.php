@extends('layouts.site')

@section('content')

<!-- Hero Section -->
<section class="hero section" data-aos="fade-up" data-aos-delay="50" id="hero">
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="hero-content">
<div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
<div class="badge-item">
<i class="bi bi-shield-check"></i>
<span>Accredited</span>
</div>
<div class="badge-item">
<i class="bi bi-clock"></i>
<span>24/7 Emergency</span>
</div>
<div class="badge-item">
<i class="bi bi-star-fill"></i>
<span>4.9/5 Rating</span>
</div>
</div>
<h1 data-aos="fade-right" data-aos-delay="300">
                Excellence in <span class="highlight">Healthcare</span> With Compassionate Care
              </h1>
<p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
              </p>
<div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
<div class="stat-item">
<h3><span class="purecounter" data-purecounter-duration="2" data-purecounter-end="15" data-purecounter-start="0"></span>+</h3>
<p>Years Experience</p>
</div>
<div class="stat-item">
<h3><span class="purecounter" data-purecounter-duration="2" data-purecounter-end="5000" data-purecounter-start="0"></span>+</h3>
<p>Patients Treated</p>
</div>
<div class="stat-item">
<h3><span class="purecounter" data-purecounter-duration="2" data-purecounter-end="50" data-purecounter-start="0"></span>+</h3>
<p>Medical Experts</p>
</div>
</div>
<div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
<a class="btn btn-primary" href="appointment.html">Book Appointment</a>
<a class="btn btn-outline glightbox" href="https://www.youtube.com/watch?v=Y7f98aduVJ8">
<i class="bi bi-play-circle me-2"></i>
                  Watch Our Story
                </a>
</div>
<div class="emergency-contact" data-aos="fade-right" data-aos-delay="700">
<div class="emergency-icon">
<i class="bi bi-telephone-fill"></i>
</div>
<div class="emergency-info">
<small>Emergency Hotline</small>
<strong>+1 (555) 911-2468</strong>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
<div class="main-image">
<img alt="Modern Healthcare Facility" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-10.webp') }}"/>
<div class="floating-card appointment-card">
<div class="card-icon">
<i class="bi bi-calendar-check"></i>
</div>
<div class="card-content">
<h6>Next Available</h6>
<p>Today 2:30 PM</p>
<small>Dr. Sarah Johnson</small>
</div>
</div>
<div class="floating-card rating-card">
<div class="card-content">
<div class="rating-stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<h6>4.9/5</h6>
<small>1,234 Reviews</small>
</div>
</div>
</div>
<div class="background-elements">
<div class="element element-1"></div>
<div class="element element-2"></div>
<div class="element element-3"></div>
</div>
</div>
</div>
</div>
</div>
</section><!-- /Hero Section -->
<!-- Home About Section -->
<section class="home-about section" data-aos="fade-up" data-aos-delay="50" id="home-about">
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row align-items-center">
<div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
<div class="about-content">
<h2 class="section-heading">Compassionate Care, Advanced Medicine</h2>
<p class="lead-text">For over two decades, we've been dedicated to providing exceptional healthcare that
                combines cutting-edge medical technology with the personal touch our patients deserve.</p>
<p>Our multidisciplinary team of specialists works collaboratively to ensure every patient receives
                comprehensive care tailored to their unique needs. From preventive services to complex procedures, we
                maintain the highest standards of medical excellence while fostering an environment of trust and
                healing.</p>
<div class="stats-grid">
<div class="stat-item">
<div class="stat-number purecounter" data-purecounter-duration="1" data-purecounter-end="15000" data-purecounter-start="0"></div>
<div class="stat-label">Patients Served</div>
</div>
<div class="stat-item">
<div class="stat-number purecounter" data-purecounter-duration="1" data-purecounter-end="25" data-purecounter-start="0"></div>
<div class="stat-label">Years of Excellence</div>
</div>
<div class="stat-item">
<div class="stat-number purecounter" data-purecounter-duration="1" data-purecounter-end="50" data-purecounter-start="0"></div>
<div class="stat-label">Medical Specialists</div>
</div>
</div>
<div class="cta-section">
<a class="btn-primary" href="about.html">Learn More About Us</a>
</div>
</div>
</div>
<div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
<div class="about-visual">
<div class="main-image">
<img alt="Modern medical facility" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/facilities-9.webp') }}"/>
</div>
<div class="floating-card">
<div class="card-content">
<div class="icon">
<i class="bi bi-heart-pulse"></i>
</div>
<div class="card-text">
<h4>24/7 Emergency Care</h4>
<p>Always here when you need us most</p>
</div>
</div>
</div>
<div class="experience-badge">
<div class="badge-content">
<span class="years">25+</span>
<span class="text">Years of Trusted Care</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section><!-- /Home About Section -->
<!-- Featured Departments Section -->
<section class="featured-departments section" data-aos="fade-up" data-aos-delay="50" id="featured-departments">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
<h2>Featured Departments</h2>
<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row g-5">
<div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
<div class="specialty-card">
<div class="specialty-content">
<div class="specialty-meta">
<span class="specialty-label">Specialized Care</span>
</div>
<h3>Cardiovascular Medicine</h3>
<p>Advanced diagnostic imaging and interventional procedures for comprehensive heart health management
                  with personalized treatment protocols.</p>
<div class="specialty-features">
<span><i class="bi bi-check-circle-fill"></i>24/7 Emergency Cardiac Care</span>
<span><i class="bi bi-check-circle-fill"></i>Minimally Invasive Procedures</span>
</div>
<a class="specialty-link" href="department-details.html">
                  Explore Cardiology <i class="bi bi-arrow-right"></i>
</a>
</div>
<div class="specialty-visual">
<img alt="Cardiovascular Medicine" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/cardiology-1.webp') }}"/>
<div class="visual-overlay">
<i class="bi bi-heart-pulse"></i>
</div>
</div>
</div>
</div><!-- End Specialty Card -->
<div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
<div class="specialty-card">
<div class="specialty-content">
<div class="specialty-meta">
<span class="specialty-label">Expert Care</span>
</div>
<h3>Neurological Sciences</h3>
<p>Cutting-edge neuroimaging and neurosurgical expertise for complex brain and spinal cord conditions
                  with innovative treatment approaches.</p>
<div class="specialty-features">
<span><i class="bi bi-check-circle-fill"></i>Advanced Brain Imaging</span>
<span><i class="bi bi-check-circle-fill"></i>Robotic Surgery</span>
</div>
<a class="specialty-link" href="department-details.html">
                  Explore Neurology <i class="bi bi-arrow-right"></i>
</a>
</div>
<div class="specialty-visual">
<img alt="Neurological Sciences" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/neurology-4.webp') }}"/>
<div class="visual-overlay">
<i class="bi bi-cpu"></i>
</div>
</div>
</div>
</div><!-- End Specialty Card -->
<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
<div class="department-highlight">
<div class="highlight-icon">
<i class="bi bi-shield-plus"></i>
</div>
<h4>Orthopedic Surgery</h4>
<p>Comprehensive musculoskeletal care utilizing advanced arthroscopic techniques and joint replacement
                procedures.</p>
<ul class="highlight-list">
<li>Sports Medicine</li>
<li>Joint Replacement</li>
<li>Spine Surgery</li>
</ul>
<a class="highlight-cta" href="department-details.html">Learn More</a>
</div>
</div><!-- End Department Highlight -->
<div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
<div class="department-highlight">
<div class="highlight-icon">
<i class="bi bi-people"></i>
</div>
<h4>Pediatric Care</h4>
<p>Child-centered healthcare services from newborn to adolescence with family-focused treatment
                approaches.</p>
<ul class="highlight-list">
<li>Neonatal Intensive Care</li>
<li>Developmental Pediatrics</li>
<li>Pediatric Surgery</li>
</ul>
<a class="highlight-cta" href="department-details.html">Learn More</a>
</div>
</div><!-- End Department Highlight -->
<div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
<div class="department-highlight">
<div class="highlight-icon">
<i class="bi bi-activity"></i>
</div>
<h4>Cancer Treatment</h4>
<p>Multidisciplinary oncology program offering personalized cancer care with latest therapeutic
                innovations.</p>
<ul class="highlight-list">
<li>Precision Medicine</li>
<li>Immunotherapy</li>
<li>Radiation Oncology</li>
</ul>
<a class="highlight-cta" href="department-details.html">Learn More</a>
</div>
</div><!-- End Department Highlight -->
</div>
<div class="emergency-banner" data-aos="fade-up" data-aos-delay="400">
<div class="row align-items-center">
<div class="col-lg-8">
<div class="emergency-content">
<h3>Emergency Services Available 24/7</h3>
<p>Our emergency department is equipped with state-of-the-art technology and staffed by board-certified
                  emergency physicians ready to provide immediate care.</p>
</div>
</div>
<div class="col-lg-4 text-lg-end">
<a class="emergency-btn" href="tel:+15551234567">
<i class="bi bi-telephone-fill"></i>
                Call Emergency: (555) 123-4567
              </a>
</div>
</div>
</div>
</div>
</section><!-- /Featured Departments Section -->
<!-- Featured Services Section -->
<section class="featured-services section" data-aos="fade-up" data-aos-delay="50" id="featured-services">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
<h2>Featured Services</h2>
<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row g-0">
<div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
<div class="featured-service-main">
<div class="service-image-wrapper">
<img alt="Premier Healthcare Services" class="img-fluid" loading="lazy" src="{{ asset('unitrack-site/assets/img/health/consultation-4.webp') }}"/>
<div class="service-overlay">
<div class="service-badge">
<i class="bi bi-heart-pulse"></i>
<span>Emergency Care</span>
</div>
</div>
</div>
<div class="service-details">
<h2>Comprehensive Healthcare Excellence</h2>
<p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ante ipsum primis in faucibus
                  orci luctus et ultrices posuere cubilia curae donec velit neque.</p>
<a class="main-cta" href="#!">Explore Our Services</a>
</div>
</div>
</div>
<div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
<div class="services-sidebar">
<div class="service-item" data-aos="fade-up" data-aos-delay="400">
<div class="service-icon-wrapper">
<i class="bi bi-capsule"></i>
</div>
<div class="service-info">
<h4>Dermatology Unitrack</h4>
<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<a class="service-link" href="#!">Learn More</a>
</div>
</div>
<div class="service-item" data-aos="fade-up" data-aos-delay="500">
<div class="service-icon-wrapper">
<i class="bi bi-bandaid"></i>
</div>
<div class="service-info">
<h4>Surgery Center</h4>
<p>Donec rutrum congue leo eget malesuada curabitur arcu erat accumsan id imperdiet et porttitor at
                    sem.</p>
<a class="service-link" href="#!">Learn More</a>
</div>
</div>
<div class="service-item" data-aos="fade-up" data-aos-delay="600">
<div class="service-icon-wrapper">
<i class="bi bi-activity"></i>
</div>
<div class="service-info">
<h4>Diagnostics Lab</h4>
<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui cras ultricies ligula sed
                    magna.</p>
<a class="service-link" href="#!">Learn More</a>
</div>
</div>
</div>
</div>
</div>
<div class="specialties-grid" data-aos="fade-up" data-aos-delay="300">
<div class="row align-items-center">
<div class="col-lg-3 col-md-6">
<div class="specialty-card">
<div class="specialty-image">
<img alt="Maternal Care" class="img-fluid" loading="lazy" src="{{ asset('unitrack-site/assets/img/health/maternal-2.webp') }}"/>
</div>
<div class="specialty-content">
<h5>Maternal Care</h5>
<span>Expert pregnancy &amp; delivery support</span>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="specialty-card">
<div class="specialty-image">
<img alt="Vaccination" class="img-fluid" loading="lazy" src="{{ asset('unitrack-site/assets/img/health/vaccination-3.webp') }}"/>
</div>
<div class="specialty-content">
<h5>Vaccination</h5>
<span>Complete immunization programs</span>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="specialty-card">
<div class="specialty-image">
<img alt="Emergency Care" class="img-fluid" loading="lazy" src="{{ asset('unitrack-site/assets/img/health/emergency-1.webp') }}"/>
</div>
<div class="specialty-content">
<h5>Emergency Care</h5>
<span>24/7 critical care services</span>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6">
<div class="specialty-card">
<div class="specialty-image">
<img alt="Advanced Tech" class="img-fluid" loading="lazy" src="{{ asset('unitrack-site/assets/img/health/facilities-6.webp') }}"/>
</div>
<div class="specialty-content">
<h5>Advanced Technology</h5>
<span>State-of-the-art medical equipment</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section><!-- /Featured Services Section -->
<!-- Find A Doctor Section -->
<section class="find-a-doctor section" data-aos="fade-up" data-aos-delay="50" id="find-a-doctor">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
<h2>Find A Doctor</h2>
<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
<div class="col-lg-8 text-center">
<div class="search-section">
<h3 class="search-title">Find Your Perfect Healthcare Provider</h3>
<p class="search-subtitle">Search through our comprehensive directory of experienced medical professionals
              </p>
<form action="#!" class="search-form" method="#">
<div class="search-input-group">
<div class="input-wrapper">
<i class="bi bi-person"></i>
<input class="form-control" name="doctor_name" placeholder="Enter doctor name" type="text"/>
</div>
<div class="select-wrapper">
<i class="bi bi-heart-pulse"></i>
<select class="form-select" name="specialty">
<option value="">All Specialties</option>
<option value="cardiology">Cardiology</option>
<option value="neurology">Neurology</option>
<option value="orthopedics">Orthopedics</option>
<option value="pediatrics">Pediatrics</option>
<option value="dermatology">Dermatology</option>
<option value="oncology">Oncology</option>
</select>
</div>
<button class="search-btn" type="submit">
<i class="bi bi-search"></i>
                    Find Doctors
                  </button>
</div>
</form>
</div>
</div>
</div>
<div class="doctors-grid" data-aos="fade-up" data-aos-delay="300">
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="100">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. Amanda Foster" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-2.webp') }}"/>
<div class="status-indicator available"></div>
</div>
<div class="doctor-details">
<h4>Dr. Amanda Foster</h4>
<span class="specialty-tag">Cardiology Specialist</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>14 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="rating-score">4.9</span>
<span class="review-count">(127 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Book Now</a>
</div>
</div><!-- End Doctor Profile -->
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="200">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. Marcus Johnson" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-6.webp') }}"/>
<div class="status-indicator busy"></div>
</div>
<div class="doctor-details">
<h4>Dr. Marcus Johnson</h4>
<span class="specialty-tag">Neurology Expert</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>16 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-half"></i>
</div>
<span class="rating-score">4.8</span>
<span class="review-count">(89 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Schedule</a>
</div>
</div><!-- End Doctor Profile -->
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="300">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. Rachel Williams" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-4.webp') }}"/>
<div class="status-indicator available"></div>
</div>
<div class="doctor-details">
<h4>Dr. Rachel Williams</h4>
<span class="specialty-tag">Pediatrics Care</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>11 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="rating-score">5.0</span>
<span class="review-count">(203 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Book Now</a>
</div>
</div><!-- End Doctor Profile -->
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="400">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. David Chen" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-8.webp') }}"/>
<div class="status-indicator offline"></div>
</div>
<div class="doctor-details">
<h4>Dr. David Chen</h4>
<span class="specialty-tag">Orthopedic Surgery</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>22 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-half"></i>
</div>
<span class="rating-score">4.7</span>
<span class="review-count">(156 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Schedule</a>
</div>
</div><!-- End Doctor Profile -->
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="500">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. Victoria Torres" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-11.webp') }}"/>
<div class="status-indicator available"></div>
</div>
<div class="doctor-details">
<h4>Dr. Victoria Torres</h4>
<span class="specialty-tag">Dermatology Care</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>9 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star"></i>
</div>
<span class="rating-score">4.5</span>
<span class="review-count">(74 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Book Now</a>
</div>
</div><!-- End Doctor Profile -->
<div class="doctor-profile" data-aos="zoom-in" data-aos-delay="600">
<div class="profile-header">
<div class="doctor-avatar">
<img alt="Dr. Benjamin Lee" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/staff-14.webp') }}"/>
<div class="status-indicator available"></div>
</div>
<div class="doctor-details">
<h4>Dr. Benjamin Lee</h4>
<span class="specialty-tag">Oncology Treatment</span>
<div class="experience-info">
<i class="bi bi-award"></i>
<span>19 years experience</span>
</div>
</div>
</div>
<div class="rating-section">
<div class="stars">
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
<i class="bi bi-star-fill"></i>
</div>
<span class="rating-score">4.9</span>
<span class="review-count">(194 reviews)</span>
</div>
<div class="action-buttons">
<a class="btn-secondary" href="#!">View Details</a>
<a class="btn-primary" href="#!">Schedule</a>
</div>
</div><!-- End Doctor Profile -->
</div>
<div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
<a class="btn-view-all" href="doctors.html">
            View All Doctors
            <i class="bi bi-arrow-right"></i>
</a>
</div>
</div>
</section><!-- /Find A Doctor Section -->
<!-- Call To Action Section -->
<section class="call-to-action section light-background" data-aos="fade-up" data-aos-delay="50" id="call-to-action">
<div class="container" data-aos="fade-up" data-aos-delay="100">
<div class="hero-content">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
<h1>Excellence in Medical Care, Every Day</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
<div class="cta-wrapper">
<a class="primary-cta" href="appointment.html">
<span>Schedule Consultation</span>
<i class="bi bi-arrow-right"></i>
</a>
<a class="secondary-cta" href="services.html">
<span>Explore Services</span>
<i class="bi bi-arrow-right"></i>
</a>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="image-container" data-aos="fade-left" data-aos-delay="300">
<img alt="Medical Excellence" class="img-fluid" src="{{ asset('unitrack-site/assets/img/health/facilities-9.webp') }}"/>
</div>
</div>
</div>
</div>
<div class="features-section">
<div class="row g-0">
<div class="col-lg-4">
<div class="feature-block" data-aos="fade-up" data-aos-delay="200">
<div class="feature-icon">
<i class="bi bi-shield-check"></i>
</div>
<h3>Advanced Technology</h3>
<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                  laborum.</p>
</div>
</div>
<div class="col-lg-4">
<div class="feature-block" data-aos="fade-up" data-aos-delay="300">
<div class="feature-icon">
<i class="bi bi-clock"></i>
</div>
<h3>24/7 Availability</h3>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                  excepteur.</p>
</div>
</div>
<div class="col-lg-4">
<div class="feature-block" data-aos="fade-up" data-aos-delay="400">
<div class="feature-icon">
<i class="bi bi-people"></i>
</div>
<h3>Expert Team</h3>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium
                  totam rem.</p>
</div>
</div>
</div>
</div>
<div class="contact-block">
<div class="row">
<div class="col-lg-8">
<div class="contact-content" data-aos="fade-up" data-aos-delay="200">
<h2>Need Immediate Medical Assistance?</h2>
<p>Our emergency response team is available around the clock to provide immediate medical support when
                  you need it most.</p>
</div>
</div>
<div class="col-lg-4">
<div class="contact-actions" data-aos="fade-up" data-aos-delay="300">
<a class="emergency-call" href="tel:5551234567">
<i class="bi bi-telephone"></i>
<span>(555) 123-4567</span>
</a>
<a class="contact-link" href="contact.html">Find Location</a>
</div>
</div>
</div>
</div>
</div>
</section><!-- /Call To Action Section -->

@endsection
