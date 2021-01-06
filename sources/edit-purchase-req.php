<?php
if (!is_numeric($_GET['pr_id']) || !$loggedIn) header("location: ".$n['site_url']);
$pr = new PurchaseRequest([
    "prId" => $_GET['pr_id'],
    "userId" => $userId
]);
if (!$pr->check()) header("location: ".$n['site_url']);
$n['pr'] = $pr->getData();
$n['page_name'] = "Editar orden de compra";
$n['page_content'] = "edit-purchase-req/content.php";