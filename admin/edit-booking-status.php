<?php
include('includes/header.php');
include('core/myfunction.php');
if((isset($_GET['id']))){
    $id = $_GET['id'];
    $booking = getByID('bookings',$id);
    if (mysqli_num_rows($booking) > 0){
        $data = mysqli_fetch_array($booking);
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">
                  Edit Booking Status
                  <a href="bookings.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <label for="" >Booking ID</label>
                    <h6 class="bg-light"><?= $data['id']?></h6>
                    <input type="hidden" name="booking_id" value="<?= $data['id']?>">
                  </div>
                  <div class="col-md-6">
                    <label for="" >Booking Name</label>
                    <h6 class="bg-light"><?= $data['name']?></h6>
                  </div>
                  <div class="col-md-6">
                    <label for="" >Booking Date</label>
                    <h6 class="bg-light"><?= $data['date']?></h6>
                  </div>
                  <div class="col-md-12 my-5">
                    <button class="btn btn-secondary" type="submit" name="update-booking-status-btn">Change Status</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
}
else{
    echo "<h2 class='ms-md-5'>Booking Not Found</h2>";
}
}
else {
    echo "<h2 class='ms-md-5'>'id' Missing From URL</h2>";
}
include('includes/footer.php');