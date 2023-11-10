<?php
include('includes/header.php');
include('core/myfunction.php');
if((isset($_GET['id']))){
    $id = $_GET['id'];
    $major = getByID('major',$id);
    if (mysqli_num_rows($major) > 0){
        $data = mysqli_fetch_array($major);
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">
                  Edit Major
                  <a href="majors.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <label for="" >Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $data['name']?>">
                    <input type="hidden" value="<?= $data['id']?>" name="major-id">
                  </div>
                  <div class="col-md-12 my-2">
                    <label for="" class="">Image</label>
                    <input type="file" name="image" name="image">
                    <label for="">current image</label>
                    <img src="uploads/<?= $data['image'] ?>" width="50px" height="50px">
                    <input type="hidden" name="old_image" value="<?=$data['image'] ?>">
                  </div>
                  <div class="col-md-12">
                    <button class="btn btn-secondary" type="submit" name="update-major-btn">Update</button>
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
    echo "<h2 class='ms-md-5'>Category Not Found</h2>";
}
}
else {
    echo "<h2 class='ms-md-5'>'id' Missing From URL</h2>";
}
include('includes/footer.php');