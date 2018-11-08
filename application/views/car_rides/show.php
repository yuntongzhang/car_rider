<div class="container">
<h3> Detail of this car ride </h3>
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

<br></br>

<h3> Meta data of this ride </h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width: 25%">Minimum Bid</th>
            <th style="width: 25%">Maximum Bid</th>
            <th style="width: 25%">Average Bid</th>
	    <th style="width: 25%">Total Sum</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($meta_data as $part_data): ?>
        <?php echo "<tr>
            <td>" . $part_data['minimum'] . "</td>
            <td>" . $part_data['maximum'] . "</td>
            <td>" . $part_data['average'] . "</td>
	    <td>" . $part_data['total'] . "</td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
<br></br>

<h3> Accpeted Bids for this ride </h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width: 50%">Passenger Email</th>
            <th style="width: 30%">His Price</th>
            <th style="width: 20%">Reject This Bid</th>
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

<br></br>

<h3> Pending bids for this ride </h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width: 50%">Passenger Email</th>
            <th style="width: 30%">His Price</th>
            <th style="width: 20%">Accept This Bid</th>
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

<br></br>

<?php $start_time_slug = url_title($ride['start_time'], 'underscore'); ?>
<?php $edit_url = site_url('car_rides/edit/'.$ride['plate_number'].'/'.$start_time_slug) ?>
<?php $delete_url = site_url('car_rides/delete/'.$ride['plate_number'].'/'.$start_time_slug) ?>
<a class="btn btn-warning" href="<?php echo $edit_url; ?>">Update This Ride</a>
<a class="btn btn-danger" href="<?php echo $delete_url; ?>">Delete This Ride</a>

<br></br>

<?php $rides_url = site_url('Cars/show_car_rides/'.$ride['plate_number'])?>
<a class="btn btn-info" href="<?php echo $rides_url; ?>">Back to Rides Listing</a>
<a class="btn btn-success" href="<?php echo base_url(); ?>Cars/index">Back to Car Listing</a>

</div>
