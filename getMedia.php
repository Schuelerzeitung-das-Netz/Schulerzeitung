<?php require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php'); 


if(!isset($_GET['media_id'])) {
	echo "Missing Parameters";
}else{
	header("Content-Type: text/plain");

	echo wp_get_attachment_image_src($_GET['media_id'],"large")[0];
}

?>