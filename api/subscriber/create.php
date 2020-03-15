<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS, HEAD, POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate subscriber object
include_once '../objects/subscriber.php';

// instantiate field object
include_once '../objects/field.php';

include_once '../shared/utilities.php';
  
$database = new Database();
$db = $database->getConnection();
  
$subscriber = new Subscriber($db);

$utilities = new Utilities();
  
// get posted data
$data = json_decode(file_get_contents("php://input"));

// Validating email
if (!$utilities->isValidEmail($data->email)) {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create subscriber. Invalid email address."));
    return;
}

// make sure data is not empty
if (
    !empty($data->email)
    && !empty($data->name)
    && !empty($data->state)
) {
    // set subscriber property values
    $subscriber->email = $data->email;
    $subscriber->name = $data->name;
    $subscriber->state = $data->state;
  
    // create the subscriber
    if ($subscriber_id = $subscriber->create()) {
        // verify if was sent fields
        if (isset($data->fields)) {
            $field = new Field($db);
            foreach ($data->fields as $newfield) {
                // set subscriber property values
                $field->subscriber_id = $subscriber_id;
                $field->title = $newfield->title;
                $field->type = $newfield->type;
                $field->value = $newfield->value;
                $field->create();
            }
            
        }
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Subscriber was created."));
    } else {
        // if unable to create the subscriber, tell the user
        // set response code - 503 service unavailable
        http_response_code(503);

        // tell the user
        echo json_encode(array("message" => "Unable to create subscriber."));
    }
} else {
    // tell the user data is incomplete
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create subscriber. Data is incomplete."));
}