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

    // Get Single Post
    public function read_single(){
        // Create Query
        $query = 'SELECT c.name AS category_name, p.id,p.category_id,p.title,p.body,p.author,p.created_at 
        From ' .$this->table.' p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ? LIMIT 0,1';
   
        //prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // execute statement
        $stmt->execute();

        $row = $stmt->fetch();

        //set props
        $this->title         = $row['title'];
        $this->body          = $row['body'];
        $this->author        = $row['author'];
        $this->category_id   = $row['category_id'];
        $this->category_name = $row['category_name'];


    }
}