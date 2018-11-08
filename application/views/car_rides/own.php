<div class="container">
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Plate Number</th>
            <th>Start Time</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Vacancy</th>
            <th>View details</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($car_rides as $ride): ?>
        <?php
            $slug = url_title($ride['start_time'], 'underscore');
            $show_url = site_url('car_rides/show/'.$ride['plate_number'].'/'.$slug);
        ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td><a class='btn btn-warning' href=" . $show_url .
                ">View Details
                </a>
            </td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<div class="container">
    <?php anchor('car_rides/create', "Propose a new car ride"); ?>
</div>