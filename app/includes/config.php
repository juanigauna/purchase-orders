<?php
ini_set('default_charset', 'UTF-8');                                    
mb_internal_encoding('UTF-8');
iconv_set_encoding('internal_encoding', 'UTF-8');
iconv_set_encoding('output_encoding', 'UTF-8');

define("MYSQL_CONN_ERROR", "Unable to connect to database.");
mysqli_report(MYSQLI_REPORT_STRICT);
$domain = get_domain($_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);

$n['db_host'] = 'localhost';
$n['db_user'] = "root";
$n['db_pass'] = "";
$n['db_name'] = "orders";
$n['site_url'] = "http://$domain";

if ($domain === "yourdomain.com" || $domain === "www.yourdomain.com") {
    $n['db_host'] = "localhost";
    $n['db_user'] = "youruser";
    $n['db_pass'] = "yourpassword";
    $n['db_name'] = "yourdatabasename";
    $n['site_url'] = "https://$domain";
}

try {
    $con = new mysqli($n['db_host'], $n['db_user'], $n['db_pass'], $n['db_name']);
    $con->set_charset("utf8mb4");
} catch (mysqli_sql_exception $error) {
    $report = new Report([
        "recipent" => "yourrecipenttoerrors@yourdomain.com",
        "title" => "Database error",
        "body" => $error->getMessage()
    ]);
    $report->sendReport();
}