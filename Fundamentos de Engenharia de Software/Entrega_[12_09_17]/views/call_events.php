<?php
if (isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] === "XMLHttpRequest"){
  require_once('functions.php');
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
  if ($category_id){
    $events = loadEventsCategory($category_id);
    echo json_encode($events);
    return;
  }
}
echo NULL;
