<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit a Room</title>
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
        <h2 class="text-center mb-4">Edit A Room <i class="bi bi-door-open-fill"></i></h2>

        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= form_open('room/update/' . $room->id) ?>
        <!-- <?php  echo '<br>User ID: ' . $this->session->userdata('user_id'); ?> -->

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person-fill"></i> Name / Room Type</label> 
            <input type="text" name="name" class="form-control" value="<?= set_value('name',$room->name) ?>" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person-fill"></i> Location</label> 
            <input type="text" name="location" class="form-control" value="<?= set_value('location', $room->location) ?>" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person-fill"></i> Capacity</label> 
            <input type="number" name="capacity" class="form-control" value="<?= set_value('capacity', $room->capacity) ?>" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person-fill"></i> Facilities</label> 
            <input type="text" name="facilities" class="form-control" value="<?= set_value('facilities', $room->facilities) ?>" required>
        </div>

       <div class="mb-3">
            <label for="status" class="form-label">
                <i class="bi bi-door-open-fill"></i> Status
            </label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="0" <?= isset($room->status) && $room->status == 0 ? 'selected' : '' ?>>Inactive / Fully Booked</option>
                <option value="1" <?= isset($room->status) && $room->status == 1 ? 'selected' : '' ?>>Available</option>
                <option value="2" <?= isset($room->status) && $room->status == 2 ? 'selected' : '' ?>>Under Maintenance</option>
            </select>

        </div>
        <br>



        <button type="submit" class="btn btn-primary">Update Room</button>
        <a href="<?= base_url('room') ?>" class="btn btn-secondary">Cancel</a>

        <?= form_close(); ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
