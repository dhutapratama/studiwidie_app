<?php

   //header('Content-Type: application/json');
	header("Access-Control-Allow-Methods: GET, OPTIONS, POST, PUT, DELETE");
	header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
	header('Access-Control-Allow-Origin: *');

  	//if you need special headers
  	//print_r($output);
  	$this->security->get_csrf_hash();
	$this->security->get_csrf_token_name();

    echo json_encode($output);
?>