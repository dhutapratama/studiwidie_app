<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] 	= array();
$autoload['libraries'] 	= array('database', 'session', 'encrypt', 'session', 'MY_Session');
$autoload['helper'] 	= array('url');
$autoload['config'] 	= array();
$autoload['language'] 	= array();
$autoload['model'] 		= array(
							'initial',
							'm_users',
							'm_mata_pelajaran'
						);
