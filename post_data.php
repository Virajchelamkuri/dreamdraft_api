<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mobile_number = $_POST['mobile_number'];
    $budget = $_POST['budget'];
    $place = $_POST['place'];

    // File upload handling
    $file_path = '';
    $images = [];

    if (isset($_FILES['file'])) {
        $file_name = time() . '_' . $_FILES['file']['name'];
        $upload_path = 'uploads/' . $file_name;
        move_uploaded_file($_FILES['file']['tmp_name'], $upload_path);
        $file_path = $upload_path;
    }

    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image_name = time() . '_' . $_FILES['images']['name'][$key];
            $upload_image_path = 'uploads/' . $image_name;
            move_uploaded_file($tmp_name, $upload_image_path);
            $images[] = $upload_image_path;
        }
    }

    $images_json = json_encode($images);

    // Insert data into the database
    $sql = "INSERT INTO user_posts (name, mobile_number, budget, place, file_path, images)
            VALUES ('$name', '$mobile_number', '$budget', '$place', '$file_path', '$images_json')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Data posted successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
