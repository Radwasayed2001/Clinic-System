<?php

include('includes/header.php');
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">Add Major</h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 mb-5">
                    <label for="" >Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="col-md-12 mb-5">
                    <label for="" class="">Image</label>
                    <input type="file" name="image" name="image">
                  </div>
                  
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" name="add-major-btn">Save</button>
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