<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS, HEAD, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With");
   
// include database and object files
include_once '../config/database.php';
include_once '../objects/subscriber.php';
include_once '../objects/field.php';
include_once '../shared/utilities.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare subscriber object
$subscriber = new Subscriber($db);

$utilities = new Utilities();
  
// get id of subscriber to be edited
$data = json_decode(file_get_contents("php://input"));

// Validating email
if (!$utilities->isValidEmail($data->email)) {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create subscriber. Invalid email address."));
    return;
}
  
// set ID property of subscriber to be edited
$subscriber->id = $data->id;
  
// set subscriber property values
$subscriber->email = $data->email;
$subscriber->name = $data->name;
$subscriber->state = $data->state;
  
// update the subscriber
if ($subscriber->update()) {
    // verify if was sent fields
    if (isset($data->fields)) {
        $field = new Field($db);
        foreach ($data->fields as $newfield) {
            // set subscriber property values
            $field->subscriber_id = $subscriber->id;
            $field->title = $newfield->title;
            $field->type = $newfield->type;
            $field->value = $newfield->value;

            // look if the field exists
            if ($field->readOne()) {
                $field->update();
            } else {
                $field->create();
            }
        }
        
    }

    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array("message" => "Subscriber was updated."));
} else {
    // if unable to update the subscriber, tell the user
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update subscriber."));
}