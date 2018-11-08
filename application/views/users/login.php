<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Car</title>
    <meta name="description" content="Best Easy Car bidding system">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/PUSH---Bootstrap-Button-Pack-3.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/PUSH---Bootstrap-Button-Pack-2.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Data-Table-1.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Data-Table.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Navigation-Menu.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/PUSH---Bootstrap-Button-Pack.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/sticky-dark-top-nav-with-dropdown.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Table-With-Search.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 class="text-info font-weight-light mb-5">&nbsp;CARZBID</h2>
                    <?php echo form_open('Users/verify_user'); ?>
                        <div class="form-group"><label class="text-secondary" >Email</label><input class="form-control" name="email" type="text" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,15}$" inputmode="email"></div>
                        <div class="form-group"><label class="text-secondary">Password</label><input class="form-control" name="passwd" type="password" required=""></div><button class="btn btn-info mt-2" type="submit">Log In</button></form>
                    <p class="mt-3 mb-0"><a href="<?php echo base_url();?>users/register_view" class="text-info small">SIGN UP</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;<?php echo asset_url(); ?>assets/img/road.jpg&quot;);background-size: cover;background-position: center center;">
                <p class="ml-auto small text-dark mb-2"><em>Photo by&nbsp;</em><a href="https://unsplash.com/photos/v0zVmWULYTg?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank" class="text-dark"><em>Aldain Austria</em></a><br></p>
            </div>
        </div>
    </div>
    <script src="<?php echo asset_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?php echo asset_url(); ?>assets/js/agency.js"></script>
    <script src="<?php echo asset_url(); ?>assets/js/Sidebar-Menu.js"></script>
    <script src="<?php echo asset_url(); ?>assets/js/Table-With-Search.js"></script>
</body>

</html>
