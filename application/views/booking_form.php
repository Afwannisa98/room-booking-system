<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #ffffff;
            padding-top: 80px;
            color: #333;
        }
        .navbar {
            background-color: #2c003e;
        }
        .container-box {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #4B0082;
        }
        label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<?php $this->load->view('navbar'); ?>

<div class="container mt-5">
    <div class="container-box">
        <h2 class="text-center mb-4">Book a Room <i class="bi bi-door-open-fill"></i></h2>

        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= form_open('booking/create') ?>
        <!-- <?php  echo '<br>User ID: ' . $this->session->userdata('user_id'); ?> -->
        <div class="alert alert-info mt-3">
                    <strong>Note:</strong> Once a booking has been approved and processed, it cannot be cancelled or modified. For further assistance, kindly contact us at 
                    <a href="mailto:support@mayang.com">support@mayang.com</a> or call <a href="tel:+60123456789">+6012-3456789</a>.
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person-fill"></i> Full Name</label> 
            <input type="text" name="name" class="form-control" value="<?= set_value('name') ?>" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi-envelope-fill"></i> Email Address</label>
            <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
        </div>

         <div class="mb-3">
            <label for="phone" class="form-label">
                <i class="bi bi-telephone-fill"></i> Phone Number</label>
            <input type="text" name="phone" class="form-control" value="<?= set_value('phone') ?>" required>
        </div>

        <!-- <div class="mb-3">
            <label for="room" class="form-label">Room</label>
            <input type="text" name="room" class="form-control" value="<?= set_value('room') ?>" required>
        </div> -->
        <div class="mb-3">
            <label for="room" class="form-label">
                <i class="bi bi-door-open-fill"></i> Room</label>
            <select name="room_id" class="form-select" required>
                <option value="">-- Select Room --</option>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?= $room->id ?>" <?= set_select('room_id', $room->id) ?>>
                        <?= htmlspecialchars($room->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="mb-3">
            <label for="start_date" class="form-label">
                <i class="bi bi-calendar-event-fill"></i> Start Date</label>
            <input type="date" name="start_date" class="form-control" value="<?= set_value('start_date') ?>" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">
                <i class="bi bi-calendar-event-fill"></i> End Date</label>
            <input type="date" name="end_date" class="form-control" value="<?= set_value('end_date') ?>" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">
                <i class="bi bi-clock-fill"></i> Start Time</label>
            <input type="time" name="start_time" class="form-control" value="<?= set_value('start_time') ?>" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">
                <i class="bi bi-clock-fill"></i> End Time</label>
            <input type="time" name="end_time" class="form-control" value="<?= set_value('end_time') ?>" required>
        </div>

        <div class="mb-3">
            <label for="purpose" class="form-label">
                <i class="bi-bullseye"></i> Purpose / Event Title</label>
            <input type="text" name="purpose" class="form-control" value="<?= set_value('purpose') ?>" required>
        </div>

        <div class="mb-3">
            <label for="attendees" class="form-label">
                <i class="bi-people-fill"></i> Number of Attendees</label>
            <input type="number" name="attendees" class="form-control" value="<?= set_value('attendees') ?>" min="1">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">
                <i class="bi-journal-text"></i> Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3"><?= set_value('notes') ?></textarea>
        </div>

        <!-- <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Pending" <?= set_select('status', 'Pending') ?>>Pending</option>
                <option value="Approved" <?= set_select('status', 'Approved') ?>>Approved</option>
                <option value="Rejected" <?= set_select('status', 'Rejected') ?>>Rejected</option>
            </select>
        </div> -->

        <button type="submit" class="btn btn-primary">Submit Booking</button>
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Cancel</a>

        <?= form_close(); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
