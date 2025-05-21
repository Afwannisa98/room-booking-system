<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

     <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #ffffff;
            padding-top: 80px;
            color: #333;
        }
        /* .navbar {
        background-color: #2c003e;
        } */
        .container-box {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #4B0082;
        }
        .table th {
            background-color: #e3d7ff;
        }
         #currentDateTime {
            font-weight: 600;
            font-size: 1.2rem;
            color: #4B0082;
            margin-bottom: 20px;
            text-align: center;
        }


    </style>
</head>
<body>

<?php $this->load->view('navbar'); ?>

<div class="container mt-5">
    <div class="container-box">
        <h2 class="text-center mb-4">Welcome, <?= htmlspecialchars($username) ?>!</h2>
        <div id="currentDateTime"></div>
        <!-- <p class="text-center">You are logged in as <strong><?= htmlspecialchars($role) ?></strong>.</p> -->
        <!-- <?php  echo '<br>User ID: ' . $this->session->userdata('user_id'); ?> -->
        <!-- filter booking -->
        <!-- <div class="container-box mb-4">
            <h4>Filter Bookings</h4>
            <form method="GET" action="<?= site_url('dashboard_user') ?>" class="row g-3 align-items-center">
                <div class="col-md-3">
                    <label for="filter_date" class="form-label">Date</label>
                    <input type="date" id="filter_date" name="date" value="<?= isset($_GET['date']) ? htmlspecialchars($_GET['date']) : '' ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="filter_room" class="form-label">Room</label>
                    <select id="filter_room" name="room" class="form-select">
                        <option value="">All Rooms</option>
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= htmlspecialchars($room->id) ?>" <?= (isset($_GET['room']) && $_GET['room'] == $room->id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($room->room_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="filter_status" class="form-label">Status</label>
                    <select id="filter_status" name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?= htmlspecialchars($status->id) ?>" <?= (isset($_GET['status']) && $_GET['status'] == $status->id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($status->status_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?= site_url('dashboard_user') ?>" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div> -->

        <!-- booking table section -->
        <?php if (!empty($bookings)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name <i class="bi bi-person-fill"></i></th>
                            <th>Room <i class="bi bi-door-open-fill"></i></th>
                            <th>Date <i class="bi bi-calendar-event-fill"></i></th>
                            <th>Time <i class="bi bi-clock-fill"></i></th>
                            <th>Status <i class="bi bi-info-circle-fill"></i></th>
                            <th>Action <i class="bi bi-gear-fill"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($bookings as $booking): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= htmlspecialchars($booking->name) ?></td>
                                <td><?= htmlspecialchars($booking->room_name) ?></td>
                                <!-- <td><?= htmlspecialchars($booking->start_date) ?></td>
                                <td><?= htmlspecialchars($booking->end_date) ?></td>
                                <td><?= htmlspecialchars($booking->start_time) ?></td>
                                <td><?= htmlspecialchars($booking->end_time) ?></td> -->
                                <td><?= date('d-m-Y', strtotime($booking->start_date)) ?> - <?= date('d-m-Y', strtotime($booking->end_date)) ?></td>
                                <td><?= htmlspecialchars($booking->start_time) ?> - <?= htmlspecialchars($booking->end_time) ?></td>

                                <!-- <td><?= htmlspecialchars($booking->status_name) ?></td> -->

                                <!-- Colour tag for status -->

                                <td>
                                    <?php
                                        $statusId = $booking->status_id;
                                        $statusName = htmlspecialchars($booking->status_name);
                                        $badgeClass = 'secondary'; // default: grey

                                        switch ($statusId) {
                                            case 1:
                                                $badgeClass = 'secondary'; // Grey
                                                break;
                                            case 2:
                                                $badgeClass = 'warning'; // Yellow
                                                break;
                                            case 3:
                                                $badgeClass = 'success'; // Green
                                                break;
                                            case 4:
                                                $badgeClass = 'danger'; // Red
                                                break;
                                            default:
                                                $badgeClass = 'secondary';
                                        }
                                    ?>
                                    <span class="badge bg-<?= $badgeClass ?>"><?= $statusName ?></span>
                                </td>
                                 <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?= $booking->id ?>">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                    <!-- <a href="<?= site_url('booking/edit/' . $booking->id) ?>" class="btn btn-sm btn-success">Update</a> -->
                                     <a href="<?= site_url('booking/edit/' . $booking->id) ?>" 
                                        class="btn btn-sm btn-success <?= ($booking->status_id == 3 || $booking->status_id == 4) ? 'disabled' : '' ?>" 
                                        ><i class="bi bi-pencil-square"></i>
                                    </a>
                                    <!-- <a href="<?= site_url('booking/delete/' . $booking->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?');">Cancel Booking</a> -->
                                     <a href="<?= site_url('booking/delete/' . $booking->id) ?>" 
                                        class="btn btn-sm btn-danger <?= ($booking->status_id == 3 || $booking->status_id == 4) ? 'disabled' : '' ?>" 
                                        onclick="return confirm('Are you sure you want to cancel this booking?');"><i class="bi bi-x-circle-fill"></i>
                                    </a>
                                

                                </td>
                            </tr>
                            <!-- Modal see more -->
                            <!-- <div class="modal fade" id="viewModal<?= $booking->id ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $booking->id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header text-dark" style="background-color: #e3d7ff">
                                    <h5 class="modal-title" id="viewModalLabel<?= $booking->id ?>">Booking Details - <?= htmlspecialchars($booking->name) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Name:</strong> <?= htmlspecialchars($booking->name) ?></p>
                                    <p><strong>Room:</strong> <?= htmlspecialchars($booking->room_name) ?></p>
                                    <p><strong>Start Date:</strong> <?= htmlspecialchars($booking->start_date) ?></p>
                                    <p><strong>End Date:</strong> <?= htmlspecialchars($booking->end_date) ?></p>
                                    <p><strong>Start Time:</strong> <?= htmlspecialchars($booking->start_time) ?></p>
                                    <p><strong>End Time:</strong> <?= htmlspecialchars($booking->end_time) ?></p>
                                    <p><strong>Purpose:</strong> <?= htmlspecialchars($booking->purpose ?? '-') ?></p>
                                    <p><strong>Attendees (Pax):</strong> <?= htmlspecialchars($booking->pax ?? '-') ?></p>
                                    <p><strong>Equipment:</strong> <?= htmlspecialchars($booking->equipment ?? '-') ?></p>
                                    <p><strong>Notes:</strong> <?= htmlspecialchars($booking->notes ?? '-') ?></p>
                                    <p><strong>Status:</strong> <?= htmlspecialchars($booking->status_name) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div> -->

                        <!-- end modal -->

                        <!-- start modal -->
                        <!-- end modal -->

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">No bookings found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- start modal-table -->
 <!-- Modals -->
  <?php foreach ($bookings as $booking): ?>
<div class="modal fade" id="viewModal<?= $booking->id ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $booking->id ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #6f42c1;">
                <h5 class="modal-title" id="viewModalLabel<?= $booking->id ?>">
                    Booking Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Name</div>
                            <div class="col-7"><?= htmlspecialchars($booking->name) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Contact</div>
                            <div class="col-8"><?= htmlspecialchars($booking->phone) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Email</div>
                            <div class="col-7"><?= htmlspecialchars($booking->email) ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Name</div>
                            <div class="col-7"><?= htmlspecialchars($booking->name) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Room</div>
                            <div class="col-8"><?= htmlspecialchars($booking->room_name) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Start Date</div>
                            <div class="col-7"><?= date('d-m-Y', strtotime($booking->start_date)) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">End Date</div>
                            <div class="col-8"><?= date('d-m-Y', strtotime($booking->end_date)) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Start Time</div>
                            <div class="col-7"><?= htmlspecialchars($booking->start_time) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">End Time</div>
                            <div class="col-8"><?= htmlspecialchars($booking->end_time) ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Purpose</div>
                            <div class="col-7"><?= htmlspecialchars($booking->purpose) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Attendees</div>
                            <div class="col-8"><?= htmlspecialchars($booking->pax) ?> Pax</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Equipment</div>
                            <div class="col-7"><?= htmlspecialchars($booking->equipment ?? '-') ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Notes</div>
                            <div class="col-8"><?= htmlspecialchars($booking->notes) ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                        $statusId = $booking->status_id;
                        $statusName = htmlspecialchars($booking->status_name);
                        $badgeClass = 'secondary'; // default

                        switch ($statusId) {
                            case 1: $badgeClass = 'secondary'; break;
                            case 2: $badgeClass = 'warning'; break;
                            case 3: $badgeClass = 'success'; break;
                            case 4: $badgeClass = 'danger'; break;
                        }
                    ?>
                      <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Status</div>
                            <div class="col-7">
                                <span class="badge bg-<?= $badgeClass ?>"><?= $statusName ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 fw-bold">Comment</div>
                            <div class="col-7">
                                <div class="col-8"><?= htmlspecialchars($booking->comment) ?></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="alert alert-info mt-3">
                    <strong>Note:</strong> Once a booking has been approved and processed, it cannot be cancelled or modified. For further assistance, kindly contact us at 
                    <a href="mailto:support@mayang.com">support@mayang.com</a> or call <a href="tel:+60123456789">+6012-3456789</a>.
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <small class="text-muted" id="generatedTime<?= $booking->id ?>"></small>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>



<!-- end modal -->
 <footer>
  &copy; <?php echo date("Y"); ?> Mayang Sdn Bhd. All rights reserved.
</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php foreach ($bookings as $booking): ?>
        const generatedTime<?= $booking->id ?> = document.getElementById("generatedTime<?= $booking->id ?>");
        if (generatedTime<?= $booking->id ?>) {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric', 
                              hour: '2-digit', minute: '2-digit', second: '2-digit' };
            generatedTime<?= $booking->id ?>.innerText = "Generated at: " + now.toLocaleDateString("en-GB", options);
        }
        <?php endforeach; ?>
    });
</script>


<!-- script live datetime -->
 <script>
// Display current date and time, updating every second
function updateDateTime() {
    const now = new Date();
    const options = { 
        weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
        hour: '2-digit', minute: '2-digit', second: '2-digit',
        hour12: true
    };
    document.getElementById('currentDateTime').textContent = now.toLocaleString('en-US', options);
}
updateDateTime();
setInterval(updateDateTime, 1000);
</script>
</body>
</html>
