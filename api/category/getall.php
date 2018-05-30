<?php

header('Access-Control-Allow-Origin : *');
header('Content-Type: application/json');

include_once('../../config/Database.php');
include_once('../../models/Category.php');

$database = new Database();
$db = $database->connect();

$category = new Category($db);
$result = $category->getAll();
$num_categs = $result->rowCount();

if ($num_categs > 0){
  $categs_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $categ_item = array(
      'id' => $id,
      'categ_name' => $name
    );
    array_push($categs_arr, $categ_item);
  }
  echo json_encode($categs_arr);
} else {
  echo json_encode(array('msg' => 'No Categs'));
}
