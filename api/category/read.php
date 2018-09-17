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

// blog post query
$result = $cat->read();
// Get row Count
$num = $result->rowCount();

//check if any categories
if($num > 0){
    //post array
    $cats_array = array();
    $cats_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $cat_item = array(
            'id'  => $id,
            'title' => $name
        );

        //push to data
        array_push($cats_array['data'], $cat_item);
    }

    //turn it json & output
    echo json_encode($cats_array);

}else{
    echo json_encode(array('message' => 'No Categories Found'));
}