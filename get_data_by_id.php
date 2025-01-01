<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user_posts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $data['images'] = json_decode($data['images']);
        echo json_encode($data);
    } else {
        echo json_encode(["message" => "No data found for this ID"]);
    }
} else {
    echo json_encode(["message" => "ID not provided"]);
}
?>
