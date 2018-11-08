
  <button class="btn btn-primary" onclick="window.location.href='<?php echo base_url(); ?>Cars/index/'">Back</button>
  <table class="table table-striped table-hover table-bordered">
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
      <td><?php echo $ride["destination"]; ?></td>
      <td><?php echo $ride["price"]; ?></td>
      <td><?php echo $ride["vacancy"]; ?></td>
    </tr>
  </div>
  <?php } ?>
</div>
  </tbody>
</table>