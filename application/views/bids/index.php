<h2><?php echo $title; ?></h2>

<div class="container">
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Plate Number</th>
            <th>Start Time</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Vacancy</th>
            <th>My Price</th>
            <th>Status</th>
            <th>View Ride</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($car_ride_bids as $ride): ?>
        <?php $status = $ride['accepted'] ? "Pending" : "Confirmed"; ?>
        <?php $start_time_slug = url_title($ride['start_time'], 'underscore'); ?>
        <?php $show_ride_url = site_url('car_rides/passenger_show/'.$ride['plate_number'].'/'.$start_time_slug) ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td>" . $ride['my_price'] . "</td>
            <td>" . $status . "</td>
            <td>
                <a class='btn btn-info' href=" . $show_ride_url .
                ">View Ride Detail
                </a>
            </td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>