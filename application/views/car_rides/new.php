<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<div class="container">
    <?php echo form_open('car_rides/create'); ?>
        <div class="form-group row">
            <label for="plate_number" class="col-md-2 col-form-label">Car</label>
            <div class="col-md-10">
                <select class="form-control" name="plate_number" id="plate_number">
                    <?php foreach ($cars as $car): ?>
                    <option><?php echo $car['plate_number'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div></br>

        <div class="form-group row">
            <label for="start_time" class="col-md-2 col-form-label">Start Time</label>
            <div class="col-md-10">
                <input type="datetime-local" class="form-control" name="start_time" id="start_time" />
            </div>
        </div><br />

        <div class="form-group row">
            <label for="origin" class="col-md-2 col-form-label">Origin</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="origin" id="destination" />
            </div>
        </div><br />

        <div class="form-group row">
            <label for="destination" class="col-md-2 col-form-label">Destination</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name="destination" id="destination" />
            </div>
        </div><br />


        <div class="form-group row">
            <label for="price" class="col-md-2 col-form-label">Price</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name="price" id="destination" min="0" max="100" step=".01"/>
            </div>
        </div><br />

        <div class="form-group row">
            <label for="vacancy" class="col-md-2 col-form-label">Vacancy</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name="vacancy" id="vacancy" min="0" max="50" />
            </div>
        </div><br />

        <div class="form-group row">
            <div class="col-md-10">
                <button type="submit" class="btn btn-success">Create</button>
                <a class="btn btn-info" href="<?php echo site_url(); ?>car_rides/own">Back to All Rides</a>
            </div>
        </div>

    <?php echo form_close(); ?>
</div>