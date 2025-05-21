<?php
$adminPass = password_hash('admin123', PASSWORD_DEFAULT);
$userPass  = password_hash('user123', PASSWORD_DEFAULT);

echo "INSERT INTO users (username, password, role) VALUES
('admin', '{$adminPass}', 'admin'),
('user1', '{$userPass}', 'user');";
