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
   <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Cars/index/'">Back</button>
   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">plate_number</th>
      <th scope="col">start_time</th>
      <th scope="col">origin</th>
      <th scope="col">destination</th>
      <th scope="col">price</th>
      <th scope="col">vacancy</th>
     </tr>
  </thead>
  <tbody>
  <div class="car_rides">
    <?php foreach ($car_rides as $ride) { ?>
    <div class="car_rides-item clearfix">
    <tr>
    <th scope="row"><?php echo $ride["plate_number"]; ?></th>
      <td><?php echo $ride["start_time"]; ?></td>
      <td><?php echo $ride["origin"]; ?></td>
      <td><?php echo $car["destination"]; ?></td>
      <td><?php echo $ride["price"]; ?></td>
      <td><?php echo $car["vacancy"]; ?></td>
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
