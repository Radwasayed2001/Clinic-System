<?php
$array = explode("/", $_SERVER['PHP_SELF']);
$result =  end($array);
?>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href="#" target="_blank">
      <i class="fa-solid fa-screwdriver-wrench fw-bold text-dark fs-5"></i>
        <span class="ms-1 fw-bolder fs-6 text-dark">Admin dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $result=="index.php"?"active":"" ?> d-flex align-items-end" href="index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-house  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="add-major.php"?"active":"" ?> d-flex align-items-end" href="add-major.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-plus text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">Add Major</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="majors.php"?"active":"" ?> d-flex align-items-end" href="majors.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-rectangle-list  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">All Majors</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="add-doctor.php"?"active":"" ?> d-flex align-items-end" href="add-doctor.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-square-plus  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">Add Doctor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="doctors.php"?"active":"" ?> d-flex align-items-end" href="doctors.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-border-all  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">All Doctors</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="bookings.php"?"active":"" ?> d-flex align-items-end" href="bookings.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-calendar-check  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">All Bookings</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $result=="view-contacts.php"?"active":"" ?> d-flex align-items-end" href="view-contacts.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            
            <i class="fa-solid fa-address-book  text-dark fw-bold fs-5"></i>
            </div>
            <span class="nav-link-text ms-1 fw-bold text-secondary fs-6">View Contacts</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 mt-5">
      <a class="btn btn-primary btn-sm mb-0 w-100 fw-bolder fs-6" href="logout.php" type="button">Logout</a>
    </div>
  </aside>