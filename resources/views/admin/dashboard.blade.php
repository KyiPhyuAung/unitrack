@extends('layouts.admin')

@section('title', 'Unitrack Admin Dashboard')

@section('content')

! ================================================================ !
! [Start] Navigation Manu !
! ================================================================ !
<nav class="nxl-navigation">
<div class="navbar-wrapper">
<div class="m-header">
<a class="b-brand" href="index.html">
<!-- ========   change your logo hear   ============ -->
<img alt="" class="logo logo-lg" src="{{ asset('unitrack-admin/assets') }}/images/logo-full.png"/>
<img alt="" class="logo logo-sm" src="{{ asset('unitrack-admin/assets') }}/images/logo-abbr.png"/>
</a>
</div>
<div class="navbar-content">
<ul class="nxl-navbar">
<li class="nxl-item nxl-caption">
<label>Navigation</label>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-airplay"></i></span>
<span class="nxl-mtext">Dashboards</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="index.html">CRM</a></li>
<li class="nxl-item"><a class="nxl-link" href="analytics.html">Analytics</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-cast"></i></span>
<span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="reports-sales.html">Sales Report</a></li>
<li class="nxl-item"><a class="nxl-link" href="reports-leads.html">Leads Report</a></li>
<li class="nxl-item"><a class="nxl-link" href="reports-project.html">Project Report</a></li>
<li class="nxl-item"><a class="nxl-link" href="reports-timesheets.html">Timesheets Report</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-send"></i></span>
<span class="nxl-mtext">Applications</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="apps-chat.html">Chat</a></li>
<li class="nxl-item"><a class="nxl-link" href="apps-email.html">Email</a></li>
<li class="nxl-item"><a class="nxl-link" href="apps-tasks.html">Tasks</a></li>
<li class="nxl-item"><a class="nxl-link" href="apps-notes.html">Notes</a></li>
<li class="nxl-item"><a class="nxl-link" href="apps-storage.html">Storage</a></li>
<li class="nxl-item"><a class="nxl-link" href="apps-calendar.html">Calendar</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-at-sign"></i></span>
<span class="nxl-mtext">Proposal</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="proposal.html">Proposal</a></li>
<li class="nxl-item"><a class="nxl-link" href="proposal-view.html">Proposal View</a></li>
<li class="nxl-item"><a class="nxl-link" href="proposal-edit.html">Proposal Edit</a></li>
<li class="nxl-item"><a class="nxl-link" href="proposal-create.html">Proposal Create</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-dollar-sign"></i></span>
<span class="nxl-mtext">Payment</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="payment.html">Payment</a></li>
<li class="nxl-item"><a class="nxl-link" href="invoice-view.html">Invoice View</a></li>
<li class="nxl-item"><a class="nxl-link" href="invoice-create.html">Invoice Create</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-users"></i></span>
<span class="nxl-mtext">Customers</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="customers.html">Customers</a></li>
<li class="nxl-item"><a class="nxl-link" href="customers-view.html">Customers View</a></li>
<li class="nxl-item"><a class="nxl-link" href="customers-create.html">Customers Create</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-alert-circle"></i></span>
<span class="nxl-mtext">Leads</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="leads.html">Leads</a></li>
<li class="nxl-item"><a class="nxl-link" href="leads-view.html">Leads View</a></li>
<li class="nxl-item"><a class="nxl-link" href="leads-create.html">Leads Create</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-briefcase"></i></span>
<span class="nxl-mtext">Projects</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="projects.html">Projects</a></li>
<li class="nxl-item"><a class="nxl-link" href="projects-view.html">Projects View</a></li>
<li class="nxl-item"><a class="nxl-link" href="projects-create.html">Projects Create</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-layout"></i></span>
<span class="nxl-mtext">Widgets</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="widgets-lists.html">Lists</a></li>
<li class="nxl-item"><a class="nxl-link" href="widgets-tables.html">Tables</a></li>
<li class="nxl-item"><a class="nxl-link" href="widgets-charts.html">Charts</a></li>
<li class="nxl-item"><a class="nxl-link" href="widgets-statistics.html">Statistics</a></li>
<li class="nxl-item"><a class="nxl-link" href="widgets-miscellaneous.html">Miscellaneous</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-settings"></i></span>
<span class="nxl-mtext">Settings</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="settings-general.html">General</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-seo.html">SEO</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-tags.html">Tags</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-email.html">Email</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-tasks.html">Tasks</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-leads.html">Leads</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-support.html">Support</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-finance.html">Finance</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-gateways.html">Gateways</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-customers.html">Customers</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-localization.html">Localization</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-recaptcha.html">reCAPTCHA</a></li>
<li class="nxl-item"><a class="nxl-link" href="settings-miscellaneous.html">Miscellaneous</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-power"></i></span>
<span class="nxl-mtext">Authentication</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Login</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-login-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-login-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-login-creative.html">Creative</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Register</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-register-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-register-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-register-creative.html">Creative</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Error-404</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-404-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-404-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-404-creative.html">Creative</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Reset Pass</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-reset-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-reset-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-reset-creative.html">Creative</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Verify OTP</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-verify-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-verify-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-verify-creative.html">Creative</a></li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-mtext">Maintenance</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-cover.html">Cover</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-minimal.html">Minimal</a></li>
<li class="nxl-item"><a class="nxl-link" href="./auth-maintenance-creative.html">Creative</a></li>
</ul>
</li>
</ul>
</li>
<li class="nxl-item nxl-hasmenu">
<a class="nxl-link" href="javascript:void(0);">
<span class="nxl-micon"><i class="feather-life-buoy"></i></span>
<span class="nxl-mtext">Help Center</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
</a>
<ul class="nxl-submenu">
<li class="nxl-item"><a class="nxl-link" href="#!">Support</a></li>
<li class="nxl-item"><a class="nxl-link" href="help-knowledgebase.html">KnowledgeBase</a></li>
<li class="nxl-item"><a class="nxl-link" href="/docs/documentations">Documentations</a></li>
</ul>
</li>
</ul>
<div class="card text-center">
<div class="card-body">
<i class="feather-sunrise fs-4 text-dark"></i>
<h6 class="mt-4 text-dark fw-bolder">Downloading Center</h6>
<p class="fs-11 my-3 text-dark">Duralux is a production ready CRM to get started up and running easily.</p>
<a class="btn btn-primary text-dark w-100" href="https://www.themewagon.com/themes/Duralux-admin" target="_blank">Download Now</a>
</div>
</div>
</div>
</div>
</nav>
! ================================================================ !
! [End]  Navigation Manu !
! ================================================================ !
! ================================================================ !
! [Start] Header !
! ================================================================ !
<header class="nxl-header">
<div class="header-wrapper">
<!--! [Start] Header Left !-->
<div class="header-left d-flex align-items-center gap-4">
<!--! [Start] nxl-head-mobile-toggler !-->
<a class="nxl-head-mobile-toggler" href="javascript:void(0);" id="mobile-collapse">
<div class="hamburger hamburger--arrowturn">
<div class="hamburger-box">
<div class="hamburger-inner"></div>
</div>
</div>
</a>
<!--! [Start] nxl-head-mobile-toggler !-->
<!--! [Start] nxl-navigation-toggle !-->
<div class="nxl-navigation-toggle">
<a href="javascript:void(0);" id="menu-mini-button">
<i class="feather-align-left"></i>
</a>
<a href="javascript:void(0);" id="menu-expend-button" style="display: none">
<i class="feather-arrow-right"></i>
</a>
</div>
<!--! [End] nxl-navigation-toggle !-->
<!--! [Start] nxl-lavel-mega-menu-toggle !-->
<div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
<a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
<i class="feather-align-left"></i>
</a>
</div>
<!--! [End] nxl-lavel-mega-menu-toggle !-->
<!--! [Start] nxl-lavel-mega-menu !-->
<div class="nxl-drp-link nxl-lavel-mega-menu">
<div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
<a href="javascript:void(0)" id="nxl-lavel-mega-menu-hide">
<i class="feather-arrow-left me-2"></i>
<span>Back</span>
</a>
</div>
<!--! [Start] nxl-lavel-mega-menu-wrapper !-->
<div class="nxl-lavel-mega-menu-wrapper d-flex gap-3">
<!--! [Start] nxl-lavel-menu !-->
<div class="dropdown nxl-h-item nxl-lavel-menu">
<a class="avatar-text avatar-md bg-primary text-white" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);">
<i class="feather-plus"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-send"></i>
<span>Applications</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="apps-chat.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Chat</span>
</a>
<a class="dropdown-item" href="apps-email.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Email</span>
</a>
<a class="dropdown-item" href="apps-tasks.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Tasks</span>
</a>
<a class="dropdown-item" href="apps-notes.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Notes</span>
</a>
<a class="dropdown-item" href="apps-storage.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Storage</span>
</a>
<a class="dropdown-item" href="apps-calendar.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Calendar</span>
</a>
</div>
</div>
<div class="dropdown-divider"></div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-cast"></i>
<span>Reports</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="reports-sales.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Sales Report</span>
</a>
<a class="dropdown-item" href="reports-leads.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Leads Report</span>
</a>
<a class="dropdown-item" href="reports-project.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Project Report</span>
</a>
<a class="dropdown-item" href="reports-timesheets.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Timesheets Report</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-at-sign"></i>
<span>Proposal</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="proposal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Proposal</span>
</a>
<a class="dropdown-item" href="proposal-view.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Proposal View</span>
</a>
<a class="dropdown-item" href="proposal-edit.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Proposal Edit</span>
</a>
<a class="dropdown-item" href="proposal-create.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Proposal Create</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-dollar-sign"></i>
<span>Payment</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="payment.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Payment</span>
</a>
<a class="dropdown-item" href="invoice-view.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Invoice View</span>
</a>
<a class="dropdown-item" href="invoice-create.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Invoice Create</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-users"></i>
<span>Customers</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="customers.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Customers</span>
</a>
<a class="dropdown-item" href="customers-view.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Customers View</span>
</a>
<a class="dropdown-item" href="customers-create.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Customers Create</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-alert-circle"></i>
<span>Leads</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="leads.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Leads</span>
</a>
<a class="dropdown-item" href="leads-view.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Leads View</span>
</a>
<a class="dropdown-item" href="leads-create.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Leads Create</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-briefcase"></i>
<span>Projects</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="projects.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Projects</span>
</a>
<a class="dropdown-item" href="projects-view.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Projects View</span>
</a>
<a class="dropdown-item" href="projects-create.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Projects Create</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-layout"></i>
<span>Widgets</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="widgets-lists.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Lists</span>
</a>
<a class="dropdown-item" href="widgets-tables.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Tables</span>
</a>
<a class="dropdown-item" href="widgets-charts.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Charts</span>
</a>
<a class="dropdown-item" href="widgets-statistics.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Statistics</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="feather-power"></i>
<span>Authentication</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Login</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-login-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-login-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-login-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Register</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-register-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-register-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-register-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Error-404</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-404-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-404-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-404-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Reset Pass</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-reset-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-reset-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-reset-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Verify OTP</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-verify-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-verify-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-verify-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
<div class="dropdown nxl-level-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Maintenance</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu nxl-h-dropdown">
<a class="dropdown-item" href="./auth-maintenance-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Cover</span>
</a>
<a class="dropdown-item" href="./auth-maintenance-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Minimal</span>
</a>
<a class="dropdown-item" href="./auth-maintenance-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Creative</span>
</a>
</div>
</div>
</div>
</div>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-plus"></i>
<span>Add New Items</span>
</a>
</div>
</div>
<!--! [End] nxl-lavel-menu !-->
<!--! [Start] nxl-h-item nxl-mega-menu !-->
<div class="dropdown nxl-h-item nxl-mega-menu">
<a class="btn btn-light-brand" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);"> Mega Menu </a>
<div class="dropdown-menu nxl-h-dropdown" id="mega-menu-dropdown">
<div class="d-lg-flex align-items-start">
<!--! [Start] nxl-mega-menu-tabs !-->
<div aria-orientation="vertical" class="nav flex-column nxl-mega-menu-tabs" role="tablist">
<button class="nav-link active nxl-mega-menu-sm" data-bs-target="#v-pills-general" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-airplay"></i>
</span>
<span class="menu-title">General</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
<button class="nav-link nxl-mega-menu-md" data-bs-target="#v-pills-applications" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-send"></i>
</span>
<span class="menu-title">Applications</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
<button class="nav-link nxl-mega-menu-lg" data-bs-target="#v-pills-integrations" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-link-2"></i>
</span>
<span class="menu-title">Integrations</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
<button class="nav-link nxl-mega-menu-xl" data-bs-target="#v-pills-components" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-layers"></i>
</span>
<span class="menu-title">Components</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
<button class="nav-link nxl-mega-menu-xxl" data-bs-target="#v-pills-authentication" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-cpu"></i>
</span>
<span class="menu-title">Authentication</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
<button class="nav-link nxl-mega-menu-full" data-bs-target="#v-pills-miscellaneous" data-bs-toggle="pill" role="tab" type="button">
<span class="menu-icon">
<i class="feather-bluetooth"></i>
</span>
<span class="menu-title">Miscellaneous</span>
<span class="menu-arrow">
<i class="feather-chevron-right"></i>
</span>
</button>
</div>
<!--! [End] nxl-mega-menu-tabs !-->
<!--! [Start] nxl-mega-menu-tabs-content !-->
<div class="tab-content nxl-mega-menu-tabs-content">
<!--! [Start] v-pills-general !-->
<div class="tab-pane fade show active" id="v-pills-general" role="tabpanel">
<div class="mb-4 rounded-3 border">
<img alt="" class="img-fluid rounded-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/mockup.png"/>
</div>
<h6 class="fw-bolder">Duralux - Admin Dashboard UiKit</h6>
<p class="fs-12 fw-normal text-muted text-truncate-3-line">Get started Duralux with Duralux up and running. Duralux bootstrap template docs helps you to get started with simple html codes.</p>
<a class="fs-13 fw-bold text-primary" href="javascript:void(0);">Get Started →</a>
</div>
<!--! [End] v-pills-general !-->
<!--! [Start] v-pills-applications !-->
<div class="tab-pane fade" id="v-pills-applications" role="tabpanel">
<div class="row g-4">
<div class="col-lg-6">
<h6 class="dropdown-item-title">Applications</h6>
<a class="dropdown-item" href="apps-chat.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Chat</span>
</a>
<a class="dropdown-item" href="apps-email.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Email</span>
</a>
<a class="dropdown-item" href="apps-tasks.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Tasks</span>
</a>
<a class="dropdown-item" href="apps-notes.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Notes</span>
</a>
<a class="dropdown-item" href="apps-storage.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Storage</span>
</a>
<a class="dropdown-item" href="apps-calendar.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Calendar</span>
</a>
</div>
<div class="col-lg-6">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid full-user-avtar" src="{{ asset('unitrack-admin/assets') }}/images/general/full-avatar.png"/>
</div>
</div>
</div>
<hr class="border-top-dashed"/>
<div class="d-lg-flex align-items-center justify-content-between">
<div>
<h6 class="menu-item-heading text-truncate-1-line">Need more application?</h6>
<p class="fs-12 text-muted mb-0 text-truncate-3-line">We are ready to build custom applications.</p>
</div>
<div class="mt-2 mt-lg-0">
<a class="fs-13 fw-bold text-primary" href="mailto:flexilecode@gmail.com">Contact Us →</a>
</div>
</div>
</div>
<!--! [End] v-pills-applications !-->
<!--! [Start] v-pills-integrations !-->
<div class="tab-pane fade" id="v-pills-integrations" role="tabpanel">
<div class="row g-lg-4 nxl-mega-menu-integrations">
<div class="col-lg-12 d-lg-flex align-items-center justify-content-between mb-4 mb-lg-0">
<div>
<h6 class="fw-bolder text-dark">Integrations</h6>
<p class="fs-12 text-muted mb-0">Connect amazing apps on your bucket.</p>
</div>
<div class="mt-2 mt-lg-0">
<a class="fs-13 text-primary" href="javascript:void(0);">Add New →</a>
</div>
</div>
<div class="col-lg-4">
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/app-store.png"/>
</div>
<div class="menu-item-title">App Store</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/spotify.png"/>
</div>
<div class="menu-item-title">Spotify</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/figma.png"/>
</div>
<div class="menu-item-title">Figma</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/shopify.png"/>
</div>
<div class="menu-item-title">Shopify</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/paypal.png"/>
</div>
<div class="menu-item-title">Paypal</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
</div>
<div class="col-lg-4">
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/gmail.png"/>
</div>
<div class="menu-item-title">Gmail</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/dropbox.png"/>
</div>
<div class="menu-item-title">Dropbox</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/google-drive.png"/>
</div>
<div class="menu-item-title">Google Drive</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/github.png"/>
</div>
<div class="menu-item-title">Github</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/gitlab.png"/>
</div>
<div class="menu-item-title">Gitlab</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
</div>
<div class="col-lg-4">
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/facebook.png"/>
</div>
<div class="menu-item-title">Facebook</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/pinterest.png"/>
</div>
<div class="menu-item-title">Pinterest</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/instagram.png"/>
</div>
<div class="menu-item-title">Instagram</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/twitter.png"/>
</div>
<div class="menu-item-title">Twitter</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<div class="menu-item-icon">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/youtube.png"/>
</div>
<div class="menu-item-title">Youtube</div>
<div class="menu-item-arrow">
<i class="feather-arrow-right"></i>
</div>
</a>
</div>
</div>
<hr class="border-top-dashed"/>
<p class="fs-13 text-muted mb-0">Need help? Contact our <a class="fst-italic" href="javascript:void(0);">support center</a></p>
</div>
<!--! [End] v-pills-integrations !-->
<!--! [Start] v-pills-components !-->
<div class="tab-pane fade" id="v-pills-components" role="tabpanel">
<div class="row g-4 align-items-center">
<div class="col-xl-8">
<div class="row g-4">
<div class="col-lg-4">
<h6 class="dropdown-item-title">Navigation</h6>
<a class="dropdown-item" href="javascript:void(0);">CRM</a>
<a class="dropdown-item" href="javascript:void(0);">Analytics</a>
<a class="dropdown-item" href="javascript:void(0);">Sales</a>
<a class="dropdown-item" href="javascript:void(0);">Leads</a>
<a class="dropdown-item" href="javascript:void(0);">Projects</a>
<a class="dropdown-item" href="javascript:void(0);">Timesheets</a>
</div>
<div class="col-lg-4">
<h6 class="dropdown-item-title">Pages</h6>
<a class="dropdown-item" href="javascript:void(0);">Leads </a>
<a class="dropdown-item" href="javascript:void(0);">Payments</a>
<a class="dropdown-item" href="javascript:void(0);">Projects</a>
<a class="dropdown-item" href="javascript:void(0);">Proposals</a>
<a class="dropdown-item" href="javascript:void(0);">Customers</a>
<a class="dropdown-item" href="javascript:void(0);">Documentations</a>
</div>
<div class="col-lg-4">
<h6 class="dropdown-item-title">Authentication</h6>
<a class="dropdown-item" href="javascript:void(0);">Login</a>
<a class="dropdown-item" href="javascript:void(0);">Regiser</a>
<a class="dropdown-item" href="javascript:void(0);">Error-404</a>
<a class="dropdown-item" href="javascript:void(0);">Reset Pass</a>
<a class="dropdown-item" href="javascript:void(0);">Verify OTP</a>
<a class="dropdown-item" href="javascript:void(0);">Maintenance</a>
</div>
</div>
</div>
<div class="col-xl-4">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div class="mt-4">
<a class="fs-13 fw-bold" href="mailto:flexilecode@gmail.com">View all resources on Duralux →</a>
</div>
</div>
</div>
</div>
<!--! [End] v-pills-components !-->
<!--! [Start] v-pills-authentication !-->
<div class="tab-pane fade" id="v-pills-authentication" role="tabpanel">
<div class="row g-4 align-items-center nxl-mega-menu-authentication">
<div class="col-xl-8">
<div class="row g-4">
<div class="col-lg-4">
<h6 class="dropdown-item-title">Cover</h6>
<a class="dropdown-item" href="./auth-login-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Login</span>
</a>
<a class="dropdown-item" href="./auth-register-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Register</span>
</a>
<a class="dropdown-item" href="./auth-404-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Error-404</span>
</a>
<a class="dropdown-item" href="./auth-reset-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Reset Pass</span>
</a>
<a class="dropdown-item" href="./auth-verify-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Verify OTP</span>
</a>
<a class="dropdown-item" href="./auth-maintenance-cover.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Maintenance</span>
</a>
</div>
<div class="col-lg-4">
<h6 class="dropdown-item-title">Minimal</h6>
<a class="dropdown-item" href="./auth-login-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Login</span>
</a>
<a class="dropdown-item" href="./auth-register-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Register</span>
</a>
<a class="dropdown-item" href="./auth-404-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Error-404</span>
</a>
<a class="dropdown-item" href="./auth-reset-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Reset Pass</span>
</a>
<a class="dropdown-item" href="./auth-verify-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Verify OTP</span>
</a>
<a class="dropdown-item" href="./auth-maintenance-minimal.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Maintenance</span>
</a>
</div>
<div class="col-lg-4">
<h6 class="dropdown-item-title">Creative</h6>
<a class="dropdown-item" href="./auth-login-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Login</span>
</a>
<a class="dropdown-item" href="./auth-register-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Register</span>
</a>
<a class="dropdown-item" href="./auth-404-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Error-404</span>
</a>
<a class="dropdown-item" href="./auth-reset-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Reset Pass</span>
</a>
<a class="dropdown-item" href="./auth-verify-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Verify OTP</span>
</a>
<a class="dropdown-item" href="./auth-maintenance-creative.html">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Maintenance</span>
</a>
</div>
</div>
</div>
<div class="col-xl-4">
<div class="carousel slide" data-bs-ride="carousel" id="carouselResourcesCaptions">
<div class="carousel-indicators">
<button aria-current="true" class="active" data-bs-slide-to="0" data-bs-target="#carouselResourcesCaptions" type="button"></button>
<button data-bs-slide-to="1" data-bs-target="#carouselResourcesCaptions" type="button"></button>
<button data-bs-slide-to="2" data-bs-target="#carouselResourcesCaptions" type="button"></button>
<button data-bs-slide-to="3" data-bs-target="#carouselResourcesCaptions" type="button"></button>
<button data-bs-slide-to="4" data-bs-target="#carouselResourcesCaptions" type="button"></button>
<button data-bs-slide-to="5" data-bs-target="#carouselResourcesCaptions" type="button"></button>
</div>
<div class="carousel-inner rounded-3">
<div class="carousel-item active">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/6.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Shopify eCommerce Store</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the first slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/5.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">iOS Apps Development</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the second slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/4.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Figma Dashboard Design</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/3.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">React Dashboard Design</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/2.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Standup Team Meeting</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Zoom Team Meeting</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
</div>
<button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselResourcesCaptions" type="button">
<span aria-hidden="true" class="carousel-control-prev-icon"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselResourcesCaptions" type="button">
<span aria-hidden="true" class="carousel-control-next-icon"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</div>
</div>
</div>
<!--! [End] v-pills-authentication !-->
<!--! [Start] v-pills-miscellaneous !-->
<div class="tab-pane fade nxl-mega-menu-miscellaneous" id="v-pills-miscellaneous" role="tabpanel">
<!-- Nav tabs -->
<ul class="nav nav-tabs flex-column flex-lg-row nxl-mega-menu-miscellaneous-tabs" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" data-bs-target="#v-pills-projects" data-bs-toggle="tab" role="tab" type="button">
<span class="menu-icon">
<i class="feather-cast"></i>
</span>
<span class="menu-title">Projects</span>
</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" data-bs-target="#v-pills-services" data-bs-toggle="tab" role="tab" type="button">
<span class="menu-icon">
<i class="feather-check-square"></i>
</span>
<span class="menu-title">Services</span>
</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" data-bs-target="#v-pills-features" data-bs-toggle="tab" role="tab" type="button">
<span class="menu-icon">
<i class="feather-airplay"></i>
</span>
<span class="menu-title">Features</span>
</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" data-bs-target="#v-pills-blogs" data-bs-toggle="tab" role="tab" type="button">
<span class="menu-icon">
<i class="feather-bold"></i>
</span>
<span class="menu-title">Blogs</span>
</button>
</li>
</ul>
<!-- Tab panes -->
<div class="tab-content nxl-mega-menu-miscellaneous-content">
<div class="tab-pane fade active show" id="v-pills-projects" role="tabpanel">
<div class="row g-4">
<div class="col-xxl-2 d-lg-none d-xxl-block">
<h6 class="dropdown-item-title">Categories</h6>
<a class="dropdown-item" href="javascript:void(0);">Support</a>
<a class="dropdown-item" href="javascript:void(0);">Services</a>
<a class="dropdown-item" href="javascript:void(0);">Applicatios</a>
<a class="dropdown-item" href="javascript:void(0);">eCommerce</a>
<a class="dropdown-item" href="javascript:void(0);">Development</a>
<a class="dropdown-item" href="javascript:void(0);">Miscellaneous</a>
</div>
<div class="col-xxl-10">
<div class="row g-4">
<div class="col-xl-6">
<div class="d-lg-flex align-items-center gap-3">
<div class="wd-150 rounded-3">
<img alt="" class="img-fluid rounded-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div class="mt-3 mt-lg-0 ms-lg-3 item-text">
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Shopify eCommerce Store</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint nam ullam iure eum sed rerum libero quis doloremque maiores veritatis?</p>
<div class="hstack gap-2 mt-3">
<div class="avatar-image avatar-sm">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/1.png"/>
</div>
<a class="fs-12" href="javascript:void(0);">Alexandra Della</a>
</div>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="d-lg-flex align-items-center gap-3">
<div class="wd-150 rounded-3">
<img alt="" class="img-fluid rounded-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/2.jpg"/>
</div>
<div class="mt-3 mt-lg-0 ms-lg-3 item-text">
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">iOS Apps Development</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint nam ullam iure eum sed rerum libero quis doloremque maiores veritatis?</p>
<div class="hstack gap-2 mt-3">
<div class="avatar-image avatar-sm">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</div>
<a class="fs-12" href="javascript:void(0);">Green Cute</a>
</div>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="d-lg-flex align-items-center gap-3">
<div class="wd-150 rounded-3">
<img alt="" class="img-fluid rounded-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/3.jpg"/>
</div>
<div class="mt-3 mt-lg-0 ms-lg-3 item-text">
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Figma Dashboard Design</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint nam ullam iure eum sed rerum libero quis doloremque maiores veritatis?</p>
<div class="hstack gap-2 mt-3">
<div class="avatar-image avatar-sm">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</div>
<a class="fs-12" href="javascript:void(0);">Malanie Hanvey</a>
</div>
</div>
</div>
</div>
<div class="col-xl-6">
<div class="d-lg-flex align-items-center gap-3">
<div class="wd-150 rounded-3">
<img alt="" class="img-fluid rounded-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/4.jpg"/>
</div>
<div class="mt-3 mt-lg-0 ms-lg-3 item-text">
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">React Dashboard Design</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint nam ullam iure eum sed rerum libero quis doloremque maiores veritatis?</p>
<div class="hstack gap-2 mt-3">
<div class="avatar-image avatar-sm">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</div>
<a class="fs-12" href="javascript:void(0);">Kenneth Hune</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-services" role="tabpanel">
<div class="row g-4 nxl-mega-menu-miscellaneous-services">
<div class="col-xl-8">
<div class="row g-4">
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-primary text-white">
<i class="feather-bar-chart-2 mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Analytics Services</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-danger text-white">
<i class="feather-feather mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Content Writing</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-warning text-white">
<i class="feather-bell mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">SEO (Search Engine Optimization)</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-success text-white">
<i class="feather-shield mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Security Services</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-teal text-white">
<i class="feather-shopping-cart mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">eCommerce Services</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg rounded bg-dark text-white">
<i class="feather-life-buoy mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Support Services</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="p-3 bg-soft-dark text-dark rounded d-lg-flex align-items-center justify-content-between">
<div class="fs-13">
<i class="feather-star me-2"></i>
<span>View all services on Duralux.</span>
</div>
<div class="mt-2 mt-lg-0">
<a class="fs-13 text-primary" href="javascript:void(0);">Learn More →</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-4">
<div class="carousel slide" data-bs-ride="carousel" id="carouselServicesCaptions">
<div class="carousel-indicators">
<button aria-current="true" class="active" data-bs-slide-to="0" data-bs-target="#carouselServicesCaptions" type="button"></button>
<button data-bs-slide-to="1" data-bs-target="#carouselServicesCaptions" type="button"></button>
<button data-bs-slide-to="2" data-bs-target="#carouselServicesCaptions" type="button"></button>
<button data-bs-slide-to="3" data-bs-target="#carouselServicesCaptions" type="button"></button>
<button data-bs-slide-to="4" data-bs-target="#carouselServicesCaptions" type="button"></button>
<button data-bs-slide-to="5" data-bs-target="#carouselServicesCaptions" type="button"></button>
</div>
<div class="carousel-inner rounded-3">
<div class="carousel-item active">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/6.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Shopify eCommerce Store</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the first slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/5.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">iOS Apps Development</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the second slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/4.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Figma Dashboard Design</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/3.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">React Dashboard Design</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/2.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Standup Team Meeting</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
<div class="carousel-item">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid d-block w-100" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div class="carousel-caption">
<h5 class="carousel-caption-title text-truncate-1-line">Zoom Team Meeting</h5>
<p class="carousel-caption-desc">Some representative placeholder content for the third slide.</p>
</div>
</div>
</div>
<button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselServicesCaptions" type="button">
<span aria-hidden="true" class="carousel-control-prev-icon"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselServicesCaptions" type="button">
<span aria-hidden="true" class="carousel-control-next-icon"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-features" role="tabpanel">
<div class="row g-4 nxl-mega-menu-miscellaneous-features">
<div class="col-xl-8">
<div class="row g-4">
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-primary text-primary border-soft-primary rounded">
<i class="feather-bell mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Notifications</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-danger text-danger border-soft-danger rounded">
<i class="feather-bar-chart-2 mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Analytics</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-success text-success border-soft-success rounded">
<i class="feather-link-2 mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Ingetrations</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-indigo text-indigo border-soft-indigo rounded">
<i class="feather-book mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Documentations</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-warning text-warning border-soft-warning rounded">
<i class="feather-shield mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Security</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="d-flex align-items-start gap-3">
<div class="avatar-text avatar-lg bg-soft-teal text-teal border-soft-teal rounded">
<i class="feather-life-buoy mx-auto"></i>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Support</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum dolor sit amet consectetur adipisicing elit Unde numquam rem dignissimos. elit Unde numquam rem dignissimos.</p>
</div>
</div>
</div>
</div>
</div>
<div class="col-xxl-3 offset-xxl-1 col-xl-4">
<div class="nxl-mega-menu-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div class="mt-4">
<a class="fs-13 fw-bold" href="mailto:flexilecode@gmail.com">View all features on Duralux →</a>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-blogs" role="tabpanel">
<div class="row g-4">
<div class="col-xxl-2 d-lg-none d-xxl-block">
<h6 class="dropdown-item-title">Categories</h6>
<a class="dropdown-item" href="javascript:void(0);">Support</a>
<a class="dropdown-item" href="javascript:void(0);">Services</a>
<a class="dropdown-item" href="javascript:void(0);">Applicatios</a>
<a class="dropdown-item" href="javascript:void(0);">eCommerce</a>
<a class="dropdown-item" href="javascript:void(0);">Development</a>
<a class="dropdown-item" href="javascript:void(0);">Miscellaneous</a>
</div>
<div class="col-xxl-10">
<div class="row g-4">
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/1.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/2.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/3.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/4.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/5.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-xxl-4 col-lg-6">
<div class="d-flex align-items-center gap-3">
<div class="wd-100 rounded-3">
<img alt="" class="img-fluid rounded-3 border border-3" src="{{ asset('unitrack-admin/assets') }}/images/banner/6.jpg"/>
</div>
<div>
<a href="javascript:void(0);">
<h6 class="menu-item-heading text-truncate-1-line">Lorem ipsum dolor sit</h6>
</a>
<p class="fs-12 fw-normal text-muted mb-0 text-truncate-2-line">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius dolor quo commodi nisi animi error minus quia aliquam.</p>
<span class="fs-11 text-gray-500">26 March, 2023</span>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="p-3 bg-soft-dark text-dark rounded d-flex align-items-center justify-content-between gap-4">
<div class="fs-13 text-truncate-1-line">
<i class="feather-star me-2"></i>
<strong>Version 2.3.2 is out!</strong>
<span>Learn more about our news and schedule reporting.</span>
</div>
<div class="wd-100 text-end">
<a class="fs-13 text-primary" href="javascript:void(0);">Learn More →</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--! [End] v-pills-miscellaneous !-->
</div>
<!--! [End] nxl-mega-menu-tabs-content !-->
</div>
</div>
</div>
<!--! [End] nxl-h-item nxl-mega-menu !-->
</div>
<!--! [End] nxl-lavel-mega-menu-wrapper !-->
</div>
<!--! [End] nxl-lavel-mega-menu !-->
</div>
<!--! [End] Header Left !-->
<!--! [Start] Header Right !-->
<div class="header-right ms-auto">
<div class="d-flex align-items-center">
<div class="dropdown nxl-h-item nxl-header-search">
<a class="nxl-head-link me-0" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);">
<i class="feather-search"></i>
</a>
<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-search-dropdown">
<div class="input-group search-form">
<span class="input-group-text">
<i class="feather-search fs-6 text-muted"></i>
</span>
<input class="form-control search-input-field" placeholder="Search...." type="text"/>
<span class="input-group-text">
<button class="btn-close" type="button"></button>
</span>
</div>
<div class="dropdown-divider mt-0"></div>
<div class="search-items-wrapper">
<div class="searching-for px-4 py-2">
<p class="fs-11 fw-medium text-muted">I'm searching for...</p>
<div class="d-flex flex-wrap gap-1">
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Projects</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Leads</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Contacts</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Inbox</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Invoices</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Tasks</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Customers</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Notes</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Affiliate</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Storage</a>
<a class="flex-fill border rounded py-1 px-2 text-center fs-11 fw-semibold" href="javascript:void(0);">Calendar</a>
</div>
</div>
<div class="dropdown-divider"></div>
<div class="recent-result px-4 py-2">
<h4 class="fs-13 fw-normal text-gray-600 mb-3">Recnet <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-text rounded">
<i class="feather-airplay"></i>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">CRM dashboard redesign</a>
<p class="fs-11 text-muted mb-0">Home / project / crm</p>
</div>
</div>
<div>
<a class="badge border rounded text-dark" href="javascript:void(0);">/<i class="feather-command ms-1 fs-10"></i></a>
</div>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-text rounded">
<i class="feather-file-plus"></i>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Create new document</a>
<p class="fs-11 text-muted mb-0">Home / tasks / docs</p>
</div>
</div>
<div>
<a class="badge border rounded text-dark" href="javascript:void(0);">N /<i class="feather-command ms-1 fs-10"></i></a>
</div>
</div>
<div class="d-flex align-items-center justify-content-between">
<div class="d-flex align-items-center gap-3">
<div class="avatar-text rounded">
<i class="feather-user-plus"></i>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Invite project colleagues</a>
<p class="fs-11 text-muted mb-0">Home / project / invite</p>
</div>
</div>
<div>
<a class="badge border rounded text-dark" href="javascript:void(0);">P /<i class="feather-command ms-1 fs-10"></i></a>
</div>
</div>
</div>
<div class="dropdown-divider my-3"></div>
<div class="users-result px-4 py-2">
<h4 class="fs-13 fw-normal text-gray-600 mb-3">Users <span class="badge small bg-gray-200 rounded ms-1 text-dark">5</span></h4>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/1.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Alexandra Della</a>
<p class="fs-11 text-muted mb-0">alex@example.com</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-chevron-right"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Green Cute</a>
<p class="fs-11 text-muted mb-0">green.cute@outlook.com</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-chevron-right"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Malanie Hanvey</a>
<p class="fs-11 text-muted mb-0">malanie.anvey@outlook.com</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-chevron-right"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Kenneth Hune</a>
<p class="fs-11 text-muted mb-0">kenth.hune@outlook.com</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-chevron-right"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-0">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/5.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Archie Cantones</a>
<p class="fs-11 text-muted mb-0">archie.cones@outlook.com</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-chevron-right"></i>
</a>
</div>
</div>
<div class="dropdown-divider my-3"></div>
<div class="file-result px-4 py-2">
<h4 class="fs-13 fw-normal text-gray-600 mb-3">Files <span class="badge small bg-gray-200 rounded ms-1 text-dark">3</span></h4>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image bg-gray-200 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/file-icons/css.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Project Style CSS</a>
<p class="fs-11 text-muted mb-0">05.74 MB</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-download"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-4">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image bg-gray-200 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/file-icons/zip.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Dashboard Project Zip</a>
<p class="fs-11 text-muted mb-0">46.83 MB</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-download"></i>
</a>
</div>
<div class="d-flex align-items-center justify-content-between mb-0">
<div class="d-flex align-items-center gap-3">
<div class="avatar-image bg-gray-200 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/file-icons/pdf.png"/>
</div>
<div>
<a class="font-body fw-bold d-block mb-1" href="javascript:void(0);">Project Document PDF</a>
<p class="fs-11 text-muted mb-0">12.85 MB</p>
</div>
</div>
<a class="avatar-text avatar-md" href="javascript:void(0);">
<i class="feather-download"></i>
</a>
</div>
</div>
<div class="dropdown-divider mt-3 mb-0"></div>
<a class="p-3 fs-10 fw-bold text-uppercase text-center d-block" href="javascript:void(0);">Loar More</a>
</div>
</div>
</div>
<div class="dropdown nxl-h-item nxl-header-language d-none d-sm-flex">
<a class="nxl-head-link me-0 nxl-language-link" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);">
<img alt="" class="img-fluid wd-20" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/4x3/us.svg"/>
</a>
<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-language-dropdown">
<div class="dropdown-divider mt-0"></div>
<div class="language-items-wrapper">
<div class="select-language px-4 py-2 hstack justify-content-between gap-4">
<div class="lh-lg">
<h6 class="mb-0">Select Language</h6>
<p class="fs-11 text-muted mb-0">12 languages avaiable!</p>
</div>
<a class="avatar-text avatar-md" data-bs-toggle="tooltip" href="javascript:void(0);" title="Add Language">
<i class="feather-plus"></i>
</a>
</div>
<div class="dropdown-divider"></div>
<div class="row px-4 pt-3">
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/sa.svg"/></div>
<span>Arabic</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/bd.svg"/></div>
<span>Bengali</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/ch.svg"/></div>
<span>Chinese</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/nl.svg"/></div>
<span>Dutch</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select active">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/us.svg"/></div>
<span>English</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/fr.svg"/></div>
<span>French</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/de.svg"/></div>
<span>German</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/in.svg"/></div>
<span>Hindi</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/ru.svg"/></div>
<span>Russian</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/es.svg"/></div>
<span>Spanish</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/tr.svg"/></div>
<span>Turkish</span>
</a>
</div>
<div class="col-sm-4 col-6 language_select">
<a class="d-flex align-items-center gap-2" href="javascript:void(0);">
<div class="avatar-image avatar-sm"><img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/vendors/img/flags/1x1/pk.svg"/></div>
<span>Urdo</span>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="nxl-h-item d-none d-sm-flex">
<div class="full-screen-switcher">
<a class="nxl-head-link me-0" href="javascript:void(0);" onclick="$('body').fullScreenHelper('toggle');">
<i class="feather-maximize maximize"></i>
<i class="feather-minimize minimize"></i>
</a>
</div>
</div>
<div class="nxl-h-item dark-light-theme">
<a class="nxl-head-link me-0 dark-button" href="javascript:void(0);">
<i class="feather-moon"></i>
</a>
<a class="nxl-head-link me-0 light-button" href="javascript:void(0);" style="display: none">
<i class="feather-sun"></i>
</a>
</div>
<div class="dropdown nxl-h-item">
<a class="nxl-head-link me-0" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
<i class="feather-clock"></i>
<span class="badge bg-success nxl-h-badge">2</span>
</a>
<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-timesheets-menu">
<div class="d-flex justify-content-between align-items-center timesheets-head">
<h6 class="fw-bold text-dark mb-0">Timesheets</h6>
<a class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" href="javascript:void(0);" title="Upcomming Timers">
<i class="feather-clock"></i>
<span>3 Upcomming</span>
</a>
</div>
<div class="d-flex justify-content-between align-items-center flex-column timesheets-body">
<i class="feather-clock fs-1 mb-4"></i>
<p class="text-muted">No started timers found yes!</p>
<a class="btn btn-sm btn-primary" href="javascript:void(0);">Started Timer</a>
</div>
<div class="text-center timesheets-footer">
<a class="fs-13 fw-semibold text-dark" href="javascript:void(0);">Alls Timesheets</a>
</div>
</div>
</div>
<div class="dropdown nxl-h-item">
<a class="nxl-head-link me-3" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#" role="button">
<i class="feather-bell"></i>
<span class="badge bg-danger nxl-h-badge">3</span>
</a>
<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
<div class="d-flex justify-content-between align-items-center notifications-head">
<h6 class="fw-bold text-dark mb-0">Notifications</h6>
<a class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" href="javascript:void(0);" title="Make as Read">
<i class="feather-check"></i>
<span>Make as Read</span>
</a>
</div>
<div class="notifications-item">
<img alt="" class="rounded me-3 border" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
<div class="notifications-desc">
<a class="font-body text-truncate-2-line" href="javascript:void(0);"> <span class="fw-semibold text-dark">Malanie Hanvey</span> We should talk about that at lunch!</a>
<div class="d-flex justify-content-between align-items-center">
<div class="notifications-date text-muted border-bottom border-bottom-dashed">2 minutes ago</div>
<div class="d-flex align-items-center float-end gap-2">
<a class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" href="javascript:void(0);" title="Make as Read"></a>
<a class="text-danger" data-bs-toggle="tooltip" href="javascript:void(0);" title="Remove">
<i class="feather-x fs-12"></i>
</a>
</div>
</div>
</div>
</div>
<div class="notifications-item">
<img alt="" class="rounded me-3 border" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
<div class="notifications-desc">
<a class="font-body text-truncate-2-line" href="javascript:void(0);"> <span class="fw-semibold text-dark">Valentine Maton</span> You can download the latest invoices now.</a>
<div class="d-flex justify-content-between align-items-center">
<div class="notifications-date text-muted border-bottom border-bottom-dashed">36 minutes ago</div>
<div class="d-flex align-items-center float-end gap-2">
<a class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" href="javascript:void(0);" title="Make as Read"></a>
<a class="text-danger" data-bs-toggle="tooltip" href="javascript:void(0);" title="Remove">
<i class="feather-x fs-12"></i>
</a>
</div>
</div>
</div>
</div>
<div class="notifications-item">
<img alt="" class="rounded me-3 border" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
<div class="notifications-desc">
<a class="font-body text-truncate-2-line" href="javascript:void(0);"> <span class="fw-semibold text-dark">Archie Cantones</span> Don't forget to pickup Jeremy after school!</a>
<div class="d-flex justify-content-between align-items-center">
<div class="notifications-date text-muted border-bottom border-bottom-dashed">53 minutes ago</div>
<div class="d-flex align-items-center float-end gap-2">
<a class="d-block wd-8 ht-8 rounded-circle bg-gray-300" data-bs-toggle="tooltip" href="javascript:void(0);" title="Make as Read"></a>
<a class="text-danger" data-bs-toggle="tooltip" href="javascript:void(0);" title="Remove">
<i class="feather-x fs-12"></i>
</a>
</div>
</div>
</div>
</div>
<div class="text-center notifications-footer">
<a class="fs-13 fw-semibold text-dark" href="javascript:void(0);">Alls Notifications</a>
</div>
</div>
</div>
<div class="dropdown nxl-h-item">
<a data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
<img alt="user-image" class="img-fluid user-avtar me-0" src="{{ asset('unitrack-admin/assets') }}/images/avatar/1.png"/>
</a>
<div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
<div class="dropdown-header">
<div class="d-flex align-items-center">
<img alt="user-image" class="img-fluid user-avtar" src="{{ asset('unitrack-admin/assets') }}/images/avatar/1.png"/>
<div>
<h6 class="text-dark mb-0">Alexandra Della <span class="badge bg-soft-success text-success ms-1">PRO</span></h6>
<span class="fs-12 fw-medium text-muted">alex@example.com</span>
</div>
</div>
</div>
<div class="dropdown">
<a class="dropdown-item" data-bs-toggle="dropdown" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
<span>Active</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-warning rounded-circle me-2"></i>
<span>Always</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
<span>Active</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-danger rounded-circle me-2"></i>
<span>Bussy</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-info rounded-circle me-2"></i>
<span>Inactive</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-dark rounded-circle me-2"></i>
<span>Disabled</span>
</span>
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-10 ht-10 border border-2 border-gray-1 bg-primary rounded-circle me-2"></i>
<span>Cutomization</span>
</span>
</a>
</div>
</div>
<div class="dropdown-divider"></div>
<div class="dropdown">
<a class="dropdown-item" data-bs-toggle="dropdown" href="javascript:void(0);">
<span class="hstack">
<i class="feather-dollar-sign me-2"></i>
<span>Subscriptions</span>
</span>
<i class="feather-chevron-right ms-auto me-0"></i>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Plan</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Billings</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Referrals</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Payments</span>
</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Statements</span>
</span>
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);">
<span class="hstack">
<i class="wd-5 ht-5 bg-gray-500 rounded-circle me-3"></i>
<span>Subscriptions</span>
</span>
</a>
</div>
</div>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-user"></i>
<span>Profile Details</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-activity"></i>
<span>Activity Feed</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-dollar-sign"></i>
<span>Billing Details</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-bell"></i>
<span>Notifications</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-settings"></i>
<span>Account Settings</span>
</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="./auth-login-minimal.html">
<i class="feather-log-out"></i>
<span>Logout</span>
</a>
</div>
</div>
</div>
</div>
<!--! [End] Header Right !-->
</div>
</header>
! ================================================================ !
! [End] Header !
! ================================================================ !
! ================================================================ !
! [Start] Main Content !
! ================================================================ !
<main class="nxl-container">
<div class="nxl-content">
<!-- [ page-header ] start -->
<div class="page-header">
<div class="page-header-left d-flex align-items-center">
<div class="page-header-title">
<h5 class="m-b-10">Dashboard</h5>
</div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item">Dashboard</li>
</ul>
</div>
<div class="page-header-right ms-auto">
<div class="page-header-right-items">
<div class="d-flex d-md-none">
<a class="page-header-right-close-toggle" href="javascript:void(0)">
<i class="feather-arrow-left me-2"></i>
<span>Back</span>
</a>
</div>
<div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
<div class="reportrange-picker d-flex align-items-center" id="reportrange">
<span class="reportrange-picker-field"></span>
</div>
<div class="dropdown filter-dropdown">
<a class="btn btn-md btn-light-brand" data-bs-auto-close="outside" data-bs-offset="0, 10" data-bs-toggle="dropdown">
<i class="feather-filter me-2"></i>
<span>Filter</span>
</a>
<div class="dropdown-menu dropdown-menu-end">
<div class="dropdown-item">
<div class="custom-control custom-checkbox">
<input checked="checked" class="custom-control-input" id="Role" type="checkbox"/>
<label class="custom-control-label c-pointer" for="Role">Role</label>
</div>
</div>
<div class="dropdown-item">
<div class="custom-control custom-checkbox">
<input checked="checked" class="custom-control-input" id="Team" type="checkbox"/>
<label class="custom-control-label c-pointer" for="Team">Team</label>
</div>
</div>
<div class="dropdown-item">
<div class="custom-control custom-checkbox">
<input checked="checked" class="custom-control-input" id="Email" type="checkbox"/>
<label class="custom-control-label c-pointer" for="Email">Email</label>
</div>
</div>
<div class="dropdown-item">
<div class="custom-control custom-checkbox">
<input checked="checked" class="custom-control-input" id="Member" type="checkbox"/>
<label class="custom-control-label c-pointer" for="Member">Member</label>
</div>
</div>
<div class="dropdown-item">
<div class="custom-control custom-checkbox">
<input checked="checked" class="custom-control-input" id="Recommendation" type="checkbox"/>
<label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
</div>
</div>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-plus me-3"></i>
<span>Create New</span>
</a>
<a class="dropdown-item" href="javascript:void(0);">
<i class="feather-filter me-3"></i>
<span>Manage Filter</span>
</a>
</div>
</div>
</div>
</div>
<div class="d-md-none d-flex align-items-center">
<a class="page-header-right-open-toggle" href="javascript:void(0)">
<i class="feather-align-right fs-20"></i>
</a>
</div>
</div>
</div>
<!-- [ page-header ] end -->
<!-- [ Main Content ] start -->
<div class="main-content">
<div class="row">
<!-- [Invoices Awaiting Payment] start -->
<div class="col-xxl-3 col-md-6">
<div class="card stretch stretch-full">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-4">
<div class="d-flex gap-4 align-items-center">
<div class="avatar-text avatar-lg bg-gray-200">
<i class="feather-dollar-sign"></i>
</div>
<div>
<div class="fs-4 fw-bold text-dark"><span class="counter">45</span>/<span class="counter">76</span></div>
<h3 class="fs-13 fw-semibold text-truncate-1-line">Invoices Awaiting Payment</h3>
</div>
</div>
<a class="" href="javascript:void(0);">
<i class="feather-more-vertical"></i>
</a>
</div>
<div class="pt-4">
<div class="d-flex align-items-center justify-content-between">
<a class="fs-12 fw-medium text-muted text-truncate-1-line" href="javascript:void(0);">Invoices Awaiting </a>
<div class="w-100 text-end">
<span class="fs-12 text-dark">$5,569</span>
<span class="fs-11 text-muted">(56%)</span>
</div>
</div>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-primary" role="progressbar" style="width: 56%"></div>
</div>
</div>
</div>
</div>
</div>
<!-- [Invoices Awaiting Payment] end -->
<!-- [Converted Leads] start -->
<div class="col-xxl-3 col-md-6">
<div class="card stretch stretch-full">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-4">
<div class="d-flex gap-4 align-items-center">
<div class="avatar-text avatar-lg bg-gray-200">
<i class="feather-cast"></i>
</div>
<div>
<div class="fs-4 fw-bold text-dark"><span class="counter">48</span>/<span class="counter">86</span></div>
<h3 class="fs-13 fw-semibold text-truncate-1-line">Converted Leads</h3>
</div>
</div>
<a class="" href="javascript:void(0);">
<i class="feather-more-vertical"></i>
</a>
</div>
<div class="pt-4">
<div class="d-flex align-items-center justify-content-between">
<a class="fs-12 fw-medium text-muted text-truncate-1-line" href="javascript:void(0);">Converted Leads </a>
<div class="w-100 text-end">
<span class="fs-12 text-dark">52 Completed</span>
<span class="fs-11 text-muted">(63%)</span>
</div>
</div>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-warning" role="progressbar" style="width: 63%"></div>
</div>
</div>
</div>
</div>
</div>
<!-- [Converted Leads] end -->
<!-- [Projects In Progress] start -->
<div class="col-xxl-3 col-md-6">
<div class="card stretch stretch-full">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-4">
<div class="d-flex gap-4 align-items-center">
<div class="avatar-text avatar-lg bg-gray-200">
<i class="feather-briefcase"></i>
</div>
<div>
<div class="fs-4 fw-bold text-dark"><span class="counter">16</span>/<span class="counter">20</span></div>
<h3 class="fs-13 fw-semibold text-truncate-1-line">Projects In Progress</h3>
</div>
</div>
<a class="" href="javascript:void(0);">
<i class="feather-more-vertical"></i>
</a>
</div>
<div class="pt-4">
<div class="d-flex align-items-center justify-content-between">
<a class="fs-12 fw-medium text-muted text-truncate-1-line" href="javascript:void(0);">Projects In Progress </a>
<div class="w-100 text-end">
<span class="fs-12 text-dark">16 Completed</span>
<span class="fs-11 text-muted">(78%)</span>
</div>
</div>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-success" role="progressbar" style="width: 78%"></div>
</div>
</div>
</div>
</div>
</div>
<!-- [Projects In Progress] end -->
<!-- [Conversion Rate] start -->
<div class="col-xxl-3 col-md-6">
<div class="card stretch stretch-full">
<div class="card-body">
<div class="d-flex align-items-start justify-content-between mb-4">
<div class="d-flex gap-4 align-items-center">
<div class="avatar-text avatar-lg bg-gray-200">
<i class="feather-activity"></i>
</div>
<div>
<div class="fs-4 fw-bold text-dark"><span class="counter">46.59</span>%</div>
<h3 class="fs-13 fw-semibold text-truncate-1-line">Conversion Rate</h3>
</div>
</div>
<a class="" href="javascript:void(0);">
<i class="feather-more-vertical"></i>
</a>
</div>
<div class="pt-4">
<div class="d-flex align-items-center justify-content-between">
<a class="fs-12 fw-medium text-muted text-truncate-1-line" href="javascript:void(0);"> Conversion Rate </a>
<div class="w-100 text-end">
<span class="fs-12 text-dark">$2,254</span>
<span class="fs-11 text-muted">(46%)</span>
</div>
</div>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-danger" role="progressbar" style="width: 46%"></div>
</div>
</div>
</div>
</div>
</div>
<!-- [Conversion Rate] end -->
<!-- [Payment Records] start -->
<div class="col-xxl-8">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Payment Record</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body custom-card-action p-0">
<div id="payment-records-chart"></div>
</div>
<div class="card-footer">
<div class="row g-4">
<div class="col-lg-3">
<div class="p-3 border border-dashed rounded">
<div class="fs-12 text-muted mb-1">Awaiting</div>
<h6 class="fw-bold text-dark">$5,486</h6>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-primary" role="progressbar" style="width: 81%"></div>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="p-3 border border-dashed rounded">
<div class="fs-12 text-muted mb-1">Completed</div>
<h6 class="fw-bold text-dark">$9,275</h6>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-success" role="progressbar" style="width: 82%"></div>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="p-3 border border-dashed rounded">
<div class="fs-12 text-muted mb-1">Rejected</div>
<h6 class="fw-bold text-dark">$3,868</h6>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-danger" role="progressbar" style="width: 68%"></div>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="p-3 border border-dashed rounded">
<div class="fs-12 text-muted mb-1">Revenue</div>
<h6 class="fw-bold text-dark">$50,668</h6>
<div class="progress mt-2 ht-3">
<div class="progress-bar bg-dark" role="progressbar" style="width: 75%"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- [Payment Records] end -->
<!-- [Total Sales] start -->
<div class="col-xxl-4">
<div class="card stretch stretch-full overflow-hidden">
<div class="bg-primary text-white">
<div class="p-4">
<span class="badge bg-light text-primary text-dark float-end">12%</span>
<div class="text-start">
<h4 class="text-reset">30,569</h4>
<p class="text-reset m-0">Total Sales</p>
</div>
</div>
<div id="total-sales-color-graph"></div>
</div>
<div class="card-body">
<div class="d-flex align-items-center justify-content-between">
<div class="hstack gap-3">
<div class="avatar-image avatar-lg p-2 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/shopify.png"/>
</div>
<div>
<a class="d-block" href="javascript:void(0);">Shopify eCommerce Store</a>
<span class="fs-12 text-muted">Development</span>
</div>
</div>
<div>
<div class="fw-bold text-dark">$1200</div>
<div class="fs-12 text-end">6 Projects</div>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="d-flex align-items-center justify-content-between">
<div class="hstack gap-3">
<div class="avatar-image avatar-lg p-2 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/app-store.png"/>
</div>
<div>
<a class="d-block" href="javascript:void(0);">iOS Apps Development</a>
<span class="fs-12 text-muted">Development</span>
</div>
</div>
<div>
<div class="fw-bold text-dark">$1450</div>
<div class="fs-12 text-end">3 Projects</div>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="d-flex align-items-center justify-content-between">
<div class="hstack gap-3">
<div class="avatar-image avatar-lg p-2 rounded">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/brand/figma.png"/>
</div>
<div>
<a class="d-block" href="javascript:void(0);">Figma Dashboard Design</a>
<span class="fs-12 text-muted">UI/UX Design</span>
</div>
</div>
<div>
<div class="fw-bold text-dark">$1250</div>
<div class="fs-12 text-end">5 Projects</div>
</div>
</div>
</div>
<a class="card-footer fs-11 fw-bold text-uppercase text-center py-4" href="javascript:void(0);">Full Details</a>
</div>
</div>
<!-- [Total Sales] end !-->
<!-- [Mini] start -->
<div class="col-lg-4">
<div class="card mb-4 stretch stretch-full">
<div class="card-header d-flex align-items-center justify-content-between">
<div class="d-flex gap-3 align-items-center">
<div class="avatar-text">
<i class="feather feather-star"></i>
</div>
<div>
<div class="fw-semibold text-dark">Tasks Completed</div>
<div class="fs-12 text-muted">22/35 completed</div>
</div>
</div>
<div class="fs-4 fw-bold text-dark">22/35</div>
</div>
<div class="card-body d-flex align-items-center justify-content-between gap-4">
<div id="task-completed-area-chart"></div>
<div class="fs-12 text-muted text-nowrap">
<span class="fw-semibold text-primary">28% more</span><br/>
<span>from last week</span>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="card mb-4 stretch stretch-full">
<div class="card-header d-flex align-items-center justify-content-between">
<div class="d-flex gap-3 align-items-center">
<div class="avatar-text">
<i class="feather feather-file-text"></i>
</div>
<div>
<div class="fw-semibold text-dark">New Tasks</div>
<div class="fs-12 text-muted">0/20 tasks</div>
</div>
</div>
<div class="fs-4 fw-bold text-dark">5/20</div>
</div>
<div class="card-body d-flex align-items-center justify-content-between gap-4">
<div id="new-tasks-area-chart"></div>
<div class="fs-12 text-muted text-nowrap">
<span class="fw-semibold text-success">34% more</span><br/>
<span>from last week</span>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="card mb-4 stretch stretch-full">
<div class="card-header d-flex align-items-center justify-content-between">
<div class="d-flex gap-3 align-items-center">
<div class="avatar-text">
<i class="feather feather-airplay"></i>
</div>
<div>
<div class="fw-semibold text-dark">Project Done</div>
<div class="fs-12 text-muted">20/30 project</div>
</div>
</div>
<div class="fs-4 fw-bold text-dark">20/30</div>
</div>
<div class="card-body d-flex align-items-center justify-content-between gap-4">
<div id="project-done-area-chart"></div>
<div class="fs-12 text-muted text-nowrap">
<span class="fw-semibold text-danger">42% more</span><br/>
<span>from last week</span>
</div>
</div>
</div>
</div>
<!-- [Mini] end !-->
<!-- [Leads Overview] start -->
<div class="col-xxl-4">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Leads Overview</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body custom-card-action">
<div id="leads-overview-donut"></div>
<div class="row g-2">
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #3454d1"></span>
<span>New<span class="fs-10 text-muted ms-1">(20K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #0d519e"></span>
<span>Contacted<span class="fs-10 text-muted ms-1">(15K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #1976d2"></span>
<span>Qualified<span class="fs-10 text-muted ms-1">(10K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #1e88e5"></span>
<span>Working<span class="fs-10 text-muted ms-1">(18K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #2196f3"></span>
<span>Customer<span class="fs-10 text-muted ms-1">(10K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #42a5f5"></span>
<span>Proposal<span class="fs-10 text-muted ms-1">(15K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #64b5f6"></span>
<span>Leads<span class="fs-10 text-muted ms-1">(16K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #90caf9"></span>
<span>Progress<span class="fs-10 text-muted ms-1">(14K)</span></span>
</a>
</div>
<div class="col-4">
<a class="p-2 hstack gap-2 rounded border border-dashed border-gray-5" href="javascript:void(0);">
<span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #aad6fa"></span>
<span>Others<span class="fs-10 text-muted ms-1">(10K)</span></span>
</a>
</div>
</div>
</div>
</div>
</div>
<!-- [Leads Overview] end -->
<!-- [Latest Leads] start -->
<div class="col-xxl-8">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Latest Leads</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body custom-card-action p-0">
<div class="table-responsive">
<table class="table table-hover mb-0">
<thead>
<tr class="border-b">
<th scope="row">Users</th>
<th>Proposal</th>
<th>Date</th>
<th>Status</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="d-flex align-items-center gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</div>
<a href="javascript:void(0);">
<span class="d-block">Archie Cantones</span>
<span class="fs-12 d-block fw-normal text-muted">arcie.tones@gmail.com</span>
</a>
</div>
</td>
<td>
<span class="badge bg-gray-200 text-dark">Sent</span>
</td>
<td>11/06/2023 10:53</td>
<td>
<span class="badge bg-soft-success text-success">Completed</span>
</td>
<td class="text-end">
<a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
</td>
</tr>
<tr>
<td>
<div class="d-flex align-items-center gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</div>
<a href="javascript:void(0);">
<span class="d-block">Holmes Cherryman</span>
<span class="fs-12 d-block fw-normal text-muted">golms.chan@gmail.com</span>
</a>
</div>
</td>
<td>
<span class="badge bg-gray-200 text-dark">New</span>
</td>
<td>11/06/2023 10:53</td>
<td>
<span class="badge bg-soft-primary text-primary">In Progress </span>
</td>
<td class="text-end">
<a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
</td>
</tr>
<tr>
<td>
<div class="d-flex align-items-center gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</div>
<a href="javascript:void(0);">
<span class="d-block">Malanie Hanvey</span>
<span class="fs-12 d-block fw-normal text-muted">lanie.nveyn@gmail.com</span>
</a>
</div>
</td>
<td>
<span class="badge bg-gray-200 text-dark">Sent</span>
</td>
<td>11/06/2023 10:53</td>
<td>
<span class="badge bg-soft-success text-success">Completed</span>
</td>
<td class="text-end">
<a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
</td>
</tr>
<tr>
<td>
<div class="d-flex align-items-center gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/5.png"/>
</div>
<a href="javascript:void(0);">
<span class="d-block">Kenneth Hune</span>
<span class="fs-12 d-block fw-normal text-muted">nneth.une@gmail.com</span>
</a>
</div>
</td>
<td>
<span class="badge bg-gray-200 text-dark">Returning</span>
</td>
<td>11/06/2023 10:53</td>
<td>
<span class="badge bg-soft-warning text-warning">Not Interested</span>
</td>
<td class="text-end">
<a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
</td>
</tr>
<tr>
<td>
<div class="d-flex align-items-center gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/6.png"/>
</div>
<a href="javascript:void(0);">
<span class="d-block">Valentine Maton</span>
<span class="fs-12 d-block fw-normal text-muted">alenine.aton@gmail.com</span>
</a>
</div>
</td>
<td>
<span class="badge bg-gray-200 text-dark">Sent</span>
</td>
<td>11/06/2023 10:53</td>
<td>
<span class="badge bg-soft-success text-success">Completed</span>
</td>
<td class="text-end">
<a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="card-footer">
<ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
<li>
<a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
</li>
<li><a class="active" href="javascript:void(0);">1</a></li>
<li><a href="javascript:void(0);">2</a></li>
<li>
<a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
</li>
<li><a href="javascript:void(0);">8</a></li>
<li><a href="javascript:void(0);">9</a></li>
<li>
<a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
</li>
</ul>
</div>
</div>
</div>
<!-- [Latest Leads] end -->
<!--! BEGIN: [Upcoming Schedule] !-->
<div class="col-xxl-4">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Upcoming Schedule</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body">
<!--! BEGIN: [Events] !-->
<div class="p-3 border border-dashed rounded-3 mb-3">
<div class="d-flex justify-content-between">
<div class="d-flex align-items-center gap-3">
<div class="wd-50 ht-50 bg-soft-primary text-primary lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
<span class="fs-18 fw-bold mb-1 d-block">20</span>
<span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
</div>
<div class="text-dark">
<a class="fw-bold mb-2 text-truncate-1-line" href="javascript:void(0);">React Dashboard Design</a>
<span class="fs-11 fw-normal text-muted text-truncate-1-line">11:30am - 12:30pm</span>
</div>
</div>
<div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Janette Dalton">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Michael Ksen">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Socrates Itumay">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/6.png"/>
</a>
<a class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Explorer More">
<i class="feather-more-horizontal"></i>
</a>
</div>
</div>
</div>
<!--! BEGIN: [Events] !-->
<div class="p-3 border border-dashed rounded-3 mb-3">
<div class="d-flex justify-content-between">
<div class="d-flex align-items-center gap-3">
<div class="wd-50 ht-50 bg-soft-warning text-warning lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
<span class="fs-18 fw-bold mb-1 d-block">30</span>
<span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
</div>
<div class="text-dark">
<a class="fw-bold mb-2 text-truncate-1-line" href="javascript:void(0);">Admin Design Concept</a>
<span class="fs-11 fw-normal text-muted text-truncate-1-line">10:00am - 12:00pm</span>
</div>
</div>
<div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Janette Dalton">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Michael Ksen">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/5.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/6.png"/>
</a>
<a class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Explorer More">
<i class="feather-more-horizontal"></i>
</a>
</div>
</div>
</div>
<!--! BEGIN: [Events] !-->
<div class="p-3 border border-dashed rounded-3 mb-3">
<div class="d-flex justify-content-between">
<div class="d-flex align-items-center gap-3">
<div class="wd-50 ht-50 bg-soft-success text-success lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
<span class="fs-18 fw-bold mb-1 d-block">17</span>
<span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
</div>
<div class="text-dark">
<a class="fw-bold mb-2 text-truncate-1-line" href="javascript:void(0);">Standup Team Meeting</a>
<span class="fs-11 fw-normal text-muted text-truncate-1-line">8:00am - 9:00am</span>
</div>
</div>
<div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Janette Dalton">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Michael Ksen">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Socrates Itumay">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/5.png"/>
</a>
<a class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Explorer More">
<i class="feather-more-horizontal"></i>
</a>
</div>
</div>
</div>
<!--! BEGIN: [Events] !-->
<div class="p-3 border border-dashed rounded-3 mb-2">
<div class="d-flex justify-content-between">
<div class="d-flex align-items-center gap-3">
<div class="wd-50 ht-50 bg-soft-danger text-danger lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
<span class="fs-18 fw-bold mb-1 d-block">25</span>
<span class="fs-10 fw-semibold text-uppercase d-block">Dec</span>
</div>
<div class="text-dark">
<a class="fw-bold mb-2 text-truncate-1-line" href="javascript:void(0);">Zoom Team Meeting</a>
<span class="fs-11 fw-normal text-muted text-truncate-1-line">03:30pm - 05:30pm</span>
</div>
</div>
<div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Janette Dalton">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Socrates Itumay">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/5.png"/>
</a>
<a class="avatar-image avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Marianne Audrey">
<img alt="image" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/6.png"/>
</a>
<a class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" href="javascript:void(0)" title="Explorer More">
<i class="feather-more-horizontal"></i>
</a>
</div>
</div>
</div>
</div>
<a class="card-footer fs-11 fw-bold text-uppercase text-center py-4" href="javascript:void(0);">Upcomming Schedule</a>
</div>
</div>
<!--! END: [Upcoming Schedule] !-->
<!--! BEGIN: [Project Status] !-->
<div class="col-xxl-4">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Project Status</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body custom-card-action">
<div class="mb-3">
<div class="mb-4 pb-1 d-flex">
<div class="d-flex w-50 align-items-center me-3">
<img alt="laravel-logo" class="me-3" src="{{ asset('unitrack-admin/assets') }}/images/brand/app-store.png" width="35"/>
<div>
<a class="text-truncate-1-line" href="javascript:void(0);">Apps Development</a>
<div class="fs-11 text-muted">Applications</div>
</div>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="progress w-100 me-3 ht-5">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="54" class="progress-bar bg-danger" role="progressbar" style="width: 54%"></div>
</div>
<span class="text-muted">54%</span>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="mb-4 pb-1 d-flex">
<div class="d-flex w-50 align-items-center me-3">
<img alt="figma-logo" class="me-3" src="{{ asset('unitrack-admin/assets') }}/images/brand/figma.png" width="35"/>
<div>
<a class="text-truncate-1-line" href="javascript:void(0);">Dashboard Design</a>
<div class="fs-11 text-muted">App UI Kit</div>
</div>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="progress w-100 me-3 ht-5">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="86" class="progress-bar bg-primary" role="progressbar" style="width: 86%"></div>
</div>
<span class="text-muted">86%</span>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="mb-4 pb-1 d-flex">
<div class="d-flex w-50 align-items-center me-3">
<img alt="vue-logo" class="me-3" src="{{ asset('unitrack-admin/assets') }}/images/brand/facebook.png" width="35"/>
<div>
<a class="text-truncate-1-line" href="javascript:void(0);">Facebook Marketing</a>
<div class="fs-11 text-muted">Marketing</div>
</div>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="progress w-100 me-3 ht-5">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" class="progress-bar bg-success" role="progressbar" style="width: 90%"></div>
</div>
<span class="text-muted">90%</span>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="mb-4 pb-1 d-flex">
<div class="d-flex w-50 align-items-center me-3">
<img alt="react-logo" class="me-3" src="{{ asset('unitrack-admin/assets') }}/images/brand/github.png" width="35"/>
<div>
<a class="text-truncate-1-line" href="javascript:void(0);">React Dashboard Github</a>
<div class="fs-11 text-muted">Dashboard</div>
</div>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="progress w-100 me-3 ht-5">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="37" class="progress-bar bg-info" role="progressbar" style="width: 37%"></div>
</div>
<span class="text-muted">37%</span>
</div>
</div>
<hr class="border-dashed my-3"/>
<div class="d-flex">
<div class="d-flex w-50 align-items-center me-3">
<img alt="sketch-logo" class="me-3" src="{{ asset('unitrack-admin/assets') }}/images/brand/paypal.png" width="35"/>
<div>
<a class="text-truncate-1-line" href="javascript:void(0);">Paypal Payment Gateway</a>
<div class="fs-11 text-muted">Payment</div>
</div>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="progress w-100 me-3 ht-5">
<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="29" class="progress-bar bg-warning" role="progressbar" style="width: 29%"></div>
</div>
<span class="text-muted">29%</span>
</div>
</div>
</div>
</div>
<a class="card-footer fs-11 fw-bold text-uppercase text-center" href="javascript:void(0);">Upcomming Projects</a>
</div>
</div>
<!--! END: [Project Status] !-->
<!--! BEGIN: [Team Progress] !-->
<div class="col-xxl-4">
<div class="card stretch stretch-full">
<div class="card-header">
<h5 class="card-title">Team Progress</h5>
<div class="card-header-action">
<div class="card-header-btn">
<div data-bs-toggle="tooltip" title="Delete">
<a class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Refresh">
<a class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh" href="javascript:void(0);"> </a>
</div>
<div data-bs-toggle="tooltip" title="Maximize/Minimize">
<a class="avatar-text avatar-xs bg-success" data-bs-toggle="expand" href="javascript:void(0);"> </a>
</div>
</div>
<div class="dropdown">
<a class="avatar-text avatar-sm" data-bs-offset="25, 25" data-bs-toggle="dropdown" href="javascript:void(0);">
<div data-bs-toggle="tooltip" title="Options">
<i class="feather-more-vertical"></i>
</div>
</a>
<div class="dropdown-menu dropdown-menu-end">
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-at-sign"></i>New</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-calendar"></i>Event</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-bell"></i>Snoozed</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-trash-2"></i>Deleted</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-settings"></i>Settings</a>
<a class="dropdown-item" href="javascript:void(0);"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
</div>
</div>
</div>
</div>
<div class="card-body custom-card-action">
<div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
<div class="hstack gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/1.png"/>
</div>
<div>
<a href="javascript:void(0);">Alexandra Della</a>
<div class="fs-11 text-muted">Frontend Developer</div>
</div>
</div>
<div class="team-progress-1"></div>
</div>
<div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
<div class="hstack gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/2.png"/>
</div>
<div>
<a href="javascript:void(0);">Archie Cantones</a>
<div class="fs-11 text-muted">UI/UX Designer</div>
</div>
</div>
<div class="team-progress-2"></div>
</div>
<div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
<div class="hstack gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/3.png"/>
</div>
<div>
<a href="javascript:void(0);">Malanie Hanvey</a>
<div class="fs-11 text-muted">Backend Developer</div>
</div>
</div>
<div class="team-progress-3"></div>
</div>
<div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-2">
<div class="hstack gap-3">
<div class="avatar-image">
<img alt="" class="img-fluid" src="{{ asset('unitrack-admin/assets') }}/images/avatar/4.png"/>
</div>
<div>
<a href="javascript:void(0);">Kenneth Hune</a>
<div class="fs-11 text-muted">Digital Marketer</div>
</div>
</div>
<div class="team-progress-4"></div>
</div>
</div>
<a class="card-footer fs-11 fw-bold text-uppercase text-center" href="javascript:void(0);">Update 30 Min Ago</a>
</div>
</div>
<!--! END: [Team Progress] !-->
</div>
</div>
<!-- [ Main Content ] end -->
</div>
<!-- [ Footer ] start -->
<footer class="footer">
<p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
<span>Copyright ©</span>
<script>
                    document.write(new Date().getFullYear());
                </script>
</p>
<p><span>By: <a href="https://wrapbootstrap.com/user/theme_ocean" target="_blank">theme_ocean</a></span> • <span>Distributed by: <a href="https://themewagon.com" target="_blank">ThemeWagon</a></span></p>
<div class="d-flex align-items-center gap-4">
<a class="fs-11 fw-semibold text-uppercase" href="javascript:void(0);">Help</a>
<a class="fs-11 fw-semibold text-uppercase" href="javascript:void(0);">Terms</a>
<a class="fs-11 fw-semibold text-uppercase" href="javascript:void(0);">Privacy</a>
</div>
</footer>
<!-- [ Footer ] end -->
</main>
! ================================================================ !
! [End] Main Content !
! ================================================================ !
! ================================================================ !
! BEGIN: Theme Customizer !
! ================================================================ !
<div class="theme-customizer">
<div class="customizer-handle">
<a class="cutomizer-open-trigger bg-primary" href="javascript:void(0);">
<i class="feather-settings"></i>
</a>
</div>
<div class="customizer-sidebar-wrapper">
<div class="customizer-sidebar-header px-4 ht-80 border-bottom d-flex align-items-center justify-content-between">
<h5 class="mb-0">Theme Settings</h5>
<a class="cutomizer-close-trigger d-flex" href="javascript:void(0);">
<i class="feather-x"></i>
</a>
</div>
<div class="customizer-sidebar-body position-relative p-4" data-scrollbar-target="#psScrollbarInit">
<!--! BEGIN: [Navigation] !-->
<div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
<label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Navigation</label>
<div class="row g-2 theme-options-items app-navigation" id="appNavigationList">
<div class="col-6 text-center single-option">
<input checked="" class="btn-check" data-app-navigation="app-navigation-light" id="app-navigation-light" name="app-navigation" type="radio" value="1"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-light">Light</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-app-navigation="app-navigation-dark" id="app-navigation-dark" name="app-navigation" type="radio" value="2"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-navigation-dark">Dark</label>
</div>
</div>
</div>
<!--! END: [Navigation] !-->
<!--! BEGIN: [Header] !-->
<div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set mt-5">
<label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Header</label>
<div class="row g-2 theme-options-items app-header" id="appHeaderList">
<div class="col-6 text-center single-option">
<input checked="" class="btn-check" data-app-header="app-header-light" id="app-header-light" name="app-header" type="radio" value="1"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-light">Light</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-app-header="app-header-dark" id="app-header-dark" name="app-header" type="radio" value="2"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-header-dark">Dark</label>
</div>
</div>
</div>
<!--! END: [Header] !-->
<!--! BEGIN: [Skins] !-->
<div class="position-relative px-3 pb-3 pt-4 mt-3 mb-5 border border-gray-2 theme-options-set">
<label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Skins</label>
<div class="row g-2 theme-options-items app-skin" id="appSkinList">
<div class="col-6 text-center position-relative single-option light-button active">
<input class="btn-check" data-app-skin="app-skin-light" id="app-skin-light" name="app-skin" type="radio" value="1"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-light">Light</label>
</div>
<div class="col-6 text-center position-relative single-option dark-button">
<input class="btn-check" data-app-skin="app-skin-dark" id="app-skin-dark" name="app-skin" type="radio" value="2"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-skin-dark">Dark</label>
</div>
</div>
</div>
<!--! END: [Skins] !-->
<!--! BEGIN: [Typography] !-->
<div class="position-relative px-3 pb-3 pt-4 mt-3 mb-0 border border-gray-2 theme-options-set">
<label class="py-1 px-2 fs-8 fw-bold text-uppercase text-muted text-spacing-2 bg-white border border-gray-2 position-absolute rounded-2 options-label" style="top: -12px">Typography</label>
<div class="row g-2 theme-options-items font-family" id="fontFamilyList">
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-lato" id="app-font-family-lato" name="font-family" type="radio" value="1"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-lato">Lato</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-rubik" id="app-font-family-rubik" name="font-family" type="radio" value="2"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-rubik">Rubik</label>
</div>
<div class="col-6 text-center single-option">
<input checked="" class="btn-check" data-font-family="app-font-family-inter" id="app-font-family-inter" name="font-family" type="radio" value="3"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-inter">Inter</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-cinzel" id="app-font-family-cinzel" name="font-family" type="radio" value="4"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-cinzel">Cinzel</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-nunito" id="app-font-family-nunito" name="font-family" type="radio" value="6"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-nunito">Nunito</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-roboto" id="app-font-family-roboto" name="font-family" type="radio" value="7"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto">Roboto</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-ubuntu" id="app-font-family-ubuntu" name="font-family" type="radio" value="8"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ubuntu">Ubuntu</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-poppins" id="app-font-family-poppins" name="font-family" type="radio" value="9"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-poppins">Poppins</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-raleway" id="app-font-family-raleway" name="font-family" type="radio" value="10"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-raleway">Raleway</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-system-ui" id="app-font-family-system-ui" name="font-family" type="radio" value="11"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-system-ui">System UI</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-noto-sans" id="app-font-family-noto-sans" name="font-family" type="radio" value="12"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-noto-sans">Noto Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-fira-sans" id="app-font-family-fira-sans" name="font-family" type="radio" value="13"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-fira-sans">Fira Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-work-sans" id="app-font-family-work-sans" name="font-family" type="radio" value="14"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-work-sans">Work Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-open-sans" id="app-font-family-open-sans" name="font-family" type="radio" value="15"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-open-sans">Open Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-maven-pro" id="app-font-family-maven-pro" name="font-family" type="radio" value="16"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-maven-pro">Maven Pro</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-quicksand" id="app-font-family-quicksand" name="font-family" type="radio" value="17"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-quicksand">Quicksand</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-montserrat" id="app-font-family-montserrat" name="font-family" type="radio" value="18"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat">Montserrat</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-josefin-sans" id="app-font-family-josefin-sans" name="font-family" type="radio" value="19"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-josefin-sans">Josefin Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-ibm-plex-sans" id="app-font-family-ibm-plex-sans" name="font-family" type="radio" value="20"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-ibm-plex-sans">IBM Plex Sans</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-source-sans-pro" id="app-font-family-source-sans-pro" name="font-family" type="radio" value="5"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-source-sans-pro">Source Sans Pro</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-montserrat-alt" id="app-font-family-montserrat-alt" name="font-family" type="radio" value="21"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-montserrat-alt">Montserrat Alt</label>
</div>
<div class="col-6 text-center single-option">
<input class="btn-check" data-font-family="app-font-family-roboto-slab" id="app-font-family-roboto-slab" name="font-family" type="radio" value="22"/>
<label class="py-2 fs-9 fw-bold text-dark text-uppercase text-spacing-1 border border-gray-2 w-100 h-100 c-pointer position-relative options-label" for="app-font-family-roboto-slab">Roboto Slab</label>
</div>
</div>
</div>
<!--! END: [Typography] !-->
</div>
<div class="customizer-sidebar-footer px-4 ht-60 border-top d-flex align-items-center gap-2">
<div class="flex-fill w-50">
<a class="btn btn-danger" data-style="reset-all-common-style" href="javascript:void(0);">Reset</a>
</div>
<div class="flex-fill w-50">
<a class="btn btn-primary" href="https://www.themewagon.com/themes/Duralux-admin" target="_blank">Download</a>
</div>
</div>
</div>
</div>
! ================================================================ !
! [End] Theme Customizer !
! ================================================================ !
! ================================================================ !
! Footer Script !
! ================================================================ !
! BEGIN: Vendors JS !

 vendors.min.js {always must need to be top} 



! END: Vendors JS !
! BEGIN: Apps Init  !


! END: Apps Init !
! BEGIN: Theme Customizer  !

! END: Theme Customizer !

@endsection
