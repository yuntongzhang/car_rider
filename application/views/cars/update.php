<h2><?php echo $title; ?></h2>
 <?php echo validation_errors(); ?>
 <div class="container">
     <?php echo form_open('Cars/update_car'); ?>
         <div class="form-group row">
            <label for="plate_number" class="col-md-2 col-form-label">Plate Number</label>
            <div class="col-md-10">
                <input type="text" class="form-control" name = "plate_number" id="plate_number" /><br />
            </div>
        </div>
         <div class="form-group row">
            <label for="driver_email" class="col-md-2 col-form-label">Your Driver Email</label>
            <div class="col-md-10">
                <input type="text" readonly class="form-control-plaintext" name = "driver_email" id="driver_email" value="<?php echo $driver_email?>" /><br />
            </div>
        </div>
         <div class="form-group row">
            <label for="car_type" class="col-md-2 col-form-label">New Car Type</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name = "car_type" id="car_type" /><br />
            </div>
        </div>
         <div class="form-group row">
            <label for="size" class="col-md-2 col-form-label">New Size</label>
            <div class="col-md-6">
                <input type="number" class="form-control" name = "size" min="0" max="50" /><br />
            </div>
        </div>
         <div class="form-group row">
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">Update</button>
                <a class="btn btn-success" href="<?php echo base_url(); ?>Cars/index">Back to Car Listing</a>
            </div>
        </div>
    </form>

</div>