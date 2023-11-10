<?php
include('includes/header.php');
include('core/functions.php');
if (isset($_SESSION['auth'])) {
    redirect('index.php');
    die();
}
?>
    <div class="page-wrapper">
    <?php include('includes/navbar.php')?>

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form row g-3 needs-validation" novalidate  method="POST" action="handlers/handleRegister.php">
                <?php if (isset($_SESSION['error']['fail'])): ?>
                    <div class="alert alert-danger text-center">
                    <?php 
                        echo $_SESSION['error']['fail'];
                        unset($_SESSION['error']['fail']);
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input value="<?php value('name') ?>" name="name" type="text" class="form-control <?php isvalid('name') ?>" id="name" required>
                            <div class="<?php validfeedback('name') ?>">
                                <?php
                                if (isset($_SESSION['error']['name'])){
                                echo $_SESSION['error']['name'];
                                unset($_SESSION['error']['name']);
                                }
                                elseif (isset($_SESSION['name'])) {
                                    echo "valid";
                                    unset($_SESSION['name']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input value="<?php value('phone') ?>" name="phone" type="tel" class="form-control <?php isvalid('phone') ?>" id="phone" required>
                            <div class="<?php validfeedback('phone') ?>">
                                <?php
                                if (isset($_SESSION['error']['phone'])){
                                echo $_SESSION['error']['phone'];
                                unset($_SESSION['error']['phone']);
                                }
                                elseif (isset($_SESSION['phone'])) {
                                    echo "valid";
                                    unset($_SESSION['phone']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input value="<?php value('email') ?>" name="email" type="email" class="form-control <?php isvalid('email') ?>" id="email" required>
                            <div class="<?php validfeedback('email') ?>">
                                <?php
                                if (isset($_SESSION['error']['email'])){
                                echo $_SESSION['error']['email'];
                                unset($_SESSION['error']['email']);
                                }
                                elseif (isset($_SESSION['email'])) {
                                    echo "valid";
                                    unset($_SESSION['email']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="password">password</label>
                            <input value="<?php value('password') ?>" name="password" type="password" class="form-control <?php isvalid('password') ?>" id="password" required>
                            <div class="<?php validfeedback('password') ?>">
                                <?php
                                if (isset($_SESSION['error']['password'])){
                                echo $_SESSION['error']['password'];
                                unset($_SESSION['error']['password']);
                                }
                                elseif (isset($_SESSION['password'])) {
                                    echo "valid";
                                    unset($_SESSION['password']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-25 fs-5 fw-bold">Create account</button>
                    </div>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="./login.php"> login</a>
                </div>
            </div>

        </div>
    </div>

    <?php include('includes/footer.php')?>
