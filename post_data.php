<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mobile_number = mysqli_real_escape_string($conn, $_POST['mobile_number']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
    $place = mysqli_real_escape_string($conn, $_POST['place']);

    // Initialize variables for file uploads
    $file_path = '';
    $images = [];

    // Handle single file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file_name = time() . '_' . $_FILES['file']['name'];
        $upload_path = 'uploads/' . $file_name;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
            $file_path = $upload_path;
        } else {
            echo json_encode(["message" => "Error uploading the file"]);
            exit;
        }
    }

    // Handle multiple image uploads
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $image_name = time() . '_' . $_FILES['images']['name'][$key];
            $upload_image_path = 'uploads/' . $image_name;
            if (move_uploaded_file($tmp_name, $upload_image_path)) {
                $images[] = $upload_image_path;
            } else {
                echo json_encode(["message" => "Error uploading one of the images"]);
                exit;
            }
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
