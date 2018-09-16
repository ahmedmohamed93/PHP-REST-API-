<?php


class Post{
    // DB Stuff
    private $conn;
    private $table = 'posts';

    // Post Props
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;


    // Constructor With DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Get Posts
    public function read(){
        // Create Query
        $query = 'SELECT c.name AS category_name, p.id,p.category_id,p.title,p.body,p.author,p.created_at 
        From ' .$this->table.' p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        // execute statement
        $stmt->execute();

        return $stmt;
    }
}