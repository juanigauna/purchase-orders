<?php
$purchaseRequest = new PurchaseRequest([
    "purchaseRequestId" => $_GET['pr_id'],
    "userId" => $userId
]);
if (!$purchaseRequest->check()) {
    header("location: ".$n['site_url']);
}
$n['pr'] = $purchaseRequest->getData();
$n['page_name'] = "Editar orden de compra";
$n['page_content'] = "edit-purchase-req/content.php";