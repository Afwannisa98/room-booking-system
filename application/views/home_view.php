<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mayang Sdn Bhd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
</head>
<body>

<?php $this->load->view('navbar'); ?>

<!-- Hero Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url('assets/images/mayang.jpg'); ?>" class="d-block w-100" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Easy Room Booking</h5>
        <p>Reserve rooms quickly and easily with our system.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/hall.jpg'); ?>" class="d-block w-100" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Modern Facilities</h5>
        <p>All rooms are equipped with modern tools for your needs.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/slide3.jpg'); ?>" class="d-block w-100" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>24/7 Access</h5>
        <p>Book anytime, anywhere from your phone or computer.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/images/data.jpg'); ?>" class="d-block w-100" style="height: 500px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Secure & Reliable</h5>
        <p>Your booking data is safe with us.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
<!-- Types of Rooms Section (Carousel Format) -->
<section id="room-types" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Flexible workspace designed to suit your needs</h2>

    <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row">
            <!-- Room 1 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/meeting_room.jpg'); ?>" class="card-img-top" alt="Meeting Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Meeting Room</h5>
                  <p class="card-text">Perfect for small meetings and conferences.</p>
                </div>
              </div>
            </div>
            <!-- Room 2 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/lecture_room.jpg'); ?>" class="card-img-top" alt="Lecture Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Lecture Room</h5>
                  <p class="card-text">Spacious rooms for lectures and seminars.</p>
                </div>
              </div>
            </div>
            <!-- Room 3 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/eventspace_room.jpg'); ?>" class="card-img-top" alt="Hall" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Event Space</h5>
                  <p class="card-text">Large hall suitable for events and exhibitions.</p>
                </div>
              </div>
            </div>
            <!-- Room 4 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/audiovisual_room.jpg'); ?>" class="card-img-top" alt="Audio Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Audio Visual Room</h5>
                  <p class="card-text">Designed for sound recording and editing.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Slide 2 (New Rooms) -->
        <div class="carousel-item">
          <div class="row">
            <!-- Room 5 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/multipurpose_room.jpg'); ?>" class="card-img-top" alt="Studio" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Multipurpose Room</h5>
                  <p class="card-text">Great for photography, videography or media creation.</p>
                </div>
              </div>
            </div>
            <!-- Room 6 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/conference_room.jpg'); ?>" class="card-img-top" alt="Conference Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Conference Room</h5>
                  <p class="card-text">Formal setting for important discussions and board meetings.</p>
                </div>
              </div>
            </div>
            <!-- Room 7 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/workshop_room.jpg'); ?>" class="card-img-top" alt="Training Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Training Room</h5>
                  <p class="card-text">Ideal for training sessions, workshops, and coaching.</p>
                </div>
              </div>
            </div>
            <!-- Room 8 -->
            <div class="col-md-3">
              <div class="card shadow">
                <img src="<?= base_url('assets/images/minihall_room.jpg'); ?>" class="card-img-top" alt="Collaboration Room" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title">Mini Hall</h5>
                  <p class="card-text">Perfect for team-based brainstorming and agile work.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>


<!-- About Us Section -->
<section id="about" class="about-section py-5 text-center">
  <div class="container">
    <h2 class="mb-4">About Us</h2>
    <p class="lead mx-auto" style="max-width: 800px;">
      We provide an efficient and user-friendly platform for managing room bookings across organizations and institutions.
      Whether it's a conference, seminar, or meeting, book your space effortlessly!
    </p>
  </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="text-center">
  <div class="container">
  <h2 style="color: #fff;">Contact Us</h2>

    <p class="lead">Need help or have questions? Reach us at <a href="mailto:support@mayang.com">support@mayang.com</a> or call +6012-3456789</p>
  </div>
</section>

<!-- Map Section -->
<section id="location" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Our Location</h2>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="map-responsive shadow rounded-4 overflow-hidden">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15930.051195810047!2d103.7497976624562!3d1.4926597340102186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da7193876c4657%3A0xc52efb4376c0cbf5!2sJohor%20Bahru%2C%20Johor!5e0!3m2!1sen!2smy!4v1713524170759!5m2!1sen!2smy"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Your modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?php echo site_url('auth/login'); ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Loging</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      <div id="login-alert"></div>
        <!-- ✅ Show alert if login error exists -->
        <?php if (isset($_SESSION['login_error'])): ?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['login_error']; ?>
          </div>
        <?php unset($_SESSION['login_error']); endif; ?>

        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-success">Login</button>
        <p class="mb-0">Not registered? 
          <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">
            Sign Up
          </button>
        </p>
      </div>
    </form>
  </div>
</div>


<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= base_url('auth/register') ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="signup_username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="signup_username" required>
        </div>
        <div class="mb-3">
          <label for="signup_email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="signup_email" required>
        </div>
        <div class="mb-3">
          <label for="signup_password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="signup_password" required>
        </div>
        <div class="mb-3">
          <label for="signup_confirm" class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" id="signup_confirm" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-success">Sign Up</button>
        <p class="mb-0">Already have an account? 
          <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
            Back to Login
          </button>
        </p>
      </div>
    </form>
  </div>
</div>


<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




<?php if (isset($_SESSION['show_login_modal']) && $_SESSION['show_login_modal'] === true): ?>
  <script>
    var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
    myModal.show();
  </script>
  <?php unset($_SESSION['show_login_modal']); ?>
<?php endif; ?>




<!-- error for sign up -->
<?php if (isset($_GET['error'])): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show();
      document.getElementById("login-alert").innerHTML = `<div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($_GET['error']); ?></div>`;
    });
  </script>
<?php elseif (isset($_GET['success'])): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show();
      document.getElementById("login-alert").innerHTML = `<div class="alert alert-success" role="alert"><?php echo htmlspecialchars($_GET['success']); ?></div>`;
    });
  </script>
<?php endif; ?>

<!-- success alert (like “Registered successfully!”) will show inside the modal and disappear automatically after 3 seconds. -->

<?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show();

      const alertBox = document.getElementById("login-alert");
      const message = `<?php echo isset($_GET['error']) ? htmlspecialchars($_GET['error']) : htmlspecialchars($_GET['success']); ?>`;
      const alertType = `<?php echo isset($_GET['error']) ? 'danger' : 'success'; ?>`;

      alertBox.innerHTML = `
        <div class="alert alert-${alertType} alert-dismissible fade show" role="alert" id="fade-alert">
          ${message}
        </div>`;

      // Fade out after 3 seconds
      setTimeout(() => {
        const fadeAlert = document.getElementById('fade-alert');
        if (fadeAlert) {
          fadeAlert.classList.remove('show'); // starts the fade
          fadeAlert.classList.add('fade'); // ensure fade class is present
          setTimeout(() => {
            fadeAlert.remove(); // remove from DOM after fade completes
          }, 500); // match Bootstrap's fade transition (usually ~0.15–0.5s)
        }
      }, 3000);
    });
  </script>
<?php endif; ?>


<footer>
  &copy; <?php echo date("Y"); ?> Mayang Sdn Bhd. All rights reserved.
</footer>

</body>
</html>
