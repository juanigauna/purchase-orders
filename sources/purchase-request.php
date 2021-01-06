<?php
if (isset($_GET['pr_id']) && !empty($_GET['pr_id']) && is_numeric($_GET['pr_id']) && check_request($_GET['pr_id']) == true) {
	$pr_id = $_GET['pr_id'];
	$n['pr'] = fetch_array("SELECT * FROM purchase_request WHERE id = '$pr_id'");
}
$n['page_name'] = "Solicitud de compra";
$n['page_content'] = "purchase-request/content.php";