<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require "settings.php";

$servername = "127.0.0.1";
$username = $sqlUser;
$password = $sqlPass;

$conn = new mysqli($servername, $username, $password, $sqlDb);

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$items = array();

$sql = "select * from food_order inner join user on user.user_id = food_order.user_id where food_order.food_order_id = $order_id and food_order.active = 1 order by food_order_id DESC";

$result = $conn->query($sql);
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $items[] = $row;
  }
}

echo json_encode($items, true);