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
        <?php
            $slug = url_title($ride['start_time'], 'underscore');
            $edit_url = site_url('car_rides/edit/'.$ride['plate_number'].'/'.$slug);
            $delete_url = site_url('car_rides/delete/'.$ride['plate_number'].'/'.$slug);
        ?>
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
            <td><a class='btn btn-warning' href=" . $edit_url .
                "><span class='glyphicon glyphicon-pencil'></span>
                </a><a class='btn btn-danger' href=" .$delete_url .
                "><span class='glyphicon glyphicon-trash'></span>
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