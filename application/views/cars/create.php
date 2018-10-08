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
    <div class="login-dark">
    <button class="btn btn-primary btn-block" onclick="window.location.href='<?php echo base_url(); ?>index.php/Cars/index'">Cancel</button>
        <?php echo form_open('Cars/register_car');?>
            <h2 class="sr-only">Car Register Form</h2>
            <div class="form-group"><input class="form-control" name="plate_number" placeholder="Plate_number"></div>
            <div class="form-group"><input class="form-control" type="email" name="driver_email" placeholder="Driver_email"></div>
            <div class="form-group"><input class="form-control" name="car_type" placeholder="Car_type"></div>
	        <div class="form-group"><input class="form-control" name="size" placeholder="Size"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register Your Car</button></div>
        </form>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>

</html>
