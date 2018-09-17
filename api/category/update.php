<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,
                          Access-Control-Allow-Methods, X-Requested-With, Authorization ');


include_once "../../config/Database.php";
include_once "../../models/Category.php";

// Instantiate DB & Connet
$database = new Database();
$db = $database->connect();

// Instantiate blog Cat object
$cat = new Category($db);

// Get Row Cat Data
$data = json_decode(file_get_contents("php://input"));
$cat->id    = $data->id;
$cat->name  = $data->name;


//Update Category
if($cat->update()){
    echo json_encode(array('message' => 'Category Updated'));
}else{
    echo json_encode(array('message' => 'Category Not Updated'));
}