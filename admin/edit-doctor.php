<?php
include('includes/header.php');
include('core/myfunction.php');
if (!isset($_GET['id'])) {
    echo "<h2 class='ms-md-5'>'id' Missing From URL</h2>";
    exit();
}
$id = $_GET['id'];
$doctor = getByID('doctors', $id);
if (mysqli_num_rows($doctor) > 0){
    $data = mysqli_fetch_array($doctor);
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">
                  Edit Doctor
                  <a href="doctors.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-8">
                    <label for="">Select Major</label>
                    <select name="major_id" class="form-select mb-4 fs-6" style="cursor: pointer;">
                      <?php
                    $majors = getAll('major');
                    if(mysqli_num_rows($majors) > 0){
                      foreach($majors as $major){
                        
                    ?>
                    <option <?= $data['major_id']==$major['id']?"selected":"" ?> value="<?=$major['id']?>"><?=$major['name']?></option>
                    <?php 
                    
                  }
                }
                else{
                  echo "no majors available";
                }
                ?>
                    </select>
                    
                  </div>
                  <div class="col-md-6">
                    <label for="" >Name</label>
                    <input value="<?= $data['name'] ?>" required name="name" type="text" class="form-control">
                  </div>
                  <div class="col-md-12 my-4 d-flex align-items-center">
                    <label for="" class="me-5 ">Bio</label>
                    <textarea  required name="bio" id="" cols="90" rows="5"><?= $data['bio'] ?></textarea>
                  </div>
                  <div class="col-md-12 my-2">
                    <input type="hidden" value="<?= $data['image'] ?>" name="old_image">
                    <label for="" class="">Image</label>
                    <input type="file" name="image" name="image">
                    <label class="me-2">Current Image</label>
                    <img src="uploads/<?= $data['image'] ?>" width="50px" height="50px" alt="">
                  </div>
                  <input type="hidden" name="doctor_id" value="<?= $id ?>">
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="update-doctor-btn">Update</button>
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
include('includes/footer.php');