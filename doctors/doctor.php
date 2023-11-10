<?php include('includes/header.php');
include('core/functions.php');
if (!isset($_SESSION['auth'])){
    header('location:../index.php');
    exit();
}
else if (!isset($_GET['id'])){
    $_SESSION['message'] = "Missing ID From URL";
    header('location:../index.php');
    exit();
}
$id = $_GET['id'];
$doctors = getByID('doctors',$id);
$doctor = mysqli_fetch_assoc($doctors);
$major = getMajor($doctor['major_id']);
$major_name = mysqli_fetch_assoc($major);
?>
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
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php?id=<?=$doctor['major_id']?>"><?=$major_name['name']?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $doctor['name'] ?></li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    <img src="../Admin/uploads/<?= $doctor['image']?>" alt="doctor" class="img-fluid rounded-circle" height="200px"
                        width="200px">
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold"><?= $doctor['name'] ?></h4>
                        <div class="d-flex gap-3 align-bottom">
                            <ul class="rating">
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                                <li class="star"></li>
                            </ul>
                            <a href="#" class="align-baseline">submit rating</a>
                        </div>
                        <h6 class="card-title fw-bold"><?= $doctor['bio'] ?></h6>
                    </div>
                </div>
                <hr />
                <form class="form" method="POST" action="code.php">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" required>
                        </div>
                        <input type="hidden" value="<?= $doctor['id'] ?>" name="doctor_id" id="">
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input name="phone" type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="date">Date</label>
                            <input name="date" type="date" class="form-control" id="date" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="add-booking-btn">Confirm Booking</button>
                </form>

            </div>
        </div>
    </div>
    <footer class="container-fluid bg-blue text-white py-3">
        <div class="row gap-2">

            <div class="col-sm order-sm-1">
                <h1 class="h1">About Us</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                    laborum
                    saepe
                    enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur
                    cum
                    iure
                    quod facere.</p>
            </div>
            <div class="col-sm order-sm-2">
                <h1 class="h1">Links</h1>
                <div class="links d-flex gap-2 flex-wrap">
                    <a href="../index.php" class="link text-white">Home</a>
                    <a href="../majors.php" class="link text-white">Majors</a>
                    <a href="./index.php" class="link text-white">Doctors</a>
                    <a href="../login.php" class="link text-white">Login</a>
                    <a href="../register.php" class="link text-white">Register</a>
                    <a href="../contact.php" class="link text-white">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        const stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const isActive = star.classList.contains('active');
                if (isActive) {
                    star.classList.remove('active');
                } else {
                    star.classList.add('active');
                }
                for (let i = 0; i < index; i++) {
                    stars[i].classList.add('active');
                }
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove('active');
                }
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"
        integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

    </html>