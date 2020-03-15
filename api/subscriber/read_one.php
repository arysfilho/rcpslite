<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/subscriber.php';
include_once '../objects/field.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare subscriber object
$subscriber = new Subscriber($db);
$field = new Field($db);
  
// set ID property of record to read
$subscriber->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// read the details of subscriber to be edited
$subscriber->readOne();
  
if ($subscriber->name!=null) {
    // set ID property of subscriber to read fields
    $field->subscriber_id = $subscriber->id;

    // query fields
    $stfields = $field->read();
    $numfields = $stfields->rowCount();

    if ($numfields>0) {
        $fields_arr = array();
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

    // create array
    $subscriber_arr = array(
        "id" =>  $subscriber->id,
        "email" => $subscriber->email,
        "name" => $subscriber->name,
        "state" => $subscriber->state,
        "fields" => $fields_arr
    );
  
    // set response code - 200 OK
    http_response_code(200);
  
    // make it json format
    echo json_encode($subscriber_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user subscriber does not exist
    echo json_encode(array("message" => "Subscriber does not exist."));
}