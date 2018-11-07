<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
    <!-- Bootstrap JS -->
    <script src="<?php echo asset_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url();?>users/index">CARZBID</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url();?>users/register_view">Sign Up</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url();?>users/login_view">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>cars/index">Car</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>car_rides/own">Proposed Car Rides</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>car_rides/show_bid">Booked Car Rides</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>car_rides/index">Search for New Car Rides</a>
            </li>
        </ul>