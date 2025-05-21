<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rooms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body { background-color: #ffffff; padding-top: 80px; color: #333; }
        .container-box {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 { color: #4B0082; }
        .table th { background-color: #e3d7ff; }
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

        <?php if (!empty($rooms)) : ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Room Name <i class="bi bi-door-open-fill"></i></th>
                            <th>Location <i class="bi bi-geo-alt-fill"></i></th>
                            <th>Status <i class="bi bi-info-circle-fill"></i></th>
                            <th>Action <i class="bi bi-gear-fill"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($rooms as $room): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= htmlspecialchars($room->name) ?></td>
                                <td><?= htmlspecialchars($room->location) ?></td>
                            
                                 <!-- status -->

                                 <td>
                                    <?php
                                        $statusId = $room->status; // assuming status is an integer
                                        $statusName = '';
                                        $badgeClass = 'secondary'; // default: grey

                                        switch ($statusId) {
                                            case 0:
                                                $statusName = 'Inactive / Fully Booked';
                                                $badgeClass = 'secondary';
                                                break;
                                            case 1:
                                                $statusName = 'Available';
                                                $badgeClass = 'success';
                                                break;
                                            case 2:
                                                $statusName = 'Under Maintenance';
                                                $badgeClass = 'warning';
                                                break;
                                            default:
                                                $statusName = 'Unknown';
                                                $badgeClass = 'secondary';
                                        }
                                    ?>
                                    <span class="badge bg-<?= $badgeClass ?>"><?= $statusName ?></span>
                                </td>

                    
                                 <!-- end status -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?= $room->id ?>">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                     <a href="<?= site_url('room/edit/' . $room->id) ?>" 
                                        class="btn btn-sm btn-success " 
                                        ><i class="bi bi-pencil-square"></i>
                                    </a>
                                     <a href="<?= site_url('room/delete/' . $room->id) ?>" 
                                        class="btn btn-sm btn-danger " 
                                        onclick="return confirm('Are you sure you want to delete this room?');"><i class="bi bi-x-circle-fill"></i>
                                    </a>
                                

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center">No rooms found.</p>
        <?php endif; ?>
    </div>
</div>

<!-- view modal -->
<?php foreach ($rooms as $room): ?>
<div class="modal fade" id="viewModal<?= $room->id ?>" tabindex="-1" aria-labelledby="viewModalLabel<?= $room->id ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #6f42c1;">
                <h5 class="modal-title" id="viewModalLabel<?= $room->id ?>">
                    Rooms Details 
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Name</div>
                            <div class="col-7"><?= htmlspecialchars($room->name) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Location</div>
                            <div class="col-8"><?= htmlspecialchars($room->location) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Capacity</div>
                            <div class="col-7"><?= htmlspecialchars($room->capacity) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Facilities</div>
                            <div class="col-8"><?= htmlspecialchars($room->facilities) ?></div>
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Created At</div>
                            <div class="col-7"><?= htmlspecialchars($room->created_at) ?></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-4 fw-bold">Updated At</div>
                            <div class="col-8"><?= htmlspecialchars($room->updated_at) ?></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                       $statusId = $room->status; // Ensure this matches your DB column
                       $statusName = '';
                       $badgeClass = 'secondary'; // Default color: gray
                       
                        switch ($statusId) {
                            case 0:
                                $statusName = 'Inactive / Fully Booked';
                                $badgeClass = 'secondary'; // Gray
                                break;
                            case 1:
                                $statusName = 'Available';
                                $badgeClass = 'success'; // Green
                                break;
                            case 2:
                                $statusName = 'Under Maintenance';
                                $badgeClass = 'warning'; // Yellow
                                break;
                            default:
                                $statusName = 'Unknown';
                                $badgeClass = 'secondary';
                        }
                    ?>
                      <div class="col-md-6 mb-2">
                        <div class="row">
                            <div class="col-5 fw-bold">Status</div>
                            <div class="col-7">
                                <span class="badge bg-<?= $badgeClass ?>"><?= $statusName ?></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <small class="text-muted" id="generatedTime<?= $room->id ?>"></small>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- end view modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Optional: Show current date/time
    const now = new Date();
    document.getElementById("currentDateTime").textContent = now.toLocaleString();
</script>

</body>
</html>
