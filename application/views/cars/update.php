<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hi</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/styles.min.css">
</head>

<body>
<button class="btn btn-primary btn-block" onclick="window.location.href='<?php echo base_url(); ?>index.php/Cars/index/'">Cancel</button>
    <div class="login-dark">
        <?php echo form_open('Cars/update_car');?>
            <h2 class="sr-only">Car Update Form</h2>
            <div class="form-group"><input class="form-control" name="plate_number" placeholder="Confirm the plate number"></div>
            <div class="form-group"><input class="form-control" type="email" name="driver_email" placeholder="Confirm your email"></div>
            <div class="alert alert-warning" role="alert">Confirm your email and the plate number above.</div>
            <div class="form-group"><input class="form-control" name="car_type" placeholder="New car type(Optional)"></div>
	        <div class="form-group"><input class="form-control" name="size" placeholder="New size(Optional)"></div>
            <div class="alert alert-warning" role="alert">Update the information about your car</div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Update Your Car</button></div>
        </form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>
