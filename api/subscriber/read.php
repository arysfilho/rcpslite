<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS, HEAD, POST");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/subscriber.php';
include_once '../objects/field.php';
  
// instantiate database and subscriber object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$subscriber = new Subscriber($db);
$field = new Field($db);
  
// query subscribers
$stmt = $subscriber->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if ($num>0) {
    // subscribers array
    $subscribers_arr=array();
    //$subscribers_arr["records"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        // set ID property of subscriber to read fields
        $field->subscriber_id = $id;

        // query fields
        $stfields = $field->read();
        $numfields = $stfields->rowCount();

        $fields_arr = array();
        if ($numfields>0) {
            while ($rowfields = $stfields->fetch(PDO::FETCH_ASSOC)){
                extract($rowfields);
                $field_item=array(
                    "title" => $title,
                    "type" => $type,
                    "value" => $value
                );

                array_push($fields_arr, $field_item);
            }
        }
  
        $subscriber_item=array(
            "id" => $id,
            "email" => $email,
            "name" => $name,
            "state" => $state,
            "fields" => $fields_arr
        );
  
        array_push($subscribers_arr, $subscriber_item);
        unset($fields_arr);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show subscribers data in json format
    echo json_encode($subscribers_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no subscribers found
    echo json_encode(
        array("message" => "No subscribers found.")
    );
}