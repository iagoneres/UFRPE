<?php
session_start();

require_once('../config.php');
require_once(DBAPI);

$occurrences = Null;
$categories = Null;
$events = Null;
$occurrencesCategory = Null;
$amountOccurrences = NUll;

function login(){
  if(!isset($_SESSION['logged_id'])):
    if (!empty($_POST['login']) && !empty($_POST['password'])):

      $login = $_POST['login'];
      $pass = md5($_POST['password']);

      $user_data = accessValidate($login, $pass);

      if(isset($user_data['user_cpf'])):
        $_SESSION['logged_id'] = $user_data['user_cpf'];
        $_SESSION['logged_name'] = $user_data['user_name'];
        $_SESSION['logged_email'] = $user_data['user_email'];
        header('Location: ' . DASHBOARD);
      else:
        header('Location: login.php?error=0000x01');
      endif;
    endif;
  else:
    header('Location: ' . DASHBOARD);
  endif;
}

function checkSession(){
  if(!isset($_SESSION['logged_id'])){
    header('Location: ' . LOGIN . '?error=1');
  }
}

function loadCategories(){
  global $categories;
  $categories = getCategories();
}

function loadEvents(){
  global $events;
  $events = getEvents();
}

function loadEventsCategory($category_id){
  global $events;
  $events = getEvents($category_id);
  return $events;
}

function loadOccurrences(){
  global $occurrences;
  $occurrences = getOccurrences();
}

function loadOccurrencesCategory(){
  global $occurrencesCategory;
  $occurrencesCategory = getOccurrencesCategories();
}

function loadAmountOccurrences(){
  global $amountOccurrences;
  $amountOccurrences = getAmountOccurrences();
}

function registerOccurrence(){
  if (!empty($_POST['occurrence'])) {
    $occurrence = $_POST['occurrence'];
    if(isset($occurrence["'occurrence_lat'"]) || isset($occurrence["'occurrence_lon'"])){
      $lat = $occurrence["'occurrence_lat'"];
      $lon = $occurrence["'occurrence_lon'"];
      $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&key=AIzaSyDEJ5EIJeJXkPLPKeFq_uZolsylaTwgJi0";

      // Make the HTTP request
      $data = @file_get_contents($url);
      // Parse the json response
      $jsondata = json_decode($data,true);

      $occurrence["'neighborhood_description'"] = $jsondata["results"][0]["address_components"][3]["long_name"];
      saveOccurrence($occurrence);
      header('Location: ' . OCCURRENCES);
    }
  }
}
