<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg fixed-top shadow transition-theme px-3 py-2">
  <a class="navbar-brand d-flex align-items-center text-white" href="index.php">
    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" height="30" class="me-2">
    <span class="fw-bold">Mayang Sdn Bhd</span>
  </a>

  <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav align-items-center">
      
      <?php if (!isset($_SESSION['role'])): ?>
        <!-- Only for guests -->
        <li class="nav-item"><a class="nav-link text-white" href="#about">About Us</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#contact">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#location">Location</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>

      <?php elseif ($_SESSION['role'] == 2): ?>
        <!-- Logged in as user --> 
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('booking/create'); ?>">Book Room</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('booking/index'); ?>">List Bookings</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>

      <?php elseif ($_SESSION['role'] == 1 ): ?>
        <!-- Logged in as admin -->
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('booking/index'); ?>">List Bookings</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('room/index'); ?>">Room Manager</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('room/create'); ?>">Add Room</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>

      <?php endif; ?>
      
    </ul>
  </div>
</nav>
