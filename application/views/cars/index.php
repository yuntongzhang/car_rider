

   <table class="table table-hover table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>Plate Number</th>
      <th>Driver Email</th>
      <th>Car Type</th>
      <th>Size</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($cars as $car) { ?>
    <tr>
      <td><?php echo $plate_number = $car["plate_number"]; ?></td>
      <td><?php echo $driver_email = $car["driver_email"]; ?></td>
      <td><?php echo $car["car_type"]; ?></td>
      <td><?php echo $car["size"]; ?></td>
      <td>
        <button type="button" class="btn btn-success"onclick="window.location.href='<?php echo base_url(); ?>Cars/update_view/'">Edit</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='<?php echo base_url(); ?>Cars/delete_car/<?php echo $plate_number; ?>/<?php echo $driver_email; ?>'">Delete</button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url(); ?>Cars/car_rides/<?php echo $plate_number; ?>'">List All Related Car Rides</button>
      </td>
     </tr>
  <?php } ?>
  </tbody>
</table>

<button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Cars/register_view'">Register your car</button>
    </div>