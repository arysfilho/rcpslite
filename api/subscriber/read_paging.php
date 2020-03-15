<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/core.php';
include_once '../shared/utilities.php';
include_once '../config/database.php';
include_once '../objects/subscriber.php';
  
// utilities
$utilities = new Utilities();
  
// instantiate database and subscriber object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$subscriber = new Subscriber($db);
  
// query products
$stmt = $subscriber->readPaging($from_record_num, $records_per_page);
$num = $stmt->rowCount();
  
// check if more than 0 record found
if ($num>0) {
    // subscribers array
    $subscribers_arr=array();
    $subscribers_arr["records"]=array();
    $subscribers_arr["paging"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
  
        $subscriber_item=array(
	    "id" => $id,
	    "email" => $email,
	    "name" => $name,
	    "state" => $state
        );
  
        array_push($subscribers_arr["records"], $subscriber_item);
    }

    // include paging
    $total_rows=$subscriber->count();
    $page_url="{$home_url}subscriber/read_paging.php?";
    $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
    $subscribers_arr["paging"]=$paging;

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($subscribers_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user subscribers does not exist
    echo json_encode(
        array("message" => "No subscribers found.")
    );
}
