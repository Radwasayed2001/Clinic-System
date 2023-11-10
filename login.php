<?php
    include('includes/header.php');
    include('core/functions.php');
    if (isset($_SESSION['auth'])) {
        redirect('index.php');
        die();
    }
    ?>
    <div class="page-wrapper">
    <?php include('includes/navbar.php');?>
    <?php
    if (isset($_SESSION['message'])):?>
        <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php unset($_SESSION['message']);
    endif;?>
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form row g-3 needs-validation" method="POST" action="handlers/handleLogin.php">

                    <div class="mb-3">
                        <label class="form-label required-label  needs-validation" for="email">Email</label>
                        <input name="email" value="<?php value('email') ?>" type="email" class="form-control <?php isvalid('email') ?>" id="email" required>
                        <div class="<?php validfeedback('email') ?>">
                            <?php
                            if (isset($_SESSION['error']['email'])){
                            echo $_SESSION['error']['email'];
                            unset($_SESSION['error']['email']);
                            
                            }
                            elseif (isset($_SESSION['email'])) {
                            unset($_SESSION['email']);
                            }
                            ?>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input name="password" value="<?php value('password') ?>" type="password" class="form-control <?php isvalid('password') ?>" id="password" required>
                        <div class="<?php validfeedback('password') ?>">
                            <?php
                            if (isset($_SESSION['error']['password'])){
                            echo $_SESSION['error']['password'];
                            unset($_SESSION['error']['password']);

                            }
                            elseif (isset($_SESSION['password'])) {
                            unset($_SESSION['password']);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-25 fs-5 fw-bold">Login</button>

                    </div>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="./register.php">create account</a>
                </div>
            </div>

        </div>
    </div>
<?php include('includes/footer.php');?>
    