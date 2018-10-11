<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<div class="container">
    <?php echo form_open('car_rides/update'); ?>
        <div class="form-group row">
            <label for="plate_number" class="col-md-2 col-form-label">Car</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="plate_number" id="plate_number"
                    value="<?php echo $car_ride['plate_number'] ?>" readonly>
            </div>
        </div></br>

        <div class="form-group row">
            <label for="start_time" class="col-md-2 col-form-label">Start Time</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="start_time" id="start_time"
                    value="<?php echo $car_ride['start_time'] ?>" readonly>
            </div>
        </div><br />

        <div class="form-group row">
            <label for="origin" class="col-md-2 col-form-label">Origin</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="origin" id="destination"
                    value="<?php echo $car_ride['origin'] ?>" />
            </div>
        </div><br />

        <div class="form-group row">
            <label for="destination" class="col-md-2 col-form-label">Destination</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="destination" id="destination"
                    value="<?php echo $car_ride['destination'] ?>" />
            </div>
        </div><br />

        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name="price" id="destination" min="0" max="100"
                    value="<?php echo $car_ride['price'] ?>"/>
            </div>
        </div><br />

        <div class="form-group row">
            <label for="vacancy" class="col-md-2 col-form-label">Vacancy</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name="vacancy" id="vacancy" min="0" max="50"
                    value="<?php echo $car_ride['vacancy'] ?>"/>
            </div>
        </div><br />

        <div class="form-group row">
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    <?php echo form_close(); ?>
</div>