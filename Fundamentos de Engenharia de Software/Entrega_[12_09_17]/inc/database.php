<?php
header('Content-Type: text/html; charset=utf-8');

mysqli_report(MYSQLI_REPORT_STRICT);
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		mysqli_query($conn, "SET NAMES 'utf8'");
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}
function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

function accessValidate( $user = null, $pass = null ){

	$database = open_database();
	try{
		$sql = "SELECT *
    FROM users
    WHERE user_email = '" . $user . "' AND user_pass= '" . $pass . "'";

		$result = $database->query($sql);

		if ($result) {
			$found = $result->fetch_assoc();
			return $found;
		}
		else {
			echo 'Erro na execução da consulta, por favor entrar em contato com o Admin do site!';
		}
	}
	catch (Exception $e) {
	 $_SESSION['message'] = $e->GetMessage();
	 $_SESSION['type'] = 'danger';
	}
	close_database($database);
}

function getCategories($category_id = Null){
  $database = open_database();
 	$found = Null;
  try {
 	  if ($category_id) {
 	    $sql = "SELECT *
              FROM `categories`
              where category_id = $category_id";

 	    $result = $database->query($sql);

 	    if ($result->num_rows > 0) {
 	      $found = $result->fetch_assoc();
 	    }

    } else {
      $sql = "SELECT *
              FROM `categories`";

 	    $result = $database->query($sql);

      $found = array();
      while ($row = $result->fetch_assoc()) {
        array_push($found, $row);
      }
 	  }
 	} catch (Exception $e) {
 	  $_SESSION['message'] = $e->GetMessage();
 	  $_SESSION['type'] = 'danger';
   }

 	close_database($database);
 	return $found;
}

function getEvents($category_id = Null){
  $database = open_database();
 	$found = Null;
  try {
 	  if ($category_id) {
 	    $sql = "SELECT e.event_id, e.event_description
              FROM `events` AS e
              LEFT JOIN `categories` AS c
              ON e.category_id = c.category_id
              where c.category_id = $category_id";

 	    $result = $database->query($sql);
      $found = array();
			while ($row = $result->fetch_assoc()) {
				array_push($found, $row);
			}
    } else {
      $sql = "SELECT e.event_id, e.category_id, e.event_description, c.category_description
              FROM `events` AS e
              LEFT JOIN `categories` AS c
              ON e.category_id = c.category_id";

 	    $result = $database->query($sql);

      $found = array();
      while ($row = $result->fetch_assoc()) {
        array_push($found, $row);
      }
 	  }
 	} catch (Exception $e) {
 	  $_SESSION['message'] = $e->GetMessage();
 	  $_SESSION['type'] = 'danger';
   }

 	close_database($database);
 	return $found;
}

function getOccurrences($occurrence_id = Null){
  $database = open_database();
 	$found = Null;
  try {
 	  if ($occurrence_id) {
 	    $sql = "SELECT c.category_description, e.event_description, o.neighborhood_description, o.occurrence_reg
              FROM `occurrences` AS o
              LEFT JOIN `events` AS e
              ON o.event_id = e.event_id
              LEFT JOIN `categories` AS c
              ON e.category_id = c.category_id
              where occurrence_id = $occurrence_id";

 	    $result = $database->query($sql);
      $found = array();
			while ($row = $result->fetch_assoc()) {
				array_push($found, $row);
			}
    } else {
      $sql = "SELECT c.category_description, e.event_description, o.neighborhood_description, o.occurrence_reg
              FROM `occurrences` AS o
              LEFT JOIN `events` AS e
              ON o.event_id = e.event_id
              LEFT JOIN `categories` AS c
              ON e.category_id = c.category_id";

 	    $result = $database->query($sql);

      $found = array();
      while ($row = $result->fetch_assoc()) {
        array_push($found, $row);
      }
 	  }
 	} catch (Exception $e) {
 	  $_SESSION['message'] = $e->GetMessage();
 	  $_SESSION['type'] = 'danger';
   }

 	close_database($database);
 	return $found;
}

function getOccurrencesCategories(){
  $database = open_database();
 	$found = Null;
  try {
    $sql = "SELECT c.category_id, c.category_description, COUNT(*) AS occurrences
    FROM `occurrences` AS o
    LEFT JOIN `events` AS e
    ON o.event_id = e.event_id
    LEFT JOIN `categories` AS c
    ON e.category_id = c.category_id
    GROUP BY c.category_id";

    $result = $database->query($sql);
    $found = array();
		while ($row = $result->fetch_assoc()) {
			array_push($found, $row);
		}

  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
   }

  close_database($database);
  return $found;
}

function getAmountOccurrences(){
  $database = open_database();
 	$found = Null;
  try {
    $sql = "SELECT COUNT(*) AS amountOccurrences
    FROM `occurrences` AS o
    LEFT JOIN `events` AS e
    ON o.event_id = e.event_id
    LEFT JOIN `categories` AS c
    ON e.category_id = c.category_id";

    $result = $database->query($sql);
    $found = array();
		while ($row = $result->fetch_assoc()) {
			array_push($found, $row);
		}
  } catch (Exception $e) {
    $_SESSION['message'] = $e->GetMessage();
    $_SESSION['type'] = 'danger';
   }

  close_database($database);
  return $found;
}

function save($table = null, $data = null) {
  $database = open_database();
  $columns = null;
  $values = null;

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }
  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');

  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values)";

  try {
    $database->query($sql);
    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) {

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  }
  $last_insert_id = mysqli_insert_id($database);
  close_database($database);
  return $last_insert_id;
}

function saveOccurrence($occurrence){
  save('occurrences', $occurrence);
}
