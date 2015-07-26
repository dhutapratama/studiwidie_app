<?php
	header("Access-Control-Allow-Methods: GET, OPTIONS, POST, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
	header('Access-Control-Allow-Credentials: true');
	echo json_encode($data);
?>