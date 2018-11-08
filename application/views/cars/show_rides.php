<h2><?php echo $title; ?></h2>
<div class="container">
  <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th>Start Time</th>
      <th>Origin</th>
      <th>Destination</th>
      <th>Price</th>
      <th>Vacancy</th>
      <th>Details</th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($car_rides as $ride) { ?>
      <?php
            $slug = url_title($ride['start_time'], 'underscore');
            $show_url = site_url('car_rides/show/'.$ride['plate_number'].'/'.$slug);
      ?>
    <tr>
      <td><?php echo $ride["start_time"]; ?></td>
      <td><?php echo $ride["origin"]; ?></td>
      <td><?php echo $ride["destination"]; ?></td>
      <td><?php echo $ride["price"]; ?></td>
      <td><?php echo $ride["vacancy"]; ?></td>
      <td><a class="btn btn-info" href="<?php echo $show_url; ?>">View Details</a></td>
    </tr>
  <?php } ?>
  </tbody>
  </table>
  <a class="btn btn-success" href="<?php echo base_url(); ?>Cars/index">Back to Car Listing</a>
</div>