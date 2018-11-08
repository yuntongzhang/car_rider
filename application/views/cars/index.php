<h3>My cars</h3>

<div class="container">
<table class="table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>Plate Number</th>
      <th>Car Type</th>
      <th>Size</th>
      <th>Update</th>
      <th>Delete</th>
      <th>Related Car Rides</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($cars as $car) { ?>
    <?php $driver_email = $car['driver_email']; ?>
    <tr>
      <td><?php echo $plate_number = $car["plate_number"]; ?></td>
      <td><?php echo $car["car_type"]; ?></td>
      <td><?php echo $car["size"]; ?></td>
      <td>
        <a class="btn btn-warning" href="<?php echo base_url(); ?>Cars/update_view/">Update</a>
      </td>
      <td>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Cars/delete_car/<?php echo $plate_number; ?>/<?php echo $driver_email; ?>">Delete</a>
      </td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Cars/show_car_rides/<?php echo $plate_number; ?>">View Rides</a>
      </td>
     </tr>
  <?php } ?>
  </tbody>
</table>
<a class="btn btn-success" href="<?php echo base_url(); ?>Cars/register_view">Register new car</a>
<a class="btn btn-info" href="<?php echo base_url();?>car_rides/own">View all rides proposed by me</a>
</div>



