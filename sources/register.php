<?php
$siteUrl = $n['site_url'];
if ($loggedIn) header("location: $siteUrl?link=new-request");
$n['page_name']  = "Registrate";
$n['page_content'] = "register/content.php";