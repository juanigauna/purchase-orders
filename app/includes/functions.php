<?php 
function check_request($request_id) {
	global $con;
	$q = mysqli_query($con, "SELECT * FROM purchase_request WHERE id = '$request_id'");
	if ($q->num_rows == 1) {
		return true;
	} elseif ($q->num_rows == 0) {
		return false;
	}
}
function fetch_array($q='') {
    global $con;
    $db = mysqli_query($con, $q);
    $array = mysqli_fetch_array($db);
    return $array;
}
function total_products($pr_id) {
	global $con;
	$q = mysqli_query($con, "SELECT * FROM products WHERE pr_id = '$pr_id'");
	$total = 0;
	while ($product=mysqli_fetch_array($q)) {
		$total = $total + $product['quantity'];
	}
	return $total;
}
function total_import($pr_id) {
	global $con;
	$q = mysqli_query($con, "SELECT * FROM products WHERE pr_id = '$pr_id'");
	$total = 0;
	while ($product=mysqli_fetch_array($q)) {
		$total = $total + $product['import'];
	}
	return $total;
}
function dep_price($price, $dig) {
    $trun = 10**$dig;
    return intval($price * $trun) / $trun;
}
function get_domain($url){
    $protocols = array('http://', 'https://', 'ftp://');
    $url = explode('/', str_replace($protocols, '', $url));
    return $url[0];
}