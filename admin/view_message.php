<?php
include('includes/header.php');
include('core/myfunction.php');
if (!isset($_GET['id'])){
  echo"<h3 class='ms-3'>missing id from url</h3>";
    exit();
}
else{
    $id = $_GET['id'];
    $contacts = getByID('contact', $id);
    if (mysqli_num_rows($contacts) <= 0){
      echo"<h3 class='ms-3'>Not Found</h3>";
      exit();
    }
    $contact = mysqli_fetch_array($contacts);
}
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="fw-bolder fs-3">The Message</h4>
              </div>
              <div class="card-body ">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 mb-5">
                    <textarea disabled cols="30" rows="10"><?= $contact['message'] ?></textarea>
                  </div>
                  <div class="col-md-12">
                    <a class="btn btn-primary" type="submit" href="view-contacts.php">Back</a>
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