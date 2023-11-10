<?php
include('core/myfunction.php');
include('includes/header.php');
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">Add Doctor</h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-8">
                    <label for="">Select Major</label>
                    <select name="major_id" class="form-select mb-4 fs-6" style="cursor: pointer;">
                      <option selected>Select Major</option>
                      <?php
                    $majors = getAll('major');
                    if(mysqli_num_rows($majors) > 0){
                      foreach($majors as $major){
                        
                    ?>
                    <option value="<?=$major['id']?>"><?=$major['name']?></option>
                    <?php 
                    
                  }
                }
                else{
                  echo "no doctors available";
                }
                ?>
                    </select>
                    
                  </div>
                  <div class="col-md-6">
                    <label for="" >Name</label>
                    <input required name="name" type="text" class="form-control">
                  </div>
                  
                  <div class="col-md-12 my-4 d-flex align-items-center">
                    <label for="" class="me-5 ">Bio</label>
                    <textarea required name="bio" id="" cols="90" rows="5"></textarea>
                  </div>
                  <div class="col-md-12 my-2">
                    <label for="" class="">Image</label>
                    <input  required type="file" name="image" name="image">
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="add-doctor-btn">Add</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php
include('includes/footer.php');