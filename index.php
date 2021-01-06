<?php
require 'app/init.php';
$link = $loggedIn ? 'new-request' : 'login';
if (isset($_GET['link']) && !empty($_GET['link'])) {
	$link = $_GET['link'];
}
switch ($link) {
	case 'new-request':
		include 'sources/new-request.php';
		break;
	case 'purchase-request':
		include 'sources/purchase-request.php';
		break;
	case 'purchase-request-ready':
		include 'sources/pr-ready.php';
		break;
	case 'login':
		include 'sources/login.php';
		break;
	case 'register':
		include 'sources/register.php';
		break;
	case 'edit-purchase-req':
		include 'sources/edit-purchase-req.php';
		break;
}
include "app/layout/container.php";