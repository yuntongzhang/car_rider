<h2><?php echo $title; ?></h2>

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
        </tr>
    </thead>
    <tbody>
    <?php foreach ($car_rides as $ride): ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td><a class='btn btn-primary' href=" . $bid_url .
            ">Bid</a></td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

