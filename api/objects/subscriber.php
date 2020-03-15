<?php
class Subscriber
{
    private $conn;
    private $table_name = "subscribers";
  
    // object properties
    public $id;
    public $email;
    public $name;
    public $state;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create subscriber
    function create()
    {
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    email=:email, name=:name, state=:state";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->state=htmlspecialchars(strip_tags($this->state));
    
        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":state", $this->state);
    
        // execute query
        if ($stmt->execute()) {
            $subscriber_id = $this->conn->lastInsertId();
            return $subscriber_id;
        }
    
        return false;
    }

    // list subscribers
    function read()
    {
        // select all query
        $query = "SELECT
                    s.id, s.email, s.name, s.state
                FROM
                    " . $this->table_name . " s
                ORDER BY
                    s.id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // used when filling up the update subscriber form
    function readOne()
    {
        // query to read single record
        $query = "SELECT
                    s.id, s.email, s.name, s.state
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.id = ?
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of subscriber to be updated
        $stmt->bindParam(1, $this->id);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->email = $row['email'];
        $this->name = $row['name'];
        $this->state = $row['state'];
    }

    // update the subscriber
    function update()
    {
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    email = :email,
                    name = :name,
                    state = :state
                WHERE
                    id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind new values
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':state', $this->state);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the subscriber
    function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // search subscribers
    function search($keywords)
    {
        // select all query
        $query = "SELECT
                    s.id, s.email, s.name, s.state
                FROM
                    " . $this->table_name . " s
                WHERE
                    s.name LIKE ? OR s.email LIKE ?
                ORDER BY
                    s.id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // read subscribers with pagination
    public function readPaging($from_record_num, $records_per_page)
    {
        // select query
        $query = "SELECT
                    s.id, s.email, s.name, s.state
                FROM
                    " . $this->table_name . " s
                ORDER BY s.id ASC
                LIMIT ?, ?";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
    }

    // used for paging subscribers
    public function count()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
}