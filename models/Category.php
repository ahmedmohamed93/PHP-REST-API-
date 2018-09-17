<?php

class Category{
    //DB stuff
    private $conn;
    private $table = "categories";

    // props
    public $id;
    public $name;
    public $created_at;

    //Constructo With DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Get Categories
    public function read(){
        //create query
        $query = "SELECT id, name FROM ".$this->table. " ORDER BY created_at DESC";

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute statement
        $stmt->execute();

        return $stmt;
    }

    // Read single
    public function read_single(){
        // create query
        $query = "SELECT id ,name FROM ".$this->table. " WHERE id = :id";

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //bind Param
        $stmt->bindParam(':id' , $this->id);

        //Execute statement
        $stmt->execute();

        $row = $stmt->fetch();

        //set Props
        $this->id = $row['id'];
        $this->name = $row['name'];
    }

    // Create Category
    public function create(){
        //creare Query
        $query = 'INSERT INTO '.$this->table.' SET name = :name';
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name       = htmlspecialchars(strip_tags($this->name));

        // Bind ID
        $stmt->bindParam(':name', $this->name);

        //Execute query
        if($stmt->execute()){
            return true;
        }

        //print error if something goes worng
        printf("ERROR" , $stmt->error);

        return false;
    }

    //update Category
    public function update(){
        // create query
        $query = 'UPDATE '. $this->table. " SET name= :name WHERE id= :id";

        // prepare stat
        $stmt = $this->conn->prepare($query);

        //Clean data
        $this->name         = htmlspecialchars(strip_tags($this->name));
        $this->id           = htmlspecialchars(strip_tags($this->id));


        // Bind ID
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        //Execute query
        if($stmt->execute()){
            return true;
        }

        //print error if something goes worng
        printf("ERROR" , $stmt->error);

        return false;
    }

    //Delete Cat
    public function delete(){
        //create query
        $query = "DELETE FROM " .$this->table. " WHERE id=:id";

         // prepare stat
         $stmt = $this->conn->prepare($query);

         //Clean data
         $this->id           = htmlspecialchars(strip_tags($this->id));
 
 
         // Bind ID
         $stmt->bindParam(':id', $this->id);
 
         //Execute query
         if($stmt->execute()){
             return true;
         }
 
         //print error if something goes worng
         printf("ERROR" , $stmt->error);
 
         return false;
    }
}