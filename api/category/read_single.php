<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../config/Database.php";
include_once "../../models/Category.php";

// Instantiate DB & Connet
$database = new Database();
$db = $database->connect();

// Instantiate blog Post object
$cat = new Category($db);

// Get ID
$cat->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get Category
$cat->read_single();

//Create array(return json data)
$cat_arr = array(
    'id'            => $cat->id,
    'name'         => $cat->name,
);

//Make JSON
print_r(json_encode($cat_arr));
