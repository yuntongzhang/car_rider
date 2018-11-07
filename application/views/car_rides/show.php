<div class="container">
<h3> Detail of this car ride </h3>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
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
        <?php echo "<tr>
            <td>" . $ride['plate_number'] . "</td>
            <td>" . $ride['start_time'] . "</td>
            <td>" . $ride['origin'] . "</td>
            <td>" . $ride['destination'] . "</td>
            <td>" . $ride['price'] . "</td>
            <td>" . $ride['vacancy'] . "</td>
        </tr>"; ?>
    </tbody>
</table>
<h3> Accpeted Bids for this ride </h3>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Passenger Email</th>
            <th>His Price</th>
            <th>Reject This Bid</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($accepted_bids as $bid): ?>
        <?php
            $time_slug = url_title($ride['start_time'], 'underscore');
            $email_slug = str_replace('@', '-', $bid['passenger_email']);
            $reject_bid_url = site_url('bids/reject_bid/'.$ride['plate_number'].'/'.$time_slug.'/'.$email_slug);
        ?>
        <?php echo "<tr>
            <td>" . $bid['passenger_email'] . "</td>
            <td>" . $bid['price'] . "</td>
            <td><a class='btn btn-danger' href=" . $reject_bid_url .
                ">Reject
                </a>
            </td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>



<h3> Pending bids for this ride </h3>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Passenger Email</th>
            <th>His Price</th>
            <th>Accept This Bid</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pending_bids as $bid): ?>
        <?php
            $time_slug = url_title($ride['start_time'], 'underscore');
            $email_slug = str_replace('@', '-', $bid['passenger_email']);
            $select_bid_url = site_url('bids/select_bid/'.$ride['plate_number'].'/'.$time_slug.'/'.$email_slug);
        ?>
        <?php echo "<tr>
            <td>" . $bid['passenger_email'] . "</td>
            <td>" . $bid['price'] . "</td>
            <td><a class='btn btn-warning' href=" . $select_bid_url .
                ">Accept
                </a>
            </td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>