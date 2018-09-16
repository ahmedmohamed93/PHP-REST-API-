<?php

//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../config/Database.php";
include_once "../../models/Post.php";

// Instantiate DB & Connet
$database = new Database();
$db = $database->connect();

// Instantiate blog Post object
$post = new Post($db);

// blog post query
$result = $post->read();
// Get row Count
$num = $result->rowCount();

//check if any posts
if($num > 0){
    //post array
    $posts_array = array();
    $posts_array['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $post_item = array(
            'id'  => $id,
            'title' => $title,
            'body'  => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name,
        );

        //push to data
        array_push($posts_array['data'], $post_item);
    }

    //turn it json & output
    echo json_encode($posts_array);

}else{
    echo json_encode(array('message' => 'No Posts Found'));
}