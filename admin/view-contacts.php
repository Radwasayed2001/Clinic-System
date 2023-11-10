<?php
include('includes/header.php');
include('core/myfunction.php');
?>
<div class="container py-4">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Contacts</h4>
                </div>
                
                <div class="card-body" id="contacts-table">
                <div class="table-responsive">
                <?php 
                $contact = getAll('contact');
                if (mysqli_num_rows($contact) > 0) :
                ?>
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>subject</th>
                                <th>phone</th>
                                <th>email</th>
                                <th>View Message</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                    foreach ($contact as $item):
                                ?>
                                <tr>
                                <td><?= $item['id']?></td>
                                <td><?= $item['name']?></td>
                                <td><?= $item['subject']?></td>
                                <td><?= $item['phone']?></td>
                                <td><?= $item['email']?></td>
                                
                                <td><a href="view_message.php?id=<?= $item['id'] ?>" class="btn btn-primary"><i class="fa-solid fa-eye fs-6"></i></a></td>
                                <input type="hidden" name="contact_id" value="<?= $item['id'] ?>">
                                <td>
                                <button type="button" class="btn btn-sm btn-danger delete-contact-btn" value="<?= $item['id'] ?>">
                                    <i class="fa-solid fa-trash-can fs-6"></i>
                                    </td>
                            </tr>
                            <?php endforeach; else: ?>
                                <h2>No Contact</h2>
                                <?php endif;?>
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