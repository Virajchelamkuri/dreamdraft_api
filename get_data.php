<?php
include 'db.php';

$sql = "SELECT * FROM user_posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['images'] = json_decode($row['images']);
    $data[] = $row;
}

echo json_encode($data);
?>
