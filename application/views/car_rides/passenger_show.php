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

<h3> Accpeted bids for this ride </h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th style="width: 50%">Passenger Email</th>
            <th style="width: 50%">His Price</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($accepted_bids as $bid): ?>
        <?php echo "<tr>
            <td>" . $bid['passenger_email'] . "</td>
            <td>" . $bid['price'] . "</td>
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
            <th style="width: 50%">His Price</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($pending_bids as $bid): ?>
        <?php echo "<tr>
            <td>" . $bid['passenger_email'] . "</td>
            <td>" . $bid['price'] . "</td>
        </tr>"; ?>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

<br></br>

<div class="container">
<h3> Manage my mid for this Ride </h3>
    <?php $start_time_slug = url_title($ride['start_time'], 'underscore'); ?>
    <?php echo form_open('bids/bid/'.$ride['plate_number'].'/'.$start_time_slug); ?>
    <form>
        <div class="form-group row">
            <div class="col-md-2">
                <input type="number" class="form-control" name="price" id="price" min="0" max="100" step=".01"
                    placeholder="Your price">
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Place New Bid</button>
                <?php $delete_url = site_url('bids/delete_bid/'.$ride['plate_number'].'/'.$start_time_slug) ?>
                <a class="btn btn-warning" href="<?php echo $delete_url ?>">Cancel my bid</a>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-10">
                <a class="btn btn-success" href="<?php echo base_url();?>bids/show_bids">Check all my bids</a>
                <a class="btn btn-info" href="<?php echo base_url();?>car_rides/index">Find other available rides</a>
            </div>
    </form>
    <?php echo form_close(); ?>
</div>
