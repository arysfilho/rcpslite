<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS, HEAD, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization, X-Requested-With");
  
// include database and object file
include_once '../config/database.php';
include_once '../objects/subscriber.php';
include_once '../objects/field.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare subscriber object
$subscriber = new Subscriber($db);
  
// get subscriber id
$data = json_decode(file_get_contents("php://input"));
  
// set subscriber id to be deleted
$subscriber->id = $data->id;
  
// delete the subscriber
if ($subscriber->delete()) {
    $field = new Field($db);
    $field->subscriber_id = $subscriber->id;
    $field->delete();
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Subscriber was deleted."));
} else {
    // if unable to delete the subscriber
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to delete subscriber."));
}