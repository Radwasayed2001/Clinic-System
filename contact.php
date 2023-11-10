<?php include('includes/header.php')?>
    <div class="page-wrapper">
    <?php
    if (isset($_SESSION['message'])):?>
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']);
    endif;?>
    <?php include('includes/navbar.php')?>

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" method="POST" action="handlers/send-message.php">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input name="phone" type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="subject">subject</label>
                            <input name="subject" type="text" class="form-control" id="subject" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="message">message</label>
                            <textarea name="message" class="form-control" id="message" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="send_massage">Send Message</button>
                </form>
            </div>

        </div>
    </div>

    <?php include('includes/footer.php');?>