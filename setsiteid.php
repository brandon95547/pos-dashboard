<?php
@session_start();
$site_id = isset($_GET['site_id']) ? $_GET['site_id'] : 0;
$_SESSION['site_id'] = $site_id;
echo json_encode(array('success' => true));