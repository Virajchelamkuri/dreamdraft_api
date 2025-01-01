<?php

// Include necessary files for database and actions
include 'get.php'; // For getting all posts
include 'post.php'; // For posting data
include 'getbyid.php'; // For getting data by ID

// Check if there's a request method and corresponding action
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        // If 'id' parameter is provided, call the get data by ID
        getDataById($_GET['id']);
    } else {
        // Else, call the get data (fetch all posts)
        getData();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST request to create new data
    postData();
} else {
    echo json_encode(["message" => "Invalid request method"]);
}

// Function to get all posts
function getData() {
    include 'get.php';
    echo getPosts(); // Assuming getPosts() returns JSON data
}

// Function to handle post data
function postData() {
    include 'post.php';
    $result = postUserData(); // Assuming postUserData() handles the POST request and returns a response
    echo $result;
}

// Function to get data by ID
function getDataById($id) {
    include 'getbyid.php';
    echo getPostById($id); // Assuming getPostById() handles the GET by ID request and returns JSON data
}

?>
