<?php 
require 'init.php';
$f = '';

if (isset($_GET['f']) && !empty($_GET['f'])) {
	$f = $_GET['f'];
}

$data['status'] = 204;
$data['message'] = "Error 204";

if ($f == 'new-request' && $loggedIn) {
	$pr = new PurchaseRequest([
		"userId" => $userId,
		"date" => $_POST['date'],
		"campaign" => $_POST['campaign'],
		"dateStart" => $_POST['date_start'],
		"dateEnd" => $_POST['date_end'],
		"distributor" => $_POST['distributor'],
		"entrepreneur" => $_POST['entrepreneur'],
		"numRegistered" => $_POST['num_registered'],
		"reseller" => $_POST['reseller']
	]);
	echo json_encode($pr->register());
}

if ($f == 'edit-request' && $loggedIn) {
	$pr = new PurchaseRequest([
		"purchaseRequestId" => $_POST['pr_id'],
		"userId" => $userId,
		"date" => $_POST['date'],
		"campaign" => $_POST['campaign'],
		"dateStart" => $_POST['date_start'],
		"dateEnd" => $_POST['date_end'],
		"distributor" => $_POST['distributor'],
		"entrepreneur" => $_POST['entrepreneur'],
		"numRegistered" => $_POST['num_registered'],
		"reseller" => $_POST['reseller']
	]);
	echo json_encode($pr->edit());
}
if ($f == 'new-product' && $loggedIn) {
	$pr_id = $_GET['pr_id'];
	$page = $con->escape_string(trim($_POST['page']));
	$des = $con->escape_string(trim($_POST['description']));
	$code = $con->escape_string(trim($_POST['code']));
	$quant = $con->escape_string(trim($_POST['quantity']));
	$price = $con->escape_string(trim($_POST['price']));
	$imp = $con->escape_string(trim($_POST['import']));
	$time = time();
	if ($page && $des && $code && $quant && $price && $imp) {
		mysqli_query($con, "INSERT INTO products (pr_id, page, description, code, quantity, price, import, time) VALUES ('$pr_id', '$page', '$des', '$code', '$quant', '$price', '$imp', '$time')");
		$n['product'] = fetch_array("SELECT * FROM products WHERE time = '$time'");
		include 'layout/products/content.php';
	}
}
if ($f == 'delete_product' && is_numeric($_GET['product_id'])) {
	$product_id = $_GET['product_id'];
	$data['status'] = 200;
	try {
		mysqli_query($con, "DELETE FROM products WHERE id = '$product_id'");
	} catch (mysqli_sql_exception $error) {
		$report = new Report([
			"recipent" => "reports@logacode.net",
			"title" => "Delete product error: ?f=delete_product",
			"body" => $error->getMessage()
		]);
		$report->sendReport();
		$data['message'] = "Ha ocurrido un error en el proceso de eliminado del producto.";
	}
	echo json_encode($data);
}
if ($f == 'register') {
	$fullName = $con->escape_string(trim($_POST['full_name']));
	$email = $con->escape_string(trim($_POST['email']));
	$password = $con->escape_string(trim($_POST['password']));
	$user = new User([
		"full_name" => $fullName,
		"email" => $email,
		"password" => $password,
		"time" => time()
	]);
	echo json_encode($user->register());
}
if ($f == 'login') {
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$user = new User([
		"email" => $email,
		"password" => $password,
		"time" => time()
	]);
	echo json_encode($user->login());
}
if ($f === 'delete-purchase-request' && $loggedIn) {
	$purchaseRequestId = $_GET['pr_id'];
	$pr = new PurchaseRequest([
		"purchaseRequestId" => $purchaseRequestId,
		"userId" => $userId
	]);
	$data = $pr->delete();
	echo json_encode($data);
}