<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <title>Car Rider</title>
    <style>
    /* Style the body */
    body {
        font-family: Arial;
        margin: 0;
    }

    /* Header/Logo Title */
    .header {
        padding: 10px;
        height: 200px;
        text-align: center;
        background: #04B4AE;
        color: white;
        font-size: 30px;
    }

    /* Page Content */
    .content {padding:20px;}

    .topnav {
        overflow: hidden;
        background-color: #088A85;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .topnav a {
        float: left;
        color: black;
        text-align: center;
        width: 25%;
        padding-top: 14px;
        padding-bottom: 14px;
        text-decoration: none;
        font-size: 17px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .topnav a:hover {
        background-color: silver;
        color: black;
    }

    .footer {
        position: relative;
        text-align: center;
        padding: 3px;
        background: silver;
    }

</style>
</head>
<body>
    <div class="header">
        <h1>Car Rider</h1>
        <p><?php echo $title; ?></p>
    </div>

    <div class="topnav">
        <!--TODO Change links-->
        <a href="homepage">Home</a>
        <a href="carpage">Car</a>
        <a href="passengerpage">Passenger</a>
        <a href="driverpage">Driver</a>
    </div>


    <div class="content">
