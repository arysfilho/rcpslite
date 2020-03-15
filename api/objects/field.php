<?php
class Field
{
    private $conn;
    private $table_name = "fields";
  
    // object properties
    public $subscriber_id;
    public $title;
    public $type;
    public $value;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create field
    function create()
    {
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    subscriber_id=:subscriber_id, title=:title, type=:type, value=:value";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->subscriber_id=htmlspecialchars(strip_tags($this->subscriber_id));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->value=htmlspecialchars(strip_tags($this->value));
    
        // bind values
        $stmt->bindParam(":subscriber_id", $this->subscriber_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":value", $this->value);
    
        // execute query
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }

    // list fields
    function read()
    {
        // select all query
        $query = "SELECT
                    f.subscriber_id, f.title, f.type, f.value
                FROM
                    " . $this->table_name . " f
                WHERE
                    f.subscriber_id = ?
                ORDER BY
                    f.type ASC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of subscriber to search fields
        $stmt->bindParam(1, $this->subscriber_id);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // used when filling up the update field
    function readOne()
    {
        // query to read single record
        $query = "SELECT
                    f.subscriber_id, f.title, f.type, f.value
                FROM
                    " . $this->table_name . " f
                WHERE
                    f.subscriber_id = :subscriber_id AND f.title = :title
                LIMIT
                    0,1";
    
        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // sanitize
        $field->subscriber_id=htmlspecialchars(strip_tags($this->subscriber_id));
        $field->title=htmlspecialchars(strip_tags($this->title));
    
        // bind id of subscriber to be updated
        $stmt->bindParam(":subscriber_id", $this->subscriber_id);
        $stmt->bindParam(":title", $this->title);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // set values to object properties
            $field->type = $row['type'];
            $field->value = $row['value'];

            return $field;
        } else {
            return false;
        }
    }

    // update the field
    function update()
    {
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    type = :type,
                    value = :value
                WHERE
                    subscriber_id = :subscriber_id AND title = :title";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->subscriber_id=htmlspecialchars(strip_tags($this->subscriber_id));
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->value=htmlspecialchars(strip_tags($this->value));
    
        // bind new values
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':value', $this->value);
        $stmt->bindParam(':subscriber_id', $this->subscriber_id);
        $stmt->bindParam(':title', $this->title);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // delete the field
    function delete()
    {
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE subscriber_id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->subscriber_id=htmlspecialchars(strip_tags($this->subscriber_id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->subscriber_id);
    
        // execute query
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
}