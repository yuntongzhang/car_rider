<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Bootstrap CI integration</title>

    <!-- Bootstrap CSS-->
    <link href="<?php echo asset_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php echo asset_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    

  </head>
  <body>

  <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Cars/register_view'">Register your car</button>




  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">plate_number</th>
      <th scope="col">driver_email</th>
      <th scope="col">car_type</th>
      <th scope="col">size</th>
    </tr>
  </thead>
  <tbody>
  <div class="cars">
    <?php foreach ($cars as $car) { ?>
    <div class="cars-item clearfix">
    <tr>
    <th scope="row"><?php echo $plate_number = $car["plate_number"]; ?></th>
      <td><?php echo $driver_email = $car["driver_email"]; ?></td>
      <td><?php echo $car["car_type"]; ?></td>
      <td><?php echo $car["size"]; ?></td>
      <td class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-success"onclick="window.location.href='<?php echo base_url(); ?>Cars/update_view/'">Edit</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url(); ?>Cars/delete_car/<?php echo $plate_number; ?>/<?php echo $driver_email; ?>'">Delete</button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>Cars/car_rides/<?php echo $plate_number; ?>'">List All Related Car Rides</button>
      </td>

    </tr>
  </div>
  <?php } ?>
</div>
  </tbody>
</table>

    <!-- jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="<?php echo asset_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
