<?php
$domain = $n['site_url'];
if (!$loggedIn) header("location: $domain");

$n['page_name']  = "Armar orden de compra";
$n['page_content'] = "new-request/content.php";