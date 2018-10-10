<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hi</title>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>assets/css/Login-Form-Dark.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo asset_url(); ?>assets/css/styles.min.css">
</head>

<body>
    <div class="login-dark">
        <?php echo form_open('Users/register_user');?>
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" name="first_name" placeholder="First name"></div>
            <div class="form-group"><input class="form-control" name="last_name" placeholder="Last name"></div>
	    <div class="form-group"><input class="form-control" type="password" name="passwd" placeholder="Password"></div>
            <div class="form-group"><input class="form-control" name="age" placeholder="Age"></div>
            <div class="form-group"><input class="form-control" name="gender" placeholder="Gender"></div>
            <div class="form-group"><input class="form-control" name="occupation" placeholder="Occupation"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register</button></div>
        </form>
    </div>
    <script src="<?php echo asset_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo asset_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
