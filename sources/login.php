<?php
$siteUrl = $n['site_url'];
if ($loggedIn) {
    header("location: $siteUrl?link=new-request");
}
$n['page_name']  = "Iniciar sesión";
$n['page_content'] = "login/content.php";