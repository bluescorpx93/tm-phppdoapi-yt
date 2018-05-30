<?php

header('Access-Control-Allow-Origin : *');
header('Content-Type: application/json');

include_once('../../config/Database.php');
include_once('../../models/Post.php');

$database = new Database();
$db = $database->connect();

$post = new Post($db);
$post->id = isset($_GET['id']) ? $_GET['id'] : die();
$post->readSingle();

$post_arr = array(
  'id' => $post->title,
  'body' => $post->body,
  'author' => $post->author,
  'category_id' => $post->category_id,
  'category_name' => $post->category_name,
  'created_at' => $post->created_at,
  'updated_at' => $post->updated_at
);

print_r(json_encode($post_arr));
