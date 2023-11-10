<?php
include('includes/header.php');
include('core/myfunction.php');
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bookings</h4>
                </div>
                <div class="card-body" id="bookings-table">
                <div class="table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Doctor Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Edit Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $booking = getAll('bookings');
                                if (mysqli_num_rows($booking) > 0) :
                                    foreach ($booking as $item):
                                        $get_doctorname_query = "SELECT `name` FROM `doctors` WHERE `id` = '{$item['doctor_id']}'";
                                        $get_doctorname_query_run = mysqli_query($con,$get_doctorname_query);
                                        $doctor_name = mysqli_fetch_array($get_doctorname_query_run);
                                ?>
                                <tr>
                                <td><?= $item['id']?></td>
                                <td><?= $item['name']?></td>
                                <td><?= $doctor_name['name']?></td>
                                <td><?= $item['date']?></td>
                                <td><?= $item['status']?'Completed':'Under Process'?></td>
                                
                                <td><a href="edit-booking-status.php?id=<?= $item['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fs-6"></i></a></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-danger delete-booking-btn" value="<?= $item['id'] ?>">
                                    <i class="fa-solid fa-trash-can fs-6"></i>
                                    </td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php');