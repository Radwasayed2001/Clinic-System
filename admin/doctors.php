<?php
include('includes/header.php');
include('core/myfunction.php');
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Doctors</h4>
                </div>
                <div class="card-body" id="doctors-table">
                <div class="table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $doctors = getAll('doctors');
                                if (mysqli_num_rows($doctors) > 0) :
                                    foreach ($doctors as $item):
                                ?>
                                <tr>
                                <td><?= $item['id']?></td>
                                <td><?= $item['name']?></td>
                                <td>
                                    <img src="uploads/<?= $item['image'] ?>" width="50px" height="50px" alt="">
                                </td>
                                <td><a href="edit-doctor.php?id=<?= $item['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square fs-6"></i></a></td>
                                <!-- <td><a href="delete-product.php?id=" class="btn btn-danger"><i class="fa-solid fa-trash-can fs-6"></i></a></td> -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger delete-doctor-btn" value="<?= $item['id'] ?>">
                                    <i class="fa-solid fa-trash-can fs-6"></i>
                                </button>
                                    
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