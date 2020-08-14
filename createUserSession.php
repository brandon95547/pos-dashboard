<?php
@session_start();

$data = isset($_POST['data']) ? $_POST['data'] : null;

$_SESSION['user'] = $data;