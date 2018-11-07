<div class="container">
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Plate Number</th>
            <th>Start Time</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Price</th>
            <th>Vacancy</th>
            <th>My Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($car_ride_bids as $ride): ?>
        <?php $status = $ride['accepted'] ? "Pending" : "Confirmed"; ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td>" . $ride['my_price'] . "</td>
            <td>" . $status . "</td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>