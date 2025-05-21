<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            padding-top: 80px;
            color: #333;
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
        .table th {
            background-color: #e3d7ff;
        }
    </style>
</head>
<body>

<?php $this->load->view('navbar'); 

?>

<div class="container mt-5">
    <div class="container-box">
        <h2 class="text-center mb-4">Welcome userbooking, <?= htmlspecialchars($username) ?>!</h2>
        <p class="text-center">You are logged in as <strong><?= htmlspecialchars($role) ?></strong>.</p>
        

        <?php if (!empty($bookings)): ?>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <?php if ($role == 'admin'): ?>
                                <th>User</th>
                            <?php endif; ?>
                            <th>Name</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $i => $booking): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <?php if ($role == 'admin'): ?>
                                    <td><?= htmlspecialchars($booking['username']) ?></td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($booking['name']) ?></td>
                                <td><?= htmlspecialchars($booking['room']) ?></td>
                                <td><?= htmlspecialchars($booking['booking_date']) ?></td>
                                <td><?= htmlspecialchars($booking['time']) ?></td>
                                <td><?= htmlspecialchars($booking['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center mt-4 text-muted">No bookings found.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
