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
            <th>Actions</th>
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
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>