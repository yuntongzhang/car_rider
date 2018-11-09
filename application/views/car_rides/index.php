<h2><?php echo $title; ?></h2>

<div class="container">
<a class="btn btn-success" href="<?php echo site_url(); ?>car_rides/index">View all</a>
<a class="btn btn-warning" href="<?php echo site_url(); ?>car_rides/filtered_index">View those with vacancies</a>

<br></br>

<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Plate Number</th>
            <th>Start Time</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Vacancy</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($car_rides as $ride): ?>
        <?php
            $start_time_slug = url_title($ride['start_time'], 'underscore');
            $passenger_show_url = site_url('car_rides/passenger_show/'.$ride['plate_number'].'/'.$start_time_slug);
            $bid_url = site_url('car_rides/bid/'.$ride['plate_number'].'/'.$start_time_slug);
        ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td><a class='btn btn-info' href=" . $passenger_show_url .
            ">View Details</a></td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>
